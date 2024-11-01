@if (Route::is('index'))
<header id="navbar" class="home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <a href="{{ url('/') }}">
                    <img src="{{ public_url($setting->logo_white_path) }}" class="img-fluid header-logo logo-light d-none" alt="Logo" loading="lazy">
                    <img src="{{ public_url($setting->logo_black_path) }}" class="img-fluid header-logo logo-dark" alt="Logo" loading="lazy">
                </a>

                <div id="toggle-btn" class="btn">
                    <div class="btn-outline btn-outline-1"></div>
                    <div class="btn-outline btn-outline-2"></div>
                    <div id="hamburger">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                    </div>
                </div>

                <div class="overlay">
                    <svg viewBox="0 0 1000 1000">
                        <path d="M0 1S175 0.5 500 1s500 0.5 500 1V0H0Z"></path>
                    </svg>
                </div>

                <div class="menu">
                    <div class="secondary-menu pt-3 pt-md-5 pt-lg-0">
                        <div class="menu-container">
                            <div class="wrapper">
                                <div class="menu-item d-none d-lg-block">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ public_url($setting->logo_black_path) }}" class="img-fluid w-50 mb-5" alt="Logo" loading="lazy">
                                    </a>
                                </div>

                                <div class="menu-item">
                                    <a href="mailto:{{$setting->email}}" target="_blank">
                                        <i class="far fa-envelope mr-1"></i>
                                        {{$setting->email}}
                                    </a>
                                </div>

                                <!-- <div class="menu-item">
                                    <a href="#" target="_blank">
                                        <i class="fa fa-phone mr-1"></i>
                                        +62 857 5917 1919
                                    </a>
                                </div> -->

                                <div class="menu-item">
                                    <a href="{{$setting->social_instagram_url}}" target="_blank">
                                        <i class="fab fa-instagram mr-1"></i>
                                        {{{$setting->social_instagram_name}}}
                                    </a>
                                </div>

                                <div class="menu-item">
                                    <a href="{{$setting->social_linkedin_url}}" target="_blank">
                                        <i class="fab fa-linkedin mr-1"></i>
                                        {{$setting->social_linkedin_name}}
                                    </a>
                                </div>

                                <div class="menu-item mt-5">
                                    <button data-toggle="modal" data-target="#modalUserData" class="btn btn-download btn-magnetic">Download Company Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="primary-menu">
                        <div class="menu-container">
                            <div class="wrapper">
                                <div class="menu-item">
                                    <a href="{{ url('/') }}"><span>•</span>Home</a>
                                </div>

                                <div class="menu-item">
                                    <a href="{{ url('about-us') }}"><span>•</span>About Us</a>
                                </div>

                                <div class="menu-item">
                                    <a href="{{ url('specialities') }}"><span>•</span>Specialities</a>
                                </div>

                                <div class="menu-item">
                                    <a href="{{ url('projects') }}"><span>•</span>Projects</a>
                                </div>

                                <div class="menu-item">
                                    <a href="{{ url('factory') }}"><span>•</span>Factory</a>
                                </div> 

                                <div class="menu-item">
                                    <a href="{{ url('contact-us') }}"><span>•</span>Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@else
<header id="navbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <a href="{{ url('/') }}">
                    <img src="{{ public_url($setting->logo_white_path) }}" class="img-fluid header-logo logo-light center" alt="Logo" loading="lazy">
                    <img src="{{ public_url($setting->logo_black_path) }}" class="img-fluid header-logo logo-dark" alt="Logo" loading="lazy">
                </a>

                <div id="toggle-btn" class="btn">
                    <div class="btn-outline btn-outline-1"></div>
                    <div class="btn-outline btn-outline-2"></div>
                    <div id="hamburger">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                    </div>
                </div>

                <div class="overlay">
                    <svg viewBox="0 0 1000 1000">
                        <path d="M0 1S175 0.5 500 1s500 0.5 500 1V0H0Z"></path>
                    </svg>
                </div>

                <div class="menu">
                    <div class="secondary-menu pt-3 pt-md-5 pt-lg-0">
                        <div class="menu-container">
                            <div class="wrapper">
                                <div class="menu-item d-none d-lg-block">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ public_url($setting->logo_black_path) }}" class="img-fluid w-50 mb-5" alt="Logo" loading="lazy">
                                    </a>
                                </div>

                                <div class="menu-item">
                                    <a href="mailto:{{$setting->email}}" target="_blank">
                                        <i class="far fa-envelope mr-1"></i>
                                        {{$setting->email}}
                                    </a>
                                </div>

                                <!-- <div class="menu-item">
                                    <a href="#" target="_blank">
                                        <i class="fa fa-phone mr-1"></i>
                                        +62 857 5917 1919
                                    </a>
                                </div> -->

                                <div class="menu-item">
                                    <a href="{{$setting->social_instagram_url}}" target="_blank">
                                        <i class="fab fa-instagram mr-1"></i>
                                        {{{$setting->social_instagram_name}}}
                                    </a>
                                </div>

                                <div class="menu-item">
                                    <a href="{{$setting->social_linkedin_url}}" target="_blank">
                                        <i class="fab fa-linkedin mr-1"></i>
                                        {{$setting->social_linkedin_name}}
                                    </a>
                                </div>

                                <div class="menu-item mt-5">
                                    <button data-toggle="modal" data-target="#modalUserData" class="btn btn-download btn-magnetic">Download Company Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="primary-menu">
                        <div class="menu-container">
                            <div class="wrapper">
                                <div class="menu-item">
                                    <a href="{{ url('/') }}"><span>•</span>Home</a>
                                </div>

                                <div class="menu-item">
                                    <a href="{{ url('about-us') }}"><span>•</span>About Us</a>
                                </div>

                                <div class="menu-item">
                                    <a href="{{ url('specialities') }}"><span>•</span>Specialities</a>
                                </div>

                                <div class="menu-item">
                                    <a href="{{ url('projects') }}"><span>•</span>Projects</a>
                                </div>

                                <div class="menu-item">
                                    <a href="{{ url('factory') }}"><span>•</span>Factory</a>
                                </div> 

                                <div class="menu-item">
                                    <a href="{{ url('contact-us') }}"><span>•</span>Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endif



<x-modals.modal-user-data />