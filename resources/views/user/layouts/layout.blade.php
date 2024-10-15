<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('frontend/assets/img/fav.png')}} ">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>
    <!--
  CSS
  ============================================= -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/linearicons.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nouislider.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/ion.rangeSlider.css') }} " />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/ion.rangeSlider.skinFlat.css') }} " />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }} ">
</head>


<body>
    <!-- Page Preloder -->

    <!-- Search model -->
    <!-- Search model end -->

    <!-- Header Section Begin -->
    @include('user.layouts.header')
    <!-- Header End -->
    <!-- Hero Slider Begin -->
    @yield('herosection')
    <!-- Hero Slider End -->
    <!-- Features Section Begin -->
    @yield('featuresection')
    <!-- Features Section End -->
    @yield('contents')
    <!-- Latest Product Begin -->
    @yield('latestproducts')
    <!-- Latest Product End -->

    <!-- Lookbok Section Begin -->
    @yield('lookboksection')
    <!-- Lookbok Section End -->

    <!-- Logo Section Begin -->
    @yield('indexlogosection')
    <!-- Logo Section End -->

    <!-- Footer Section Begin -->
    @include('user.layouts.footer');
    <!-- Footer Section End -->

    <!-- Js Plugins -->

    <script src="{{ asset('frontend/assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/countdown.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('frontend/assets/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @yield('jsfunction')
</body>

</html>
