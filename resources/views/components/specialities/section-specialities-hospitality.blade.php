<section class="hospitality" id="bespoke-hospitality">
    <div class="container">
        <div class="row align-items-center mb-4" data-aos="fade-in">
            <div class="col-12 col-lg-6 px-2 px-md-3">
                <h2>{{ @$data->project_title }}</h2>
            </div>
            <div class="col-12 col-lg-6 d-flex align-items-center px-2 px-lg-3">
                <div class="row gap-3">
                    <div class="col-4">
                        <img src="{{ public_url(@$data->project_top_img1) }}" class="img-fluid w-100" alt="{{ @$data->project_title." 1" }}" loading="lazy">
                    </div>
                    <div class="col-4">
                        <img src="{{ public_url(@$data->project_top_img2) }}" class="img-fluid w-100" alt="{{ @$data->project_title." 2" }}" loading="lazy">
                    </div>
                    <div class="col-4">
                        <img src="{{ public_url(@$data->project_top_img3) }}" class="img-fluid w-100" alt="{{ @$data->project_title." 3" }}" loading="lazy">
                    </div>
                </div>
            </div>
        </div>

        <div class="row" data-aos="fade-in">
            <div class="col-12 col-lg-6 px-2 px-md-3">
                <div class="row gap-3">
                    <div class="col-12 col-sm-6 mb-3">
                        <img src="{{ public_url(@$data->project_side_img1) }}" class="img-fluid w-100" alt="{{ @$data->project_title." 4" }}" loading="lazy">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <img src="{{ public_url(@$data->project_side_img2) }}" class="img-fluid w-100" alt="{{ @$data->project_title." 5" }}" loading="lazy">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <img src="{{ public_url(@$data->project_side_img3) }}" class="img-fluid w-100" alt="{{ @$data->project_title." 6" }}" loading="lazy">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <img src="{{ public_url(@$data->project_side_img4) }}" class="img-fluid w-100" alt="{{ @$data->project_title." 7" }}" loading="lazy">
                    </div>
                    <div class="col-12 mb-3">
                        <img src="{{ public_url(@$data->project_thumbnail2) }}" class="img-fluid w-100 mb-4" alt="{{ @$data->project_title." Thumbnail 2" }}" loading="lazy">
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 px-2 px-md-3">
                <img src="{{ public_url(@$data->project_thumbnail1) }}" class="img-fluid w-100 mb-4" alt="{{ @$data->project_title." Thumbnail 1" }}" loading="lazy">
                {!! @$data->project_desc !!}
            </div>
        </div>
    </div>
</section>