<x-filament::button wire:click="create('only-db')" color="primary" outlined="true">
    {{ __('Only Database') }}
</x-filament::button>

<x-filament::button wire:click="create('only-files')" color="primary" outlined="true">
    {{ __('Only Files') }}
</x-filament::button>

<x-filament::button wire:click="create()" color="primary" outlined="true">
    {{ __('All — DB & Files') }}
</x-filament::button>
