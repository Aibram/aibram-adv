@extends('layout.app')
@section('custom_css')
    <style>
        .read{
            background-color:#0b84511f;
        }
        .page-item.active .page-link{
            background-color: #0b8451;
            border-color: #0b8451
        }
    </style>
@endsection
@section('breadcrump')

    <div class="page-header mobile-hidden" style="background: url({{ asset('frontend/assets/img/hero-area.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{ __('frontend.dashboard.myaccount') }}</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">{{ __('frontend.nav.home') }} /</a></li>
                            <li class="current">{{ __('frontend.dashboard.myaccount') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div id="content" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 page-sidebar">
                    <aside>
                        <div class="sidebar-box">
                            <div class="user">
                                @include('parts.dashboard.sidebar',['active'=>'chats','user'=>auth()->guard('user')->user()])
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div id="list-view " class="page-content">
                        <div class="row">
                            <h1 class="section-title mx-auto desktop-hidden">
                                {{ __('frontend.dashboard.chats') }} ({{ $chats->total() }})
                            </h1>
                            @forelse (collect($chats->items())->map->format() as $item)
                                <div class="col-12 offers-user-online">
                                    <a href="{{$item['detailsUrl']}}" class="offerer bordered d-flex align-items-center justify-content-between">
                                        <div class="right d-flex">
                                            <div class="figure">
                                                <img src="{{$item['receiverPhoto']}}" alt="" />
                                            </div>
                                            <div class="user-name">
                                                <h3>{{$item['receiverName']}}</h3>
                                                @if ($item['lastMessageType'] == "photo")
                                                    <p class="font-size-14 text-truncate offer-message" style="color: #0b8451;">
                                                       {{ __('base.photo')}}
                                                       <i class="fa fa-paperclip"></i>
                                                    </p>
                                                @else
                                                    <p class="font-size-14 text-truncate offer-message">
                                                        {{$item['lastMessageContent']}}
                                                    </p>
                                                @endif
                                                
                                            </div>
                                        </div>
                                        <div class="left d-flex flex-column align-items-end">
                                            <span class="badge @if($item['active']=="y") badge-primary @else badge-light @endif py-2 px-2">{{$item['status']}}</span>
                                            @if($item['unreadCount']>0)
                                                <div class="circle-primary">{{$item['unreadCount']}}</div>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div class="section-btn text-center mt-3 mb-5 no-ads">
                                    {{ __('frontend.dashboard.no_chats') }}
                                </div>
                            @endforelse
                        </div>
                        <div class="row" style="justify-content: center;">
                            {{$chats->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')

@endsection
