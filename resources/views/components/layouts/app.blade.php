<!DOCTYPE html>
<html lang="id">

@php
    $seo_title = config('app.name').' '.@$subtitle;
@endphp

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OSV Indonesia</title>
    <link rel="shortcut icon" href="{{ asset('faviconx.ico') }}" />

    <meta name="robots" content="index, follow">
    <meta name="author" content="">
    <meta name="title" content="{{ $seo_title }}">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <meta property="og:author" content="">
    <meta property="og:title" content="{{ $seo_title }}">
    <meta property="og:description" content="">
    <meta property="og:url" content="{{ \URL::current() }}">
    <meta property="og:image" content="">
    <meta property="og:type" content="Website" />

    <meta name="developer" content="Decodes Media">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Sentient&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Switzer&display=swap" rel="stylesheet"> -->

    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.11.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">

    @vite('public/css/owl-carousel-custom.css')
    @vite('resources/sass/app.scss')

    @stack('pageStyles')
    @livewireStyles
</head>

<body>
    <div id="preloader" aria-busy="true" aria-label="Loading, please wait." role="progressbar">
        <img src="{{ asset('img/logo-black.png') }}" class="icon" alt="Preloader Logo">
    </div>

    <div id="app">
        <div id="cursor" class="cursor">
            <div class="ring">
                <div><!--Border--></div>
            </div>
            <div class="ring">
                <div><!--Pointer--></div>		
            </div>
        </div>
        
        <x-layouts.navbars.navbar />
        {{ $slot }}
        <x-layouts.footers.footer />

        <!-- <div class="cookie-container hide">
            <p class="cookie-text">
                We use cookies and similar technologies that are necessary to operate the website. Additional cookies are used to perform analysis of website usage. By continuing to use our website, consent to our use of cookies. For more information, please read our <a href="#"> Privacy Policy.</a>
            </p>
            <div class="agree">
                <button>Yes, agree!</button>
            </div>
        </div> -->

        <x-modals.modal-privacy-policy />
        <x-modals.modal-terms-conditions />
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.11.2/js/all.min.js"></script>
    <script defer type="module" src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/7.1.0/ionicons/ionicons.esm.min.js"></script>
    <script defer nomodule src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/7.1.0/ionicons/ionicons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/CSSRulePlugin.min.js"></script>
    
    @vite('public/js/global.js')
    @vite('public/js/cursor.js')
    @vite('public/js/navbar.js')
    @vite('public/js/owl-carousel-settings.js')
    @vite('public/js/button.js')
    @vite('public/js/preloader.js')
    @vite('public/js/cookies.js')

    @stack('pageScripts')
    @livewireScripts
</body>

</html>
