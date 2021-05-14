<div class="form-group form-group-last" id="{{$id}}">
    <div data-repeater-list="{{lcfirst($repeater_value)}}">
        @if(count($values))
            @foreach($values as $key=>$value)
                <div data-repeater-item class="form-group row align-items-center">
                    @foreach($input_types as $input_key=>$input_value)
                        <div class="col-md-5">
                            <div class="kt-form__group--inline">
                                <div class="kt-form__label">
                                    <label>{{$input_labels[$input_key]}}:</label>
                                </div>
                                <div class="kt-form__control">
                                    @if($input_value=="text")
                                        <input type="text" class="form-control" name="{{$input_names[$input_key]}}" placeholder="Enter {{$input_labels[$input_key]}}" value="{{$value[$input_names[$input_key]]}}">
                                    @elseif($input_value=="text_area")
                                        <textarea name="{{$input_names[$input_key]}}" class="form-control" placeholder="Enter {{$input_labels[$input_key]}}" aria-describedby="emailHelp">{{$value[$input_names[$input_key]]}}</textarea>
                                    @endif
                                </div>
                            </div>
                            <div class="d-md-none kt-margin-b-10"></div>
                        </div>
                    @endforeach
                    <div class="col-md-2">
                        <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                            <i class="la la-trash-o"></i>
                            مسح
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div data-repeater-item class="form-group row align-items-center">
                @foreach($input_types as $input_key=>$input_value)
                    <div class="col-md-5">
                        <div class="kt-form__group--inline">
                            <div class="kt-form__label">
                                <label>{{$input_labels[$input_key]}}:</label>
                            </div>
                            <div class="kt-form__control">
                                @if($input_value=="text")
                                    <input type="text" class="form-control" name="{{$input_names[$input_key]}}" placeholder="Enter {{$input_labels[$input_key]}}" value="">
                                @elseif($input_value=="text_area")
                                    <textarea name="{{$input_names[$input_key]}}" class="form-control summernote" placeholder="Enter {{$input_labels[$input_key]}}" aria-describedby="emailHelp"></textarea>
                                @endif
                            </div>
                        </div>
                        <div class="d-md-none kt-margin-b-10"></div>
                    </div>
                @endforeach
                <div class="col-md-2">
                    <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                        <i class="la la-trash-o"></i>
                        مسح
                    </a>
                </div>
            </div>

        @endif
    </div>
    <div class="form-group form-group-last">
        <a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
            <i class="la la-plus"></i> إضافة
        </a>
    </div>
</div>

