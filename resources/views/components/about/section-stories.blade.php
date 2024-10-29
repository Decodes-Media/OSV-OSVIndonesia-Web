<section class="stories">
    @if(@$data)
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 px-4 px-md-0 mb-4 mb-lg-0">
                    <h2>{{$data->banner_title}}</h2>
                </div>
                <div class="col-12 col-lg-7 px-4 px-md-0">
                    {!! $data->banner_desc !!}
                </div>
            </div>
        </div>
    @endif
</section>