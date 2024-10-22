@php 
    $record = app(\App\Settings\SpecialitiesSetting::class);

    $metadata = null;
    if(@$record->manufacture_metadata != null){
        $metadata = $record->manufacture_metadata['material_tags_w3c_anotation'];
    }

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
            {{-- Annotorious.SelectorPack(this.anno); --}}
            {{-- Annotorious.BetterPolygon(this.anno); --}}
            {{-- this.anno.setDrawingTool('polygon'); --}}
            if(this.state) this.anno.loadAnnotations('{{ json_encode($metadata ?? []); }}');
            this.anno.on('createAnnotation', () => self.syncState());
            this.anno.on('updateAnnotation', () => self.syncState());
            this.anno.on('deleteAnnotation', () => self.syncState());
        },
        syncState() {
            this.state = this.anno.getAnnotations();
            document.getElementById('vtags').value = JSON.stringify(this.state);
        },
    }">
        {{-- TODO: connect multiple toolbar --}}
        {{-- [ 'rect', 'polygon', 'point', 'circle', 'ellipse', 'freehand' ] --}}
        {{-- <div id="my-toolbar-container">
            <div class="a9s-toolbar">
                <button class="a9s-toolbar-btn freehand" type="button" x-on:click="drawing('point')">
                    <span class="a9s-toolbar-btn-inner">
                        <svg viewBox="0 0 70 50"><g><path d="m 34.427966,2.7542372 c 0,0 -22.245763,20.7627118 -16.737288,27.7542378 5.508475,6.991525 27.648305,-15.36017 34.639831,-9.11017 6.991525,6.25 -11.440678,13.665255 -13.983051,25.423729"></path><g class=handles><circle cx=34.427966 cy=2.7542372 r=5></circle><circle cx=38.347458 cy=46.822033 r=5></circle></g></g></svg>
                    </span>
                </button>
            </div><br>
        </div> --}}
        <img style="width:auto;max-height:420px" id="my-image" src="{{ public_url(@$record->manufacture_thumbnail) }}"> <br>
        <x-filament::button wire:click="set('{{ $getStatePath() }}', document.getElementById('vtags').value);">
            {{ __('Save') }}
        </x-filament::button>
    </div>
</x-dynamic-component>
