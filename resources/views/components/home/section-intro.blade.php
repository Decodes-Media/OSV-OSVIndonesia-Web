<section class="introduction">
    @if(!empty(@$data))
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 mb-4">
                    <h3 class="mb-4 text-uppercase" data-aos="fade-in">{{ @$data->factory_title }}</h3>
                    <p>
                        {!! @$data->factory_desc !!}
                    </p>
                    <a href="{{@$data->factory_link}}" class="btn btn--outline-dark btn-magnetic fill mt-4" cursor="link">
                        Know More
                    </a>
                </div>
                <div class="col-12 col-lg-7">
                    @if(@$data->factory_type == 'thumbnail')
                        <img src="{{ public_url(@$data->factory_thumbnail) }}" class="w-100 img-fluid lazy-load" alt="{{@$data->factory_title}}" data-aos="fade-in" />
                    @else
                        <iframe src="{{ @$data->factory_youtube_url }}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay;" 
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen 
                            muted
                            class="youtube"
                            data-aos="fade-in" >
                        </iframe>
                    @endif
                </div>
            </div>
        </div>
    @endif
</section>