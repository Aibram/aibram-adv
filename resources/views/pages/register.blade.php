@extends('layout.app')

@section('breadcrump')
    <div class="page-header mobile-hidden" style="background: url({{asset('frontend/assets/img/hero-area.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">{{__('frontend.register.register')}}
                        <h2 class="product-title">{{__('frontend.register.register')}}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('frontend.home')}}">{{__('frontend.nav.home')}} /</a></li>
                            <li><a href="{{route('frontend.login')}}">{{__('frontend.nav.login')}} /</a></li>
                            <li class="current">{{__('frontend.register.register')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <section class="register my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-12 col-xs-12">
                    <div class="register-form login-area">
                        <h3>{{__('frontend.register.register')}}</h3>
                        <form class="login-form" action="{{route('frontend.registerPost')}}" method="post">
                            @csrf
                            <div class="form-group mb-4">
                                <div class="input-icon">
                                    <i class="fa fa-userr"></i>
                                    <input type="text" id="Name" class="form-control" name="name"
                                        placeholder="{{__('frontend.register.name')}}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-8 pl-0">
                                    <div class="input-icon">
                                        <input class="form-control text-left placeholder-right" placeholder="{{__('frontend.register.mobile')}}"
                                            type="tel" name="mobile"/>
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <div class="input-icon phone-number">
                                        <i class="fa fa-plus text-grey"></i>
                                        <input class="form-control" type="tel" value="967" name="ext"/>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mb-3">
                                <p class="text-bold font-size-14">
                                    {{__('frontend.register.ext_change')}}
                                </p>
                            </div>
                            <div class="d-flex">
                                <div class="form-group mb-4 inputwithicon col-8 p-0">
                                    <div class="select pl-2">
                                        <select class="form-control" name="city_id" placeholder="{{__('frontend.register.city')}}">
                                            @foreach (getCities(getfirstCountry()->id) as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group inputwithicon col-4 p-0 mb-4">
                                    <div class="input-icon">
                                        <i class="fa fa-warning text-grey" data-toggle="tooltip"
                                            title="{{__('frontend.register.private')}}"></i>
                                        <input class="form-control" name="age" type="number" placeholder="{{__('frontend.register.age')}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group inputwithicon mb-4">
                                <label class="d-block font-size-18">{{__('frontend.register.gender')}}<i
                                        class="fa fa-warning mx-3 font-size-14 text-grey" data-toggle="tooltip"
                                        title="{{__('frontend.register.private')}}"></i></label>
                                @foreach (getGenderTypes() as $value => $gender)
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="{{$gender}}" @if($loop->first) checked @endif name="gender" value="{{$value}}" />
                                        <label class="custom-control-label" for="{{$gender}}">{{$gender}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group mb-4">
                                <div class="input-icon">
                                    <input type="password" class="form-control"  name="password" placeholder="{{__('frontend.register.password')}}" />
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="input-icon">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="{{__('frontend.register.password_confirmation')}}" />
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkedall" name="agree"/>
                                    <label class="custom-control-label text-bold" for="checkedall">
                                        {{__('frontend.register.agree')}} <a href="#" class="text-primary">{{__('frontend.register.conditions')}}</a> {{__('frontend.register.and')}}
                                        <a href="" class="text-primary">{{__('frontend.register.terms')}}</a></label>
                                </div>
                            </div>
                            <div class="text-center my-3">
                                <button type="submit" class="btn btn-common log-btn btn-block" name="provider" value="whatsapp">{{__('frontend.verify_code.whatsapp')}}</button>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-common bg-yellow log-btn btn-block font-size-14" name="provider" value="sms">{{__('frontend.verify_code.sms')}}</button>
                            </div>
                            <hr />
                            <div class="text-center mt-3">
                                <p class="text-bold">
                                    {{__('frontend.login.android_ios')}}
                                </p>
                                <div class="buttons d-flex justify-content-center mt-3">
                                    @include('parts.settings.platforms')
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    {!! JsValidator::formRequest('App\Http\Requests\Website\RegisterRequest'); !!}
@endsection