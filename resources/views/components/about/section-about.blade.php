<section class="about">
    @if(@$data)
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    @if(@$data->factory_type == 'thumbnail')
                        <img src="{{ public_url(@$data->factory_thumbnail) }}" class="w-100 img-fluid mb-4 mb-md-5 lazy-load" alt="{{$data->factory_title}}" data-aos="fade-in" />
                    @else
                        <iframe class="youtube" src="{{ public_url(@$data->factory_youtube_url) }}?rel=0&modestbranding=1&autohide=1&mute=1&showinfo=0&controls=0&autoplay=1" frameborder="0" allowfullscreen"></iframe>
                    @endif
                </div>
                <div class="col-12 col-md-6 col-lg-5 mb-4 mb-md-0">
                    <h3 class="mb-4 text-uppercase" data-aos="fade-in">{{ @$data->factory_title }}</h3>
                </div>
                <div class="col-12 col-md-6 col-lg-7">
                    {!! @$data->factory_desc !!}
                    <a href="{{url('factory')}}" class="btn btn--outline-dark btn-magnetic fill mt-4" cursor="link">
                        Know More
                    </a>
                </div>
            </div>
        </div>
    @endif
</section>