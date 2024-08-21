<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class RegisRecommendForm extends Form
{
    #[Rule('required|min:5,max:128', as: 'Nama Lengkap')]
    public string $name = '';

    #[Rule('required|min:5|email|max:128', as: 'Email')]
    public string $email = '';

    #[Rule('required|min:8,max:16', as: 'No. Telepon')]
    public string $phone = '';

    #[Rule('required|min:5,max:128', as: 'Nama Lengkap Rekomendasi')]
    public string $person_name = '';

    #[Rule('required|min:5,max:128', as: 'Afiliasi/Partai Politik')]
    public string $person_affiliation = '';

    #[Rule('required|string|min:30,max:1024', as: 'Alasan Rekomendasi')]
    public string $reason = '';

    #[Rule('nullable', as: 'Captcha')]
    public string $cf_turnstile = '';
}
