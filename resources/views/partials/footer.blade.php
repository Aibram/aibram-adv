@if(request()->route()->getName() == 'frontend.home')
<div class="add-ads">
    <div class="d-flex align-items-center justify-content-center">
        @if(!checkLoggedIn('user'))
            <div class="col-6 pl-1">
                <a href="{{route('frontend.login')}}" class="btn btn-border px-0 btn-block m-0">
                    <i class="fa fa-user mx-2"></i>{{__('frontend.nav.login')}}
                </a>
            </div>
        @endif
        <div class="col-6 pr-1">
            <a href="{{route('frontend.ad.create')}}" class="btn btn-common btn-block m-0">
              <i class="fa fa-plus mx-2"></i>{{__('frontend.nav.post_ad')}}
            </a>
        </div>
    </div>
</div>
@endif
<footer>
    <section class="footer-Content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
                    <div class="widget">
                        <div class="footer-logo">{{ config('app.name') }}</div>
                        <div class="textwidget">
                            <p>{{ getSettings('footerQuote') }}</p>
                        </div>
                        <div class="text-center my-3">
                            <p class="font-size-14 text-right">{{ __('frontend.footer.android_ios') }}</p>
                            <div class="buttons d-flex justify-content-start mt-3">
                                @include('parts.settings.platforms')
                            </div>
                        </div>
                        <ul class="mt-3 footer-social">
                            <li>
                                <a class="facebook" href="{{ getSettings('facebookLink', 'https:://facebook.com') }}"><i
                                        class="fa fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a class="twitter" href="{{ getSettings('twitterLink', 'https:://twitter.com') }}"><i
                                        class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="linkedin" href="{{ getSettings('linkedinLink', 'https:://linkedin.com') }}"><i
                                        class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a class="google-plus" href="{{ getSettings('googleLink') }}"><i
                                        class="fa fa fa-google-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
                    <div class="widget">
                        <h3 class="block-title">{{ __('frontend.footer.links') }}</h3>
                        <ul class="menu">
                            <li><a href="{{ route('frontend.about') }}">- {{ __('frontend.footer.about') }}</a></li>
                            <li><a href="{{ route('frontend.categories') }}">-
                                    {{ __('frontend.footer.categories') }}</a></li>
                            <li><a href="{{ route('frontend.ads') }}">- {{ __('frontend.footer.ads') }} </a></li>
                            <li><a href="{{ route('frontend.contact') }}">- {{ __('frontend.footer.contact') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
                    <div class="widget">
                        <h3 class="block-title">{{ __('frontend.footer.contact_information') }}</h3>
                        <ul class="contact-footer">
                            <li>
                                <strong><i class="lni-phone"></i></strong><span>
                                    @foreach (getSettings('phones', ['لا يوجد']) as $item)
                                        {{ $item }} <br />
                                    @endforeach
                                </span>
                            </li>
                            <li>
                                <strong><i class="lni-envelope"></i></strong><span>
                                    @foreach (getSettings('emails', ['لا يوجد']) as $item)
                                        <a href="mailto:{{ $item }}" class="__cf_email__"
                                            data-cfemail="cdaea2a3b9acaeb98da0aca4a1e3aea2a0">{{ $item }}</a>
                                        <br />
                                    @endforeach
                                </span>
                            </li>
                            <li>
                                <strong><i class="fa fa-map-marker"></i></strong><span><a
                                        href="#">{{ __('frontend.footer.city') }} <br />
                                        {{ getSettings('location', 'لا يوجد') }}</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-info text-center">
                        <p>
                            <a>الحقوق محفوطة لدي {{ config('app.name') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
