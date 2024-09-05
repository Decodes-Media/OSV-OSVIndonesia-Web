<header id="navbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <a href="#">
                    <img src="{{ asset('img/logo-black.png') }}" class="img-fluid header-logo" alt="Logo" loading="lazy">
                </a>

                <div id="toggle-btn" class="btn">
                    <!-- <div class="btn-outline btn-outline-1"></div>
                    <div class="btn-outline btn-outline-2"></div> -->
                    <div id="hamburger">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                    </div>
                </div>

                <div class="overlay">
                    <svg viewBox="0 0 1000 1000">
                        <path d="M0 2S175 1 500 1s500 1 500 1V0H0Z"></path>
                    </svg>
                </div>

                <div class="menu">
                    <div class="secondary-menu">
                        <div class="menu-container">
                            <div class="wrapper">
                                <div class="menu-item">
                                    <a href="#" target="_blank">
                                        <i class="far fa-envelope mr-1"></i>
                                        info@osvindonesia.com
                                    </a>
                                </div>

                                <div class="menu-item">
                                    <a href="#" target="_blank">
                                        <i class="fa fa-phone mr-1"></i>
                                        +62 857 5917 1919
                                    </a>
                                </div>

                                <div class="menu-item">
                                    <a href="#" target="_blank">
                                        <i class="fab fa-instagram mr-1"></i>
                                        @osvindonesia
                                    </a>
                                </div>

                                <div class="menu-item">
                                    <a href="#" target="_blank">
                                        <i class="fab fa-linkedin mr-1"></i>
                                        OSV Indonesia
                                    </a>
                                </div>

                                <div class="menu-item mt-5">
                                    <button data-toggle="modal" data-target="#modalUserData" class="btn btn-download">Download Company Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="primary-menu">
                        <div class="menu-container">
                            <div class="wrapper">
                                <div class="menu-item">
                                    <a href="#"><span>I</span>Specialities</a>
                                </div>

                                <div class="menu-item">
                                    <a href="#"><span>II</span>Factory</a>
                                </div>

                                <div class="menu-item">
                                    <a href="#"><span>III</span>About Us</a>
                                </div>

                                <div class="menu-item">
                                    <a href="#"><span>IV</span>Projects</a>
                                </div>

                                <div class="menu-item">
                                    <a href="#"><span>V</span>Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<x-modals.modal-user-data />