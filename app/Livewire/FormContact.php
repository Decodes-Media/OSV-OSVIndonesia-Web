<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactForm;
use App\Mail\FormCopyMail;
use App\Models\Contact;
use Coderflex\LaravelTurnstile\Rules\TurnstileCheck;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Livewire\Component;

class FormContact extends Component
{
    public ContactForm $form;

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

        $contact = Contact::create($validated);

        $this->successmsg = "Hi <b>{$validated['name']}</b>,"
            .' terima kasih atas masukan yang Anda diberikan! <br>'
            ."Kami telah mengirimkan salinan isi form ke email: <b>{$validated['email']}<b/>.<br/>";

        $this->form->reset();

        $this->dispatch('saved', msg: $this->successmsg);

        Mail::to($contact->email)->queue(new FormCopyMail(
            formname: 'Kontak',
            psubject: 'Terima kasih atas masukan yang Anda diberikan',
            informations: [
                'Nama Lengkap' => $contact->name,
                'Email' => $contact->email,
                'No. Telepon' => $contact->phone,
                'Pesan' => $contact->message,
            ],
        ));
    }

    public function render(): View
    {
        return view('components.forms.form-contact');
    }
}
