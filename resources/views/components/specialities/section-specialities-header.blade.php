<section class="specialities-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <div class="banner" style="background-image:{{public_url(@$data->banner)}}"></div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-lg-5 px-4 px-md-3 mb-4 mb-lg-0">
                <h2>{{@$data->banner_title}}</h2>
            </div>
            <div class="col-12 col-lg-7 px-4 px-md-3">
               {!! @$data->banner_desc !!}
            </div>
        </div>
    </div>
</section>