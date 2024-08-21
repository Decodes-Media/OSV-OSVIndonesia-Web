<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class ContactForm extends Form
{
    #[Rule('required|min:5,max:128', as: 'Nama Lengkap')]
    public string $name = '';

    #[Rule('required|min:5|email|max:128', as: 'Email')]
    public string $email = '';

    #[Rule('required|min:8,max:16', as: 'No. Telepon')]
    public string $phone = '';

    #[Rule('required|string|min:10,max:1024', as: 'Pesan')]
    public string $message = '';

    #[Rule('nullable', as: 'Captcha')]
    public string $cf_turnstile = '';
}
