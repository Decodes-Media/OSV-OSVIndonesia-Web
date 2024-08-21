<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class RegisPersonalForm extends Form
{
    #[Rule('required|min:5,max:128', as: 'Nama Lengkap')]
    public string $name = '';

    #[Rule('required|min:5|email|max:128', as: 'Email')]
    public string $email = '';

    #[Rule('required|numeric|min:8,max:16', as: 'No. Telepon')]
    public string $phone = '';

    #[Rule('required|min:5,max:128', as: 'Pekerjaan')]
    public string $occupancy = '';

    #[Rule('required|min:5,max:128', as: 'Afiliasi/Partai Politik')]
    public string $affiliation = '';

    #[Rule('nullable|min:1,max:128', as: 'Dapil DPRD')]
    public string $dapil_dprd = '';

    #[Rule('required|string|min:30,max:2048', as: 'Alasan mencalonkan diri tingkat legislatif?')]
    public string $question_1 = '';

    #[Rule('required|min:5,max:2048', as: 'Fokus isu yang dibawakan?')]
    public string $question_2 = '';

    #[Rule('required|min:30,max:2048', as: 'Kebijakan/program yang ingin diterapkan')]
    public string $question_3 = '';

    #[Rule('nullable', as: 'Captcha')]
    public string $cf_turnstile = '';
}
