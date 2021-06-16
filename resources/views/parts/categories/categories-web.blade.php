<ul class="{{$class}}">
    @foreach ($categories as $item)
        <li>
            <a class="categorySearch @if(request()->get('category_id','') == $item->category_hierarchy_ids) active @endif" href="javascript:;" data-type="web" data-parentid="{{$item->parent_id}}" data-id="{{$item->id}}" data-accumid="{{$item->category_hierarchy_ids}}">
                <i class="{{'fa '.$item->icon_formatted}}"></i>
                {{$item->name}}
            </a>
            @include('parts.categories.categories-web',['categories'=>$item->children()->active(1)->get(),'class'=>'cat-sub'])
        </li>
    @endforeach
</ul>
