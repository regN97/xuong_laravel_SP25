<!-- =========================================================
    Item Name: Carrot - Multipurpose eCommerce HTML Template.
    Author: ashishmaraviya
    Version: 2.1
    Copyright 2024
 ============================================================-->
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/carrot-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:29:37 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="ecommerce, market, shop, mart, cart, deal, multipurpose, marketplace">
    <meta name="description" content="Carrot - Multipurpose eCommerce HTML Template.">
    <meta name="author" content="ashishmaraviya">

    <title>Carrot - Multipurpose eCommerce HTML Template</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('client/assets/img/logo/favicon.png') }}">

    <!-- Icon CSS -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/remixicon.css') }}">

    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/range-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/jquery.slick.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/slick-theme.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}">
</head>

<body class="body-bg-6">

    <!-- Loader -->
    <div id="cr-overlay">
        <span class="loader"></span>
    </div>

    @include('client.layouts.partials.header')

    @yield('content')

    @include('client.layouts.partials.footer')

    <!-- Tab to top -->
    <a href="#Top" class="back-to-top result-placeholder">
        <i class="ri-arrow-up-line"></i>
        <div class="back-to-top-wrap">
            <svg viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    </a>

    <!-- Vendor Custom -->
    <script src="{{ asset('client/assets/js/vendor/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/vendor/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/vendor/mixitup.min.js') }}"></script>

    <script src="{{ asset('client/assets/js/vendor/range-slider.js') }}"></script>
    <script src="{{ asset('client/assets/js/vendor/aos.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/vendor/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/vendor/slick.min.js') }}"></script>

    <!-- Main Custom -->
    <script src="{{ asset('client/assets/js/main.js') }}"></script>
</body>


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/carrot-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:30:08 GMT -->

</html>
