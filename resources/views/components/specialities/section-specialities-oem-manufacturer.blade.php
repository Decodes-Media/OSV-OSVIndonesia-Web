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

<section class="oem-manufacturer">
    <div class="container">
        <div class="row" data-aos="fade-in">
            <div class="col-12 mb-4">
                <h2>OEM Manufacturer</h2>
            </div>
            <div class="col-12 col-lg-4 mb-3 mb-md-0">
                <div class="row">
                    <div class="col-12 mb-3">
                        <img src="{{ asset('img/product/product-1.jpg') }}" class="img-fluid w-100" alt="Product" loading="lazy">
                    </div>
                    <div class="col-12">
                        <img src="{{ asset('img/product/product-2.jpg') }}" class="img-fluid w-100" alt="Product" loading="lazy">
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <p>Our dreams are big, as big our capacity in furniture manufacturing your dream designs.</p>
                <p>Just give us a brief with all the requirement needed for the product, and we would love to help You produce perfect furniture with your standard.</p>
                <img src="{{ asset('img/AAK_4383.jpg') }}" class="img-fluid w-100 mt-4" alt="Product" loading="lazy" id="img-insp">
            </div>
        </div>
    </div>
</section>

@push('pageScripts')
    <script src="https://cdn.jsdelivr.net/npm/@recogito/annotorious@latest/dist/annotorious.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@recogito/annotorious-selector-pack@latest/dist/annotorious-selector-pack.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@recogito/annotorious-toolbar@latest/dist/annotorious-toolbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@recogito/annotorious-better-polygon@latest/dist/annotorious-better-polygon.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/svg-polygon-center@1.0.2/dist/svg-polygon-center.min.js"></script>
    <script>
        var anno = null;
        var annoShowDropdownProducts = function(annotation, element) {
            var skus = annotation.body.map((ant) => ant.value);
            var lists = skus.map((sku) => $(`#${sku}`).clone(true));
            anno.selectAnnotation(annotation.id);
            setTimeout(() => {
                $('.prdc').remove();
                $('.r6o-widget').append(`<div class="prdc"><ul id="prdx"></ul></div>`);
                lists.forEach(element => {
                    element.id = (Math.random() + 1).toString(36).substring(7);
                    $('#prdx').append(element);
                });
            }, 123);
        };
        window.addEventListener('load', function() {
            anno = Annotorious.init({ image: 'img-insp', readOnly: true });
            anno.loadAnnotations('');
            anno.on('mouseEnterAnnotation', annoShowDropdownProducts);
            anno.on('clickAnnotation', annoShowDropdownProducts);
            // anno.on('mouseLeaveAnnotation', function(annotation, element) {
            //     try { anno.cancelSelected(); $('.prdc').remove(); } catch (error) { };
            // });
        });
    </script>
@endpush