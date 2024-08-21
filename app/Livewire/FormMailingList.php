<?php

namespace App\Livewire;

use App\Livewire\Forms\MailingListForm;
use App\Models\MailingList;
use Illuminate\View\View;
use Livewire\Component;

class FormMailingList extends Component
{
    public MailingListForm $form;

    public string $successmsg = '';

    public function save(): void
    {
        $validated = $this->form->validate();

        $validated['metadata'] = [
            'from_ip_address' => request()->ip(),
            'from_user_agent' => request()->userAgent(),
        ];

        MailingList::create($validated);

        $this->successmsg = "Hi <b>{$validated['email']}</b>,"
            .' terima kasih telah mendaftar sebagai subscriber newsletter.';

        $this->form->reset();

        $this->dispatch('saved', msg: $this->successmsg);
    }

    public function render(): View
    {
        return view('components.forms.form-mailing-list');
    }
}
