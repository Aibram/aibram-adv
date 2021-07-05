@extends('layout.app')
@section('custom_css')
    <link href="{{ asset('assets/bootstrap-taginput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .label-info {
            background-color: #0b8451;
            display: inline;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
        }
        .bootstrap-tagsinput input{
            height: 40px;
        }

    </style>
@endsection
@section('breadcrump')

    <div class="page-header mobile-hidden" style="background: url({{ asset('frontend/assets/img/hero-area.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{ __('frontend.ad_create.create_ad') }}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('frontend.home') }}">{{ __('frontend.nav.home') }}/</a></li>
                            <li class="current">{{ __('frontend.ad_create.create_ad') }}</li>
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
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-12 col-xs-12">
                    <div class="register-form login-area">
                        <h3>{{ __('frontend.ad_create.create_new_ad') }}</h3>
                        <form class="login-form" action="{{route('frontend.ad.insert')}}" method="POST"  accept-charset="utf-8" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4 inputwithicon">
                                <div class="select">
                                    <select class="form-control" id="cat" name="category_id">
                                        <option selected>{{ __('frontend.ad_create.category') }}*</option>
                                        @include('parts.categories.categories-option-input',['categories'=>categoriesFilter(),'level'=>1])
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-4 inputwithicon">
                                <div class="select">
                                    <select class="form-control" name="city_id">
                                        <option selected>{{ __('frontend.ad_create.choose_city') }}*</option>
                                        @foreach (getCitiesOfYemen() as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="input-icon">
                                    <input type="text" class="form-control placeholder-font-14" name="region"
                                        placeholder="{{ __('frontend.ad_create.region') }}" />
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="input-icon">
                                    <input type="text" class="form-control" name="title"
                                        placeholder="{{ __('frontend.ad_create.title') }}*" />
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="input-icon">
                                    <input type="number" class="form-control placeholder-font-14" name="price"
                                        placeholder="{{ __('frontend.ad_create.price') }}" />
                                </div>
                            </div>
                            <div class="form-group inputwithicon mb-4">
                                <label class="d-block text-bold">{{ __('frontend.ad_create.contact_method') }}:</label>
                                <div class="custom-control custom-radio mb-2">
                                    <input type="radio" class="custom-control-input" id="phone-number1" name="contact_method"
                                        value="show" onchange="check()" checked/>
                                    <label class="custom-control-label font-size-16" for="phone-number1">
                                        {{ __('frontend.ad_create.show_your_phone') }}</label>
                                </div>
                                <div class="custom-control custom-radio mb-2">
                                    <input type="radio" class="custom-control-input" id="phone-number" name="contact_method"
                                        value="number" onchange="check()"/>
                                    <label class="custom-control-label font-size-16" for="phone-number">
                                        {{ __('frontend.ad_create.new_phone') }}</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="communicate1" class="custom-control-input" id="message"
                                        value="no-number" onchange="check()" disabled checked />
                                    <label class="custom-control-label font-size-16"
                                        for="message">{{ __('frontend.ad_create.by_messages') }}</label>
                                </div>
                            </div>
                            <div class="row flex-nowrap d-none" id="phone-field">
                                <div class="form-group mb-3 col-8 pl-0">
                                    <div class="input-icon">
                                        <input class="form-control text-left placeholder-right" name="mobile"
                                            placeholder="{{ __('frontend.ad_create.phone') }}" type="tel" />
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <div class="input-icon phone-number">
                                        <i class="fa fa-plus text-grey"></i>
                                        <input name="ext" class="form-control" type="tel" value="967" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="input-icon">
                                    <textarea class="form-control" name="desc"
                                        placeholder="{{ __('frontend.ad_create.desc') }}*"></textarea>
                                </div>
                            </div>
                            <div class="my-repeater">
                                <div class="form-group  row">
                                    <div data-repeater-list="properties" class="col-lg-9">
                                        <div data-repeater-item class="kt-margin-b-10 mb-4 row">
                                            <div class="col-md-8">
                                                <div class="kt-form__group--inline">
                                                    <div class="kt-form__control">
                                                        <input type="text" class="form-control"
                                                            placeholder="{{ __('frontend.ad_create.properties') }}"
                                                            name="property">
                                                    </div>
                                                </div>
                                                <div class="d-md-none kt-margin-b-10"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="javascript:;" data-repeater-delete=""
                                                    class="btn btn btn-danger log-btn btn-block">
                                                    حذف
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div data-repeater-create="" class="btn btn btn-warning log-btn btn-block">
                                            إضافة
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="input-icon">
                                    <input type="text" data-role="tagsinput" name="tags" class="form-control"
                                        placeholder="{{ __('frontend.ad_create.tags') }}*">
                                </div>
                            </div>
                            <label class="form-control upload d-flex align-items-center" for="uploadedPrimary">
                                <div class="placeholder d-flex justify-content-between w-100">
                                    <span class="font-size-18">{{ __('frontend.ad_create.primary_photo') }}*</span>
                                    <i class="fa fa-upload text-primary"></i>
                                </div>

                                <input id="uploadedPrimary" class="tg-fileinput" type="file" name="photo" accept="image/*"/>
                            </label>
                            <div class="uploaded-images d-flex my-3 flex-wrap" id="primaryPhoto">
                            </div>
                            <label class="form-control upload d-flex align-items-center" for="uploadedSecondary">
                                <div class="placeholder d-flex justify-content-between w-100">
                                    <span class="font-size-18">{{ __('frontend.ad_create.photos') }}</span>
                                    <i class="fa fa-upload text-primary"></i>
                                </div>
                                <input id="uploadedSecondaryHidden" class="tg-fileinput" style="opacity: 1" type="file"  name="photos[]" multiple/>
                                <input id="uploadedSecondary" class="tg-fileinput" type="file" name="images[]" accept="image/*" multiple/>
                            </label>
                            <div class="uploaded-images d-flex my-3 flex-wrap" id="secondPhotos">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-common log-btn btn-block">{{ __('frontend.ad_create.ad_create') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    {!! JsValidator::formRequest('App\Http\Requests\Website\AdvertisementCreate'); !!}
    @include('admin::CustomFiles.form-repeater')
    @include('admin::CustomFiles.tag-input')
    <script>
        var check = function() {
            if (document.getElementById("phone-number").checked) {
                document.getElementById("phone-field").classList.add("d-flex");
                document.getElementById("phone-field").classList.remove("d-none");
            } else {
                document.getElementById("phone-field").classList.add("d-none");
                document.getElementById("phone-field").classList.remove("d-flex");
            }
        };
        (function () {
            $('#subCat option').each(function() {
                $(this).hide()
            });
        }());
        

        function chainSelect(current, target) {
            var value1 = $(current).on('change', function() {
                parentId = $(this).find(':selected').val();
                if ($(this).find(':selected').val() != '') {
                    $(target).removeAttr('disabled');
                    $(target).find(':selected').attr('selected', false)
                    $(target).find(':disabled').attr('selected', true)
                    $(target + ' option').each(function() {
                        console.log("parent: ", $(this).data('parent'), "disabled: ", $(this).attr(
                            'disabled'));
                        $(this).hide()
                        if ($(this).data('parent') == parentId || $(this).attr('disabled')) {
                            $(this).show()
                        }
                        if ($(this).data('parent') == parentId) {
                            $(this).show()
                        }
                    })
                } else {
                    $(target).prop('disabled', 'disabled').val(null);
                }
            });
            return value1;
        }
        function toDataTrasnfer(dT,files){
            var newFileList = Array.from(files);
            for (let file of newFileList) { dT.items.add(file); }
            
        }
        function previewImagesMultiple(inputSelector,actualInputSelector,previewSelector,cancelButton=true,clearPrevious=false) {
            $(inputSelector).on('change', function(event) {
                const dT = new ClipboardEvent('').clipboardData || new DataTransfer();
                toDataTrasnfer(dT,$(actualInputSelector).prop('files'))
                if(clearPrevious)
                    $(previewSelector).empty()
                const files = event.target.files
                for(var i=0; i<files.length;i++){
                    var imgCancel = `<div class="img-cancel" onclick="updateFileInput(this)">
                                    <i class="fa fa-times"></i>
                                </div>`
                    $(previewSelector).append(
                        `<div class="img-container">
                            ${cancelButton ? imgCancel : ''}
                            <img src="${URL.createObjectURL(files[i])}" />
                        </div>`
                    );
                }
                toDataTrasnfer(dT,event.target.files)
                $(actualInputSelector).prop('files',dT.files);
            });
        }
        function previewImages(inputSelector, previewSelector) {
            $(inputSelector).on('change', function(event) {
                $(previewSelector).empty()
                const files = event.target.files
                $(previewSelector).append(
                    `<div class="img-container">
                        <img src="${URL.createObjectURL(files[0])}" />
                    </div>`
                );
            });
        }
        function updateFileInput(elem){
            index = $('.img-cancel').index(elem)
            console.log(index);
            files = $('#uploadedSecondaryHidden').prop('files');
            console.log("oldfiles",files);
            var newFileList = Array.from(files);
            newFileList.splice(index,1);
            const dT = new ClipboardEvent('').clipboardData || new DataTransfer();
            for (let file of newFileList) { dT.items.add(file); }
            $('#uploadedSecondaryHidden').prop('files',dT.files);
            // document.querySelector('#uploadedSecondaryHidden').files = dT.files;
            console.log("newfiles",$('#uploadedSecondaryHidden').prop('files'));
            $(elem).parent().remove();
        }
        
        size = chainSelect('select#cat', '#subCat');
        previewImages('#uploadedPrimary','#primaryPhoto');
        previewImagesMultiple('#uploadedSecondary','#uploadedSecondaryHidden','#secondPhotos');
    </script>
@endsection
