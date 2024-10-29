<section class="values">
    @if(@$data)
        <div class="container-fluid">
            <div class="row mb-4 mb-md-5">
                <div class="col-12">
                    <h2 class="text-center">Our Foundational Beliefs</h2>
                </div>
            </div>

            <div class="row">
                @for ($i = 1; $i <= 4; $i++)
                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0 px-lg-4">
                        <div class="card-animation values">
                            @php
                                $thumbnail = $data->{'fb_thumbnail'.$i};
                                $title = $data->{'fb_title'.$i};
                                $desc = $data->{'fb_desc'.$i}  
                            @endphp
                            <img src="{{ public_url($thumbnail) }}" class="card-animation__image lazy-load" alt="{{$title}}" />
                            <div class="card-animation__overlay">
                                <div class="card-animation__header">
                                    <div class="card-animation__header-text">
                                        <h4 class="card-animation__title">{{$title}}</h4>
                                        <p class="card-animation__description">{{$desc}}</p>            
                                    </div>
                                </div>
                                <span class="card-animation__link pb-4">
                                
                                </span>
                            </div>
                        </div> 
                    </div>
                @endfor
            </div>
        </div>
    @endif
</section>