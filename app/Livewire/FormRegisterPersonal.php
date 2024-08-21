<?php

namespace App\Livewire;

use App\Livewire\Forms\RegisPersonalForm;
use App\Mail\FormCopyMail;
use App\Models\RegisPersonal;
use Coderflex\LaravelTurnstile\Rules\TurnstileCheck;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class FormRegisterPersonal extends Component
{
    public RegisPersonalForm $form;

    public string $successmsg = '';

    public function save(): void
    {
        if (config('turnstile.turnstile_site_key')) {
            $this->validate(['form.cf_turnstile' => [new TurnstileCheck()]]);
        }

        $validated = $this->form->validate();

        $validated['metadata'] = [
            'from_ip_address' => request()->ip(),
            'from_user_agent' => request()->userAgent(),
        ];

        $regis = RegisPersonal::create($validated);

        $this->successmsg = "Hi <b>{$validated['name']}</b>,"
            .' terima kasih atas pendaftaran yang Anda kirimkan! <br>'
            ."Kami telah mengirimkan salinan isi form ke email: <b>{$validated['email']}<b/>.<br/>";

        $this->form->reset();

        $this->dispatch('saved', msg: $this->successmsg);

        Mail::to($regis->email)->queue(new FormCopyMail(
            formname: 'Registrasi',
            psubject: 'Terima kasih atas pendaftaran yang Anda kirimkan',
            informations: [
                'Nama Lengkap' => $regis->name,
                'Email' => $regis->email,
                'No. Telepon' => $regis->phone,
                'Pekerjaan' => $regis->occupancy,
                'Afiliasi/Partai Politik' => $regis->affiliation,
                'Dapil DPRD' => $regis->dapil_dprd,
                'Alasan mencalonkan diri tingkat legislatif' => $regis->question_1,
                'Fokus isu yang dibawakan' => $regis->question_2,
                'Kebijakan/program yang ingin diterapkan' => $regis->question_3,
            ],
        ));
    }

    public function render(): View
    {
        return view('components.forms.form-register-personal');
    }
}
