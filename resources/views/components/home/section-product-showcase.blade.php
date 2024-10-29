<section class="product-showcase">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <h3 class="pl-md-2">SUPPORT <br/> FURNITURE BRANDS <br/> WORLDWIDE</h3>
                <div class="owl-carousel owl-carousel-2 owl-theme" data-aos="fade-in">
                    @foreach(@$data as $content)
                        <div class="item">
                            <div class="card--product">
                                <div class="card--product__thumb">
                                    <img src="{{ public_url($content['img']) }}" class="img-fluid" alt="{{$content['alt']}}" loading="lazy">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>