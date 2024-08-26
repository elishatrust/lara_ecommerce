<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ !empty($meta_title) ? Str::upper($meta_title) : "" }}</title>
    @if (!empty($meta_keyword))
    <meta name="keywords" content="{{ $meta_keyword }}">
    @endif
    @if (!empty($meta_description))
    <meta name="description" content="{{ $meta_description }}">
    @endif

<<<<<<< HEAD
    <link rel="shortcut icon" href="{{ asset('assets-front/images/icons/favicon.ico') }} ">
    <link rel="stylesheet" href="{{ asset('assets-front/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('assets-front/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets-front/css/plugins/owl-carousel/owl.carousel.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets-front/css/plugins/magnific-popup/magnific-popup.css') }} ">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets-front/css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets-front/css/plugins/nouislider/nouislider.css') }} ">


    <script src="{{ asset('assets-front/js/jquery.min.js') }} "></script>
    <script src="{{ asset('assets-front/js/bootstrap.bundle.min.js') }} "></script>
=======
    <link rel="shortcut icon" href="{{ url('public/assets-front/images/icons/favicon.ico') }}">
    <link rel="stylesheet" href="{{ url('public/assets-front/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ url('public/assets-front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets-front/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets-front/css/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ url('public/assets-front/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets-front/css/plugins/nouislider/nouislider.css') }}">


    <script src="{{ url('public/assets-front/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/assets-front/js/bootstrap.bundle.min.js') }}"></script>
>>>>>>> elisha_branch

</head>

<body>
    <div class="page-wrapper">

        <!-- Header -->
        @include('front.layouts.header')

        <!-- Main -->
        @yield('content')

        <!-- Footer -->
        @include('front.layouts.footer')

    </div>
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div>
    @include('front.layouts.mobile')

    <!-- Signin / Register Modal -->
    @include('front.layouts.signin')


    <!-- NewsLetter -->
    {{-- @include('front.layouts.newsletter') --}}


    <script src="{{ asset('assets-front/js/jquery.hoverIntent.min.js') }} "></script>
    <script src="{{ asset('assets-front/js/jquery.waypoints.min.js') }} "></script>
    <script src="{{ asset('assets-front/js/superfish.min.js') }} "></script>
    <script src="{{ asset('assets-front/js/owl.carousel.min.js') }} "></script>
    <script src="{{ asset('assets-front/js/jquery.magnific-popup.min.js') }} "></script>
    <script src="{{ asset('assets-front/js/wNumb.js') }} "></script>
    <script src="{{ asset('assets-front/js/bootstrap-input-spinner.js') }} "></script>
    <script src="{{ asset('assets-front/js/nouislider.min.js') }} "></script>
    <!-- Main JS File -->
    <script src="{{ asset('assets-front/js/main.js') }} "></script>


</body>
</html>
