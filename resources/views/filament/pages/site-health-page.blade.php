@php
  function backgroundColor($status)
  {
      return match ($status) {
          'ok' => 'bg-emerald-100',
          'warning' => 'bg-yellow-100',
          'normal' => 'bg-blue-100',
          'skipped' => 'bg-blue-100',
          'failed' => 'bg-red-100',
          'crashed' => 'bg-red-100',
          default => 'bg-gray-100',
      };
  }
  function iconColor($status)
  {
      return match ($status) {
          'ok' => 'text-emerald-500',
          'warning' => 'text-yellow-500',
          'normal' => 'text-blue-500',
          'skipped' => 'text-blue-500',
          'failed' => 'text-red-500',
          'crashed' => 'text-red-500',
          default => 'text-gray-500',
      };
  }
  function icon($status)
  {
      return match ($status) {
          'ok' => 'check-circle',
          'warning' => 'exclamation-circle',
          'normal' => 'information-circle',
          'skipped' => 'arrow-circle-right',
          'failed' => 'x-circle',
          'crash' => 'x-circle',
          default => '',
      };
  }
@endphp

<x-filament::page>
  <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($checkResults as $result)
      <div class="flex items-start p-6 space-x-2 rtl:space-x-reverse overflow-hidden text-opacity-0 transform bg-white rounded-xl shadow dark:bg-gray-800">
        <div class="flex justify-center items-center rounded-full p-2.5 {{ backgroundColor($result['status']) }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ iconColor($result['status']) }}" viewBox="0 0 20 20" fill="currentColor">
            @if (icon($result['status']) == 'check-circle')
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            @elseif(icon($result['status']) == 'exclamation-circle')
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            @elseif(icon($result['status']) == 'arrow-circle-right')
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
            @elseif(icon($result['status']) == 'x-circle')
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            @else
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            @endif
          </svg>
        </div>
        <div>
          <dd class="-mt-1 font-semibold text-gray-800 md:mt-1 md:text-xl dark:text-gray-200">
            {{ $result['label'] }}
          </dd>
          <dt class="mt-0 text-sm font-medium text-gray-600 md:mt-1 dark:text-gray-400">
            {!! $result['message'] !!}
          </dt>
        </div>
      </div>
    @endforeach
  </dl>
  <div class="text-gray-500 text-md text-center font-medium">
    <strong>{{ __('Last checked at: ') }}</strong>
    {{ $lastRanAt->translatedFormat('d M Y H:i:s') }}
    {{-- ({{ $lastRanAt->diffForHumans() }}) --}}
  </div>
</x-filament::page>

<script>
    setInterval(function() {
        var date = (new Date()).toLocaleDateString("id-ID", {
            day: 'numeric', month: 'long', year: 'numeric',
            hour: 'numeric', minute: 'numeric', second: 'numeric',
        });
        document.getElementById('lclock').innerHTML = date;
    }, 1000);
</script>
