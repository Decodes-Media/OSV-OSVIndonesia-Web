<section class="factories">
    <div class="container">
        <div class="row mb-6 mb-lg-8">
            <div class="col-12 col-lg-5 px-4 px-md-3 mb-4 mb-lg-0"> 
                <h2>{{@$data->title}}</h2>
            </div>
            <div class="col-12 col-lg-7 px-4 px-md-3">
                {!! @$data->desc !!}
            </div>
        </div>
        @if(!empty(@$data->content_data))
            @foreach(@$data->content_data as $content)
                <div class="row mb-6">
                    <div class="col-12 col-lg-6">
                        @if($content['content_type'] == 'thumbnail')
                            <img src="{{ public_url($content['content_thumbnail']) }}" class="w-100 img-fluid mb-4 lazy-load" alt="{{$content['content_title']}}" data-aos="fade-in" />
                        @else
                            <iframe src="{{ $content['content_youtube_url'] }}?controls=0?autoplay=1?loop=1" 
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
                    <div class="col-12 col-lg-6 d-flex align-items-center">
                        <div class="content">
                            <h3>{{$content['content_title']}}</h3>
                            {!! $content['content_desc'] !!}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>