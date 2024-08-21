<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class AspirationForm extends Form
{
    #[Rule('required|min:5,max:128', as: 'Nama Lengkap')]
    public string $name = '';

    #[Rule('required|min:5|email|max:128', as: 'Email')]
    public string $email = '';

    #[Rule('required|string|min:10,max:1024', as: 'Kolom Aspirasi')]
    public string $message = '';
}
