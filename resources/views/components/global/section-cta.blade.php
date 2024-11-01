@php
    /** @var \App\Settings\HomeSetting $setting */
    $setting = app(\App\Settings\HomeSetting::class);
@endphp
<section class="cta" style="background-image:{{public_url($setting->cta_background)}} !important">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mb-4 mb-md-0">
                <h2 data-aos="fade-in">{{$setting->cta_title}}</h2>
            </div>
            <div class="col-12 col-md-6">
                {!! $setting->cta_desc !!}
                <a href="{{$setting->cta_link_url}}" class="btn btn--outline-light btn-magnetic fill mt-4" cursor="link">{{$setting->cta_link_text}}</a>
            </div>
        </div>
    </div>
</div>