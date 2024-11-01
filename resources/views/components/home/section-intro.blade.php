<section class="introduction">
    @if(!empty(@$data))
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 order-2 order-lg-1">
                    <h3 class="mb-4 text-uppercase" data-aos="fade-in">{{ @$data->factory_title }}</h3>
                    <p>
                        {!! @$data->factory_desc !!}
                    </p>
                    <a href="{{ url('factory') }}" class="btn btn--outline-dark btn-magnetic fill mt-4" cursor="link">
                        Know More
                    </a>
                </div>
                <div class="col-12 col-lg-7 order-1 order-lg-2 mb-4 mb-lg-0">
                    @if(@$data->factory_type == 'thumbnail')
                        <img src="{{ public_url(@$data->factory_thumbnail) }}" class="w-100 img-fluid lazy-load" alt="{{@$data->factory_title}}" data-aos="fade-in" />
                    @else
                        <iframe class="youtube" src="{{ @$data->factory_youtube_url }}?rel=0&modestbranding=1&autohide=1&mute=1&showinfo=0&controls=0&autoplay=1" frameborder="0" allowfullscreen"></iframe>
                    @endif
                </div>
            </div>
        </div>
    @endif
</section>