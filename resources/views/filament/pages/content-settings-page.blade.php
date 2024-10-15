<x-filament::page>
    <form wire:submit.prevent="submit" class="space-y-6">
        {{ $this->form }}
        @if (! $this->disableForm)
            <div class="flex flex-wrap items-center gap-4 justify-start">
                <x-filament::button type="submit">
                    {{ __('Save') }}
                  </x-filament::button>
                  <x-filament::button type="button" color="secondary" tag="a" :href="$this->cancel_button_url">
                    {{ __('Cancel') }}
                  </x-filament::button>
            </div>
        @endif
    </form>
    <x-filament-actions::modals />
</x-filament::page>