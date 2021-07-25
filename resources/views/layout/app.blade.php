<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="_token" content="{{ csrf_token() }}" />
    @if(checkLoggedIn('user'))
        <meta name="user_id" content="{{ currUser('user')->id }}" />
    @else
        <meta name="user_id" content="null" />
    @endif
    {!! SEO::generate(true) !!}
    <link rel="stylesheet" type="text/css" href="/frontend/minified/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/slicknav.css" />
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/color-switcher.css" />
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="/frontend/minified/style.css" />
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/magnific-popup.css" />
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/frontend/assets/fonts/line-icons.css" />
    <link href="/assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />

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
    @if(!checkLoggedIn('user'))
        <div id="loginModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>{{config('app.name')}}</h5>
                        <button class="ml-0 mr-auto p-0 bg-transparent btn font-size-18" type="button"
                            class="close" data-dismiss="modal">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>{{ __('frontend.nav.login_first') }}</h5>
                    </div>
                    <div class="modal-footer text-center">
                        <a href="{{route('frontend.login')}}" class="btn btn-common mx-auto">
                            {{__('frontend.nav.agree')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div> --}}
    <script>
        var removeFavoriteURL = "{{route('removeFromFavorite')}}";
        var addFavoriteURL = "{{route('addtoFavorite')}}";
        var favWord = "{{ __('frontend.details.favorites') }}"
    </script>
    <script src="/frontend/assets/js/jquery-min.js"></script>
    <script src="/frontend/assets/js/popper.min.js"></script>
    <script src="/frontend/assets/js/bootstrap.min.js"></script>
    <script src="/frontend/assets/js/jquery.counterup.min.js"></script>
    <script src="/frontend/assets/js/waypoints.min.js"></script>
    <script src="/frontend/assets/js/wow.js"></script>
    <script src="/frontend/assets/js/owl.carousel.min.js"></script>
    <script src="/frontend/assets/js/jquery.slicknav.js"></script>
    <script src="/frontend/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/frontend/assets/js/main-rtl.js"></script>
    <script src="/frontend/assets/js/form-validator.min.js"></script>
    <script src="/frontend/assets/js/contact-form-script.min.js"></script>
    <script src="/frontend/assets/js/summernote.js"></script>
    <script src="/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
	<script src="/assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
    <script src="/assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
    <script src="/js/lazyloading.js"></script>
    <script src="/js/ajaxReq.js"></script>
    <script src="/js/favorite.js"></script>
    @if(!checkLoggedIn('user'))
    <script>
        function openLogin(){
            swal.fire({
                title: '',
                text: "{{ __('frontend.nav.login_first') }}",
                type: 'error',
                confirmButtonText: "{{__('frontend.nav.agree')}}"
            }).then(function(result) {
                if (result.value) {
                    window.location = "{{route('frontend.login')}}";
                }
            });
        }
    </script>
    @endif
    <script type="text/javascript" src="/vendor/jsvalidation/js/jsvalidation.js"></script>
    @if(checkLoggedIn('user'))
        @include('vendor.pusher')
    @endif
    @toastr_js
    @toastr_render
    @yield('custom_js')

</body>

</html>
