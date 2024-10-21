<section class="white-label" id="white-label">
    <div class="container">
        <div class="row" data-aos="fade-in">
            <div class="col-12 col-lg-9 px-2 px-md-3 mb-4 mb-lg-0">
                <h2 class="mb-4">{{@$data->product_title}}</h2>
                <div class="row gap-3 mb-4">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <img src="{{ public_url(@$data->product_img1) }}" class="img-fluid w-100" alt="{{@$data->product_title.' 1'}}" loading="lazy">
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="{{ public_url(@$data->product_img2) }}" class="img-fluid w-100" alt="{{@$data->product_title.' 2'}}" loading="lazy">
                    </div>
                </div>
                {!! $data->product_desc !!}
            </div>
            <div class="col-12 col-lg-3 px-2 px-md-3">
                <img src="{{ public_url(@$data->product_img3) }}" class="img-fluid w-100" alt="{{@$data->product_title.' 3'}}" loading="lazy">
                <img src="{{ public_url(@$data->product_img4) }}" class="img-fluid w-100 mt-4" alt="{{@$data->product_title.' 4'}}" loading="lazy">
            </div>
        </div>
    </div>
</section>