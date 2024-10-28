<section class="services">
    <div class="container">
        <!-- <div class="row mb-4 mb-md-5">
            <div class="col-12">
                <h2 class="text-center" data-aos="fade-in">Manufacturing All Furniture You Need</h2>
            </div>
        </div> -->
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 col-lg-4 offset-lg-0 mb-4 mb-lg-0">
                <a href="{{@$data->manufacture_link1}}">
                    <div class="card-animation" data-aos="fade-in">
                        <img src="{{ public_url(@$data->manufacture_thumb1)}}" class="card-animation__image lazy-load" alt="{{@$data->manufacture_title1}}" />
                        <div class="card-animation__overlay">
                            <div class="card-animation__header">
                                <div class="card-animation__header-text">
                                    <h4 class="card-animation__title">{{@$data->manufacture_title1}}</h4>
                                    <p class="card-animation__description">{!! @$data->manufacture_desc1 !!}</p>            
                                </div>
                            </div>
                            <span class="card-animation__link pb-4">
                                <a href="{{@$data->manufacture_link1}}" class="btn btn-magnetic">
                                    Learn More
                                </a>
                            </span>
                        </div>
                    </div>
                </a> 
            </div>
            <div class="col-12 col-md-6 offset-md-3 col-lg-4 offset-lg-0 mb-4 mb-lg-0">
                <a href="{{@$data->manufacture_link2}}">
                    <div class="card-animation" data-aos="fade-in">
                        <img src="{{public_url(@$data->manufacture_thumb2)}}" class="card-animation__image" alt="{{@$data->manufacture_title2}}" />
                        <div class="card-animation__overlay">
                            <div class="card-animation__header">
                                <div class="card-animation__header-text">
                                    <h4 class="card-animation__title">{{@$data->manufacture_title2}}</h4>
                                    <p class="card-animation__description">{!! @$data->manufacture_desc2 !!}</p>            
                                </div>
                            </div>
                            <span class="card-animation__link pb-4">
                                <a href="{{@$data->manufacture_link2}}" class="btn btn-magnetic">
                                    Learn More
                                </a>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 offset-md-3 col-lg-4 offset-lg-0 mb-4 mb-lg-0">
                <a href="{{@$data->manufacture_link3}}">
                    <div class="card-animation" data-aos="fade-in">
                        <img src="{{public_url(@$data->manufacture_thumb3)}}" class="card-animation__image" alt="{{@$data->manufacture_title3}}" />
                        <div class="card-animation__overlay">
                            <div class="card-animation__header">
                                <div class="card-animation__header-text">
                                    <h4 class="card-animation__title">{{@$data->manufacture_title3}}</h4>
                                    <p class="card-animation__description">{!! @$data->manufacture_desc3 !!}</p>            
                                </div>
                            </div>
                            <span class="card-animation__link pb-4">
                                <a href="{{@$data->manufacture_link3}}" class="btn btn-magnetic">
                                    Learn More
                                </a>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
