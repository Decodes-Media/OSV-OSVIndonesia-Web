<section class="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8 px-0 mb-5 mb-lg-0">
                <div class="owl-carousel owl-carousel-1 owl-theme" data-aos="fade-in">
                    @foreach(@$data->banner_data as $banner)
                        <div class="item">
                            <div class="banner">
                                <div class="banner__thumb">
                                    <img src="{{ public_url($banner['banner']) }}" class="img-fluid" alt="{{$banner['alt']}}" loading="lazy">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12 col-lg-4 d-flex align-items-center justify-center pl-lg-5">
                <div class="content px-4">
                    <div class="tagline">
                        <!-- <ul>
                            <li><span class="title">Custom,</span></li>
                            <li><span class="title">Outdoor,</span></li>
                            <li><span class="title">Bespoke<span></li>
                            <li><span class="title">Furniture<span></li>
                        </ul> -->
                        <h2>{{@$data->title}}</h2>
                        <p>
                            {!! @$data->desc !!}
                        </p>
                    </div>
                    <a href="#" class="mt-5 btn btn-magnetic">
                        Speak to Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<x-modals.modal-user-data />