<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class MailingListForm extends Form
{
    #[Rule('required|min:5|email|max:128', as: 'Email')]
    public string $email = '';

    #[Rule('required|boolean', as: 'Syarat Ketentuan')]
    public string $terms = '';
}
