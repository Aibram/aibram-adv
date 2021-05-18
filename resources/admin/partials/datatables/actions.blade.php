
@if(array_key_exists('view',$actions))
    @can($actions['view'], 'admin')
        <a href="{{route($viewPrefix.$actions['view'],$model->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="kt-tooltip" data-placement="left" title="Show">
            <i class="la la-eye"></i>
        </a>
    @endcan
@endif
@if(array_key_exists('edit',$actions))
    @can($actions['edit'], 'admin')
        <a href="{{route($viewPrefix.$actions['edit'],$model->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="kt-tooltip" data-placement="left" title="Update">
            <i class="la la-edit"></i>
        </a>
    @endcan
@endif
@if(array_key_exists('delete',$actions))
    @can($actions['delete'], 'admin')
        <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md" id="{{'kt_sweetalert_demo'.$model->id}}" data-toggle="kt-tooltip" data-placement="left" title="Delete">
            <i class="la la-close"></i>
        </button>
        <form action="{{route($viewPrefix.$actions['delete'],$model->id)}}" style="display: none" id="deleteForm{{$model->id}}" method="post">
            @csrf
            @method('delete')
        </form>
        <script>
            $('#{{"kt_sweetalert_demo".$model->id}}').click(function(e) {
                swal.fire({
                    title: "{{__('base.remove_item')}}",
                    text: "{{__('base.sure_remove')}}",
                    type: "danger",

                    buttonsStyling: false,

                    confirmButtonText: "{{__('base.yes_remove')}}",
                    confirmButtonClass: "btn btn-danger",

                    showCancelButton: true,
                    cancelButtonText: "{{__('base.no_remove')}}",
                    cancelButtonClass: "btn btn-default"
                }).then((result) => {
                    if (result.value) {
                        document.getElementById('deleteForm{{$model->id}}').submit()
                    }
                });
            });
        </script>
    @endcan
@endif