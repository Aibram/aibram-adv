<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="_token" content="{{ csrf_token() }}" />
    @if(auth()->guard('user')->user())
        <meta name="user_id" content="{{ auth()->guard('user')->user()->id }}" />
    @else
        <meta name="user_id" content="null" />
    @endif
    {!! SEO::generate(true) !!}
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/bootstrap-rtl.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/fonts/line-icons.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/slicknav.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/color-switcher.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/animate.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/owl.carousel.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/main-rtl.css')}}" />
    
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/magnific-popup.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/font-awesome.min.css')}}" />
    @yield('custom_css')
    @toastr_css
    <style>
        .invalid-feedback{
            position: absolute;
        }
        .no-ads{
            font-size:20px;
        }
        .fav-remove:not(.btn) i{
            color:#e00707!important;
            font-size: 20px!important;
        }
        .fav-add:not(.btn) i{
            color:#0b8451!important;
            font-size: 20px!important;
        }
        .fav-remove.btn i{
            color:#e00707!important;
            font-size: 18px!important;
        }
        .fav-add.btn i{
            color:#ffffff!important;
            font-size: 18px!important;
        }

    </style>
</head>

<body>
    <header id="header-wrap">
        @include('partials.navbar')
        @yield('breadcrump')

    </header>
    @yield('content')

    @include('partials.footer')
    {{-- <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div> --}}
    <script>
        var removeFavoriteURL = "{{route('removeFromFavorite')}}";
        var addFavoriteURL = "{{route('addtoFavorite')}}";
    </script>
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('frontend/assets/js/jquery-min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/color-switcher.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/wow.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/main-rtl.js')}}"></script>
    <script src="{{asset('frontend/assets/js/form-validator.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/contact-form-script.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/summernote.js')}}"></script>
    <script src="{{asset('js/ajaxReq.js')}}"></script>
    <script src="{{asset('js/favorite.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    @toastr_js
    @toastr_render
    @yield('custom_js')

</body>

</html>
