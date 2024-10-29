@php 
    $record = app(\App\Settings\SpecialitiesSetting::class);
    $materialName = json_encode(\App\Models\Material::all()->pluck('name'))
@endphp

<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <input type="hidden" id="vtags">
    <div x-data="{
        anno: null,
        vocabulary: JSON.parse(`{{ @$materialName }}`),
        state: $wire.entangle('{{ $getStatePath() }}').defer,
        init() {
            var self = this;
            this.state = @json($getState);
            this.anno = Annotorious.init({
                image: 'my-image',
                widgets: [ { widget: 'TAG', vocabulary: this.vocabulary }, ],
            });
            {{-- for loadAnnotations please using the route --}}
            if(this.state) this.anno.loadAnnotations('{{ route('api.specialities.material_tags_w3c_anotation'); }}');
            this.anno.on('createAnnotation', () => self.syncState());
            this.anno.on('updateAnnotation', () => self.syncState());
            this.anno.on('deleteAnnotation', () => self.syncState());
        },
        syncState() {
            this.state = this.anno.getAnnotations();
            document.getElementById('vtags').value = JSON.stringify(this.state);
        },
    }">
        <img style="width:auto;max-height:420px" id="my-image" src="{{ public_url(@$record->manufacture_thumbnail) }}"> <br>
        <x-filament::button wire:click="set('{{ $getStatePath() }}', document.getElementById('vtags').value);">
            {{ __('Save') }}
        </x-filament::button>
    </div>
</x-dynamic-component>
