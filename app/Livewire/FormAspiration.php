<?php

namespace App\Livewire;

use App\Livewire\Forms\AspirationForm;
use App\Models\Aspiration;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormAspiration extends Component
{
    use WithFileUploads;

    public AspirationForm $form;

    public string $successmsg = '';

    public function save(): void
    {
        $validated = $this->form->validate();

        $validated['metadata'] = [
            'from_ip_address' => request()->ip(),
            'from_user_agent' => request()->userAgent(),
        ];

        Aspiration::create($validated);

        $this->successmsg = "Hi <b>{$validated['name']}</b>,"
            .' terima kasih atas tanggapan yang Anda diberikan,'
            .' Semoga <b>Jakarta menjadi lebih baik</b> berkat aspirasimu!';

        $this->form->reset();

        $this->dispatch('saved', msg: $this->successmsg);
    }

    public function render(): View
    {
        return view('components.forms.form-aspiration');
    }
}
