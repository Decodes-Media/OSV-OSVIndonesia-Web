<?php

namespace App\Livewire;

use App\Livewire\Forms\RegisRecommendForm;
use App\Mail\FormCopyMail;
use App\Models\RegisRecommend;
use Coderflex\LaravelTurnstile\Rules\TurnstileCheck;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Livewire\Component;

class FormRegisRecommend extends Component
{
    public RegisRecommendForm $form;

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

        $regis = RegisRecommend::create($validated);

        $this->successmsg = "Hi <b>{$validated['name']}</b>,"
            .' terima kasih atas rekomendasi yang Anda berikan! <br>'
            ."Kami telah mengirimkan salinan isi form ke email: <b>{$validated['email']}<b/>.<br/>";

        $this->form->reset();

        $this->dispatch('saved', msg: $this->successmsg);

        Mail::to($regis->email)->queue(new FormCopyMail(
            formname: 'Registrasi',
            psubject: 'Terima kasih atas rekomendasi yang Anda berikan',
            informations: [
                'Nama Lengkap' => $regis->name,
                'Email' => $regis->email,
                'No. Telepon' => $regis->phone,
                'Nama Lengkap Rekomendasi' => $regis->person_name,
                'Afiliasi/Partai Politik Orang yang Direkomendasikan' => $regis->person_affiliation,
                'Mengapa merekomendasikan Caleg tersebut' => $regis->reason,
            ],
        ));
    }

    public function render(): View
    {
        return view('components.forms.form-register-recommend');
    }
}
