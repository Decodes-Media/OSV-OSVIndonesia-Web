<section class="features">
    @if(!empty($data))
        <div class="container">
            <div class="row">
                @foreach($data as $stat)
                    <div class="col-12 col-sm-6 offset-sm-3 col-md-4 offset-md-0">
                        <div class="tile--features" data-aos="fade-in">
                            <img src="{{ public_url($stat['stat_thumb']) }}" class="w-75 d-block mx-auto img-fluid lazy-load" alt="{{$stat['stat_title']}}" />
                            <h3>{{$stat['stat_title']}}</h3>
                            <p>{{$stat['state_desc']}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</section>