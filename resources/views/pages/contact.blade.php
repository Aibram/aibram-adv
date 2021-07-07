@extends('layout.app')

@section('breadcrump')
    <div class="page-header lazy" data-src="{{asset('frontend/assets/img/hero-area.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{__('frontend.contact.contact')}}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('frontend.home')}}">{{__('frontend.nav.home')}} /</a></li>
                            <li class="current">{{__('frontend.nav.contact_us')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <section id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <form class="contact-form" action="{{ route('frontend.contactPost') }}" method="post">
                        @csrf
                        <h2 class="contact-title">{{__('frontend.contact.send_message')}}</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="{{__('frontend.contact.name')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="tel" class="form-control" name="mobile" placeholder="{{__('frontend.contact.phone')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="subject" placeholder="{{__('frontend.contact.subject')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" placeholder="{{__('frontend.contact.message')}}" rows="7"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-common">
                                    {{__('frontend.contact.send')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-4">
                    <div class="information">
                        <h3>{{__('frontend.contact.contact_information')}}</h3>
                        <div class="contact-datails">
                            <ul class="list-unstyled info">
                                <li>
                                    <span>{{__('frontend.contact.email')}} : </span>
                                    <p>
                                        @foreach (getSettings('emails',['لا يوجد']) as $item)
                                            <a href="mailto:{{$item}}"><span class="__cf_email__">{{$item}}</span></a>
                                        @endforeach
                                    </p>
                                </li>
                                <li>
                                    <span>{{__('frontend.contact.mobile')}} : </span>
                                    <p>
                                        @foreach (getSettings('phones',['لا يوجد']) as $item)
                                            @if ($loop->last)
                                                {{$item}}
                                            @else
                                                {{$item}} &
                                            @endif
                                        @endforeach
                                    </p>
                                </li>
                                <li>
                                    <span> {{__('frontend.contact.whatsapp')}} : </span>
                                    <p>{{getSettings('whatsapp','لا يوجد')}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
@endsection

@section('custom_js')
    {!! JsValidator::formRequest('App\Http\Requests\Website\ContactUsRequest') !!}
@endsection
