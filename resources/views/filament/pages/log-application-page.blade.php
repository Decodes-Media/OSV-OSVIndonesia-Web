<x-filament::page>
  <style>
    .bg-danger {
      background-color: rgb(185 28 28);
    }
    .bg-warning {
      background-color: rgb(251 191 36);
    }
    .bg-info {
      background-color: rgb(34 211 238);
    }
    .no-bottom-radius {
      border-bottom-left-radius: 0 !important;
      border-bottom-right-radius: 0 !important;
    }
    .no-top-radius {
      border-top-left-radius: 0 !important;
      border-top-right-radius: 0 !important;
    }
    .mb-0 {
      margin-bottom: 0 !important;
    }
  </style>
  <div class="flex items-center justify-between">
    <div class="w-full mr-2">
      {{ $this->form }}
    </div>
    <div class="w-auto ml-2">
      <x-filament::button wire:click="delete" :disabled="is_null(@$this->data['file'])" type="button" color="danger">
        {{ __('Delete') }}
      </x-filament::button>
    </div>
    <div class="w-auto ml-2">
      <x-filament::button wire:click="download" :disabled="is_null(@$this->data['file'])" type="button" color="primary">
        {{ __('Download') }}
      </x-filament::button>
    </div>
  </div>
  {{-- <x-filament::hr /> --}}
  <div>
    <div>
      <div x-data="{ isCardOpen: null }" class="flex flex-col">
        @forelse($this->getLogs() as $key => $log)
            <div class="rounded-xl relative mb-2 py-3 px-3 bg-{{ $log['level_class'] }}"
                :class="{'no-bottom-radius mb-0': isCardOpen == {{$key}}}">
            <a @click="isCardOpen = isCardOpen == {{$key}} ? null : {{$key}} "
                style="cursor: pointer;" class="block overflow-hidden rounded-t-xl text-white">
                <span>[{{ $log['date'] }}]</span>
                {{ Str::limit($log['text'], 100) }}
            </a>
            </div>
            <div x-show="isCardOpen=={{$key}}" class="mb-2 px-4 py-4 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-xl no-top-radius">
            <div>
                <p>{{$log['text']}}</p>
                @if(!empty($log['stack']))
                <div class="bg-gray-100 dark:bg-gray-900 mt-4 p-4 text-sm opacity-40">
                <pre style="overflow-x: scroll;"><code>{{ trim($log['stack']) }}</code></pre>
                </div>
                @endif
            </div>
            </div>
        @empty
            <h3 class="text-center">{{ __('No logs to display') }}</h3>
        @endforelse
      </div>
    </div>
  </div>
  <x-filament-actions::modals />
</x-filament::page>
