<section class="certificate">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2 mb-4">
                <div class="content text-center" data-aos="fade-in">
                    <h2 class="mb-4">{{$data->cert_title}}</h2>
                    {!! $data->cert_desc !!}
                </div>
            </div>
            <div class="col-12" data-aos="fade-in">
                <div class="row d-flex justify-content-center align-items-center">
                    @for ($i = 1; $i <= 5; $i++)
                        @if($data->{'cert_image'.$i})
                            <div class="col-12 col-md-4">
                                <img src="{{ public_url($data->{'cert_image'.$i}) }}" class="w-50 d-block mx-auto img-fluid lazy-load" alt="certification_{{$i}}" />
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>