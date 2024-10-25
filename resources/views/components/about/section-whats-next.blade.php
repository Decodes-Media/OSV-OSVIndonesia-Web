<section class="about">
    @if(@$data)
        <div class="container">
            @if(!empty($data->content_data))
                @foreach($data->content_data as $content)
                    <div class="row">
                        <div class="col-12 text-center">
                            @if($content['content_type'] == 'thumbnail')
                                <img src="{{ public_url($content['content_thumbnail']) }}" class="w-100 img-fluid mb-4 mb-md-5 lazy-load" alt="{{$content['content_title']}}" data-aos="fade-in" />
                            @else
                                <iframe src="{{ $content['content_youtube_url'] }}?controls=0" 
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
                        <div class="col-12 col-md-6 col-lg-5 mb-4 mb-md-0">
                            <h3 class="mb-4 text-uppercase" data-aos="fade-in">{{$content['content_title']}}</h3>
                        </div>
                        <div class="col-12 col-md-6 col-lg-7">
                            {!! $content['content_desc'] !!}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @endif
</section>