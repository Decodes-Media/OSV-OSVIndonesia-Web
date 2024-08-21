<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class DonationForm extends Form
{
    #[Rule('required|min:5,max:128', as: 'Nama Lengkap')]
    public string $name = '';

    #[Rule('nullable|min:5,max:128', as: 'Organisasi')]
    public string $orgname = '';

    #[Rule('required|min:5|email|max:128', as: 'Email')]
    public string $email = '';

    #[Rule('required|min:8,max:16', as: 'No. Telepon')]
    public string $phone = '';

    #[Rule('required|numeric|min:10000|max:10000000000', as: 'Jumlah Donasi')]
    public string $amount = '';

    #[Rule('required|file|mimes:jpg,jpeg,png,pdf|max:4096', as: 'Upload Bukti Donasi')]
    public mixed $proof;

    #[Rule('required|string|min:10,max:1024', as: 'Pesan Donasi')]
    public string $message = '';

    #[Rule('nullable', as: 'Jangan Tampilkan Nama')]
    public string $is_anonymous = '';

    #[Rule('nullable', as: 'Captcha')]
    public string $cf_turnstile = '';
}
