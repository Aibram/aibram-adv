<ul class="categories-list">
    @foreach (categoriesFilter(request()->get('category_id',null)) as $item)
        <li>
            <a class="categorySearch" href="javascript:;" data-id="{{$item->category_hierarchy_ids}}">
                <i class="{{'fa '.$item->icon_formatted}}"></i>
                {{$item->name}}
            </a>
        </li>
    @endforeach
</ul>