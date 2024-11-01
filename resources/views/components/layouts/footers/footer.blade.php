<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 text-center text-md-left mb-4 mb-md-0 d-flex align-items-end justify-content-center justify-content-lg-start">
                    <a href="#">
                        <img src="{{ public_url($setting->logo_black_path) }}" class="img-fluid footer-logo" alt="Logo" loading="lazy">
                    </a>
                </div>

                <div class="col-12 col-lg-6 text-center mb-4 mb-md-0 d-flex align-items-end justify-content-center">
                    <div class="company-location d-flex justify-content-center">
                        <div class="company-location__left pb-0">
                            <a href="{{ $siteSetting->factory_link }}">
                                <h5>{{$siteSetting->factory_text}}</h5>
                                <p>{{$siteSetting->factory_location_text}}</p>
                            </a>
                        </div>
                        <div class="company-location__right pb-0">
                            <a href="{{ $siteSetting->office_link }}">
                                <h5>{{$siteSetting->office_text}}</h5>
                                <p>{{$siteSetting->office_location_text}}</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3 text-center text-md-right d-flex align-items-end justify-content-center justify-content-lg-end">
                    <ul class="social-media mb-0 d-flex">
                        <li class="mr-2">
                            <a href="{{$setting->social_linkedin_url}}" target="_blank">
                                <i class="fab fa-linkedin mr-1"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{$setting->social_instagram_url}}" target="_blank">
                                <i class="fab fa-instagram mr-1"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 text-center text-md-left order-2 order-md-1 d-flex align-items-center justify-content-center justify-content-md-start">
                    <h6>{{$siteSetting->copyright}}</h6>
                </div>

                <div class="col-12 col-md-6 text-center text-md-right order-1 order-md-2 mb-4 mb-md-0">
                    <ul class="footer-menu">
                        <li>
                            <a href="" data-toggle="modal" data-target="#privacy_policy">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="" data-toggle="modal" data-target="#terms_conditions">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
