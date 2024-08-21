<?php

namespace App\Livewire;

use App\Livewire\Forms\DonationForm;
use App\Mail\FormCopyMail;
use App\Models\Donation;
use Coderflex\LaravelTurnstile\Rules\TurnstileCheck;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormDonation extends Component
{
    use WithFileUploads;

    public DonationForm $form;

    public string $successmsg = '';

    public function save(): void
    {
        if (config('turnstile.turnstile_site_key')) {
            $this->validate(['form.cf_turnstile' => [new TurnstileCheck()]]);
        }

        $validated = $this->form->validate();

        $validated['proof_path'] = $this->form->proof->store('uploads', 'public');
        $validated['is_anonymous'] = $validated['is_anonymous'] == 'no'
                                   ? 0 : boolval($validated['is_anonymous']);

        $validated['metadata'] = [
            'from_ip_address' => request()->ip(),
            'from_user_agent' => request()->userAgent(),
        ];

        $donation = Donation::create($validated);

        $this->successmsg = "Hi <b>{$validated['name']}</b>,"
            .' terima kasih atas donasi yang Anda berikan! <br>'
            ."Kami telah mengirimkan salinan isi form ke email: <b>{$validated['email']}<b/>.<br/>";

        $this->form->reset();

        $this->dispatch('saved', msg: $this->successmsg);

        Mail::to($donation->email)->queue(new FormCopyMail(
            formname: 'Donasi',
            psubject: 'Terima kasih atas donasi yang Anda berikan',
            informations: [
                'Nama Lengkap' => $donation->name,
                'Nama Organisasi' => $donation->orgname,
                'Email' => $donation->email,
                'No. Telepon' => $donation->phone,
                'Jumlah Donasi' => rupiah($donation->amount),
                'Bukti Donasi' => $donation->proof_url,
                'Pesan Donasi' => $donation->message,
                'Jangan Tampilkan Nama' => $donation->is_anonymous ? 'Ya' : 'Tidak',
            ],
        ));
    }

    public function render(): View
    {
        return view('components.forms.form-donation');
    }
}
