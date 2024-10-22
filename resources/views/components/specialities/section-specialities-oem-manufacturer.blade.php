@push('pageStyles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@recogito/annotorious@latest/dist/annotorious.min.css">
    <style>
        .r6o-arrow {display: none !important}
        .r6o-taglist {display: none !important}
        .r6o-footer {display: none !important}
        .r6o-widget.r6o-tag {background: white !important}
        #prdx {background: #FFF; border-radius: 1rem !important}
    </style>
@endpush

<section class="oem-manufacturer" id="oem-manufacturer">
    <div class="container">
        <div class="row" data-aos="fade-in">
            <div class="col-12 mb-4 px-2 px-md-3">
                <h2>{{@$data->manufacture_title}}</h2>
            </div>
            <div class="col-12 col-lg-4 mb-3 mb-md-0 px-2 px-lg-3">
                <div class="row">
                    <div class="col-12 mb-3">
                        <img src="{{ public_url(@$data->manufacture_img1) }}" class="img-fluid w-100" alt="{{@$data->manufacture_title.' 1'}}" loading="lazy">
                    </div>
                    <div class="col-12">
                        <img src="{{ public_url(@$data->manufacture_img2) }}" class="img-fluid w-100" alt="{{@$data->manufacture_title.' 2'}}" loading="lazy">
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 px-2 px-md-3">
                {!! @$data->manufacture_desc !!}
                <img src="{{ public_url(@$data->manufacture_thumbnail) }}" class="img-fluid w-100 mt-4" alt="{{@$data->manufacture_title.' Thumbnail'}}" loading="lazy" id="img-insp">
            </div>
        </div>
    </div>
</section>

@php
    $annoData = route('api.specialities.material_tags_w3c_anotation'); 
@endphp

@push('pageScripts')
    <script src="https://cdn.jsdelivr.net/npm/@recogito/annotorious@latest/dist/annotorious.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@recogito/annotorious-selector-pack@latest/dist/annotorious-selector-pack.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@recogito/annotorious-toolbar@latest/dist/annotorious-toolbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@recogito/annotorious-better-polygon@latest/dist/annotorious-better-polygon.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/svg-polygon-center@1.0.2/dist/svg-polygon-center.min.js"></script>
    <script>
        var anno = null;
        var annoShowDropdownProducts = function(annotation, element) {
            var materials = annotation.body.map((ant) => ant.value);
            // var lists = materials.map((sku) => $(`#${sku}`).clone(true));
            anno.selectAnnotation(annotation.id);
            setTimeout(() => {
                $('.prdc').remove();
                $('.r6o-widget').append(`<div class="prdc"><ul id="prdx"></ul></div>`);
                // lists.forEach(element => {
                //     element.id = (Math.random() + 1).toString(36).substring(7);
                //     $('#prdx').append(element);
                // });

                materials.map((name) =>  {
                    const materialData =  @json($material);
                    const material = '<li style="cursor: pointer" class="productx">' +
                        '<div class="tile--similar-product">' +
                            '<div class="tile--similar-product__thumbnail">' +
                                '<img src="'+materialData[name]+'" alt="'+name+'">' +
                            '</div>'+
                            '<div class="tile--similar-product__desc">'+
                                '<h4>'+name+'</h4>'+
                            '</div>'+
                        '</div>'+
                        '</li>'
                    $('#prdx').append(material);
                });
            }, 123);
        };
        window.addEventListener('load', function() {
            anno = Annotorious.init({ image: 'img-insp', readOnly: true });
            anno.loadAnnotations('{{ $annoData }}');
            anno.on('mouseEnterAnnotation', annoShowDropdownProducts);
            anno.on('clickAnnotation', annoShowDropdownProducts);
            // anno.on('mouseLeaveAnnotation', function(annotation, element) {
            //     try { anno.cancelSelected(); $('.prdc').remove(); } catch (error) { };
            // });
        });
    </script>
@endpush