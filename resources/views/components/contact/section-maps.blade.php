<section class="maps pb-5">
    @if(@$data)
        <div class="container px-4 px-lg-0">
            <div class="row">
                <div class="col-12">
                    <div class="tab-area">
                        <ul class="nav nav-tabs" id="Tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="factory-tab" data-toggle="tab" href="#factory" role="tab" aria-controls="factory" aria-selected="false">Factory</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="office-tab" data-toggle="tab" href="#office" role="tab" aria-controls="office" aria-selected="true">Marketing Office</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="TabContent">
                            <div class="tab-pane fade show active" id="factory" role="tabpanel" aria-labelledby="factory-tab">
                                <div class="row">
                                    <div class="col-12 col-lg-7">
                                        <iframe src="{{ @$data->maps_link }}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <div class="top mb-5">
                                            <h3>{{ @$data->maps_title }}</h3>
                                            <p>{!! @$data->maps_desc !!}</p>
                                        </div>
                                        <div class="bottom">
                                            {!! @$data->maps_bottom_text !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="office" role="tabpanel" aria-labelledby="office-tab">
                                <div class="row">
                                    <div class="col-12 col-lg-7">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.3196551000187!2d110.41617559999999!3d-7.088894700000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70892fb9e0daff%3A0xd7016198e7028bc2!2sPT.%20MEGA%20ANUGRAH%20UTAMA!5e0!3m2!1sid!2sid!4v1730513120876!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <div class="top mb-5">
                                            <h3>OSV Marketing Office</h3>
                                            <p>Mega Residence, Block, Catelya Garden No.15, Pudakpayung, Banyumanik, Semarang City, Central Java 50265.</p>
                                        </div>
                                        <div class="bottom">
                                            {!! @$data->maps_bottom_text !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>