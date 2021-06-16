@extends('layout.app')
@section('custom_css')
    <link href="{{ asset('assets/bootstrap-taginput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('breadcrump')
    <div class="page-header mobile-hidden" style="background: url({{asset('frontend/assets/img/hero-area.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">
                            محادثة مع <span class="text-primary">{{$chat->sender_id==auth()->guard('user')->user()->id ? $chat->receiver->name : $chat->sender->name}}</span>
                        </h2>
                        <ol class="breadcrumb">
                            <li><a href="#">/الرئيسية</a></li>
                            <li class="current">محادثة</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div id="content" class="section-padding mt-5 mt-md-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 mx-auto">
                    <div class="page-content">
                        <div class="col-12 p-0">
                            <div class="card chat-box rounded p-0 box-shadow-none">
                                <div class="card-header fa-ch p-0 bg-transparent offers-user-online">
                                    <div class="offerer py-2 d-flex">
                                        <div class="figure">
                                            <img src="{{$chat->sender_id==auth()->guard('user')->user()->id ? $chat->receiver->photo : $chat->sender->photo}}" alt="" />
                                            <span class="bolticon"></span>
                                        </div>

                                        <div class="user-name">
                                            <h3>{{$chat->sender_id==auth()->guard('user')->user()->id ? $chat->receiver->name : $chat->sender->name}}</h3>
                                            <h4><a href="#">متاح</a></h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="card box-shadow-none border-0 m-0 p-0" style="height: 65vh">
                                    <div id="sohbet"
                                        class="card border-0 m-0 p-0 position-relative box-shadow-none bg-transparent"
                                        style="overflow-y: auto; height: 65vh">
                                    </div>
                                </div>

                                <div
                                    class="w-100 card-footer py-2 p-0 bg-transparent border-0 border border-bottom-0 border-left-0 border-right-0">
                                    <div class="d-flex m-0 p-0">
                                        <div class="m-0 p-1 flex-grow-1">
                                            <input id="message_content" class="mw-100 border rounded form-control" type="text"
                                                name="text" placeholder="أرسل رد" />
                                        </div>
                                        <div class="m-0 p-1 d-flex">
                                            <label for="tg-photogallery">
                                                <span class="btn btn-border btn-icon ml-2"><i
                                                        class="fa fa-image"></i></span>

                                                <input id="tg-photogallery" class="tg-fileinput" type="file"
                                                    name="file" />
                                            </label>
                                            <button id="sendMessage" class="btn btn-icon btn-common rounded w-100">
                                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
<script>
    (function () {
        var params = {
            message_content : '',
            page : 1,
            message_type : "text",
            sender_id : "{{auth()->guard('user')->user()->id}}",
            receiver_id : "{{$chat->sender_id==auth()->guard('user')->user()->id ? $chat->receiver_id : $chat->sender_id}}"
        };
        function getMessages(scroll=true) {
            sendAjaxReq(params, "POST", "{{route('getMessages',['id'=>$chat->id])}}", function(data) {
                $('#sohbet').prepend(data.messageView);
                if(scroll){
                    $("#sohbet").animate({
                            scrollTop: $('#sohbet')[0].scrollHeight*100
                    }, 1000);
                }
                if(data.hasMorePages){
                    params.page++;
                }
                else{
                    params.page = -1;
                }
            },false)
        }
        function sendMessage(params){
            sendAjaxReq(params, "POST", "{{route('sendMessage',['id'=>$chat->id])}}", function(data) {
                $('#sohbet').append(data.messageView);
                $("#sohbet").animate({
                        scrollTop: $('#sohbet')[0].scrollHeight - $('#sohbet')[0].clientHeight + 300
                }, 1000);
            },false)
        }
        function sendMessageViaText(params){
            params.message_content = $('#message_content').val()
            params.message_type = 'text'
            $("#message_content").val("")
            sendMessage(params);
        }
        getMessages()
        $('#sohbet').on('scroll', function() {
            var scrollTop = $(this).scrollTop();
            if (scrollTop <= 0 && params.page != -1) {
                getMessages(false)
            }
        });
        $('#tg-photogallery').on('change', function(event) {
                const file = event.target.files[0]
                params.message_content = file
                params.message_type = 'photo'
                $("#tg-photogallery").val(null)
                sendMessage(params);
            });
        $('#sendMessage').click(function(){
            if(!$('#message_content').val()){
                return;
            }
            sendMessageViaText(params)
        });
        $('#message_content').keypress(function(e) {
            if (e.which == 13) {
                if(!$('#message_content').val()){
                    return;
                }
                sendMessageViaText(params)
            }
        });
        
    }());
</script>
@endsection
