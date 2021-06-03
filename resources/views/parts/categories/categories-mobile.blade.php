<div id="owl-demo2" class="owl-carousel owl-theme">
    @foreach (categoriesFilter(request()->get('category_id',null)) as $item)
        <div class="item">
            <a href="javascript:;" data-id="{{$item->category_hierarchy_ids}}" class="btn btn-border category categorySearch"><i class="{{'fa '.$item->icon_formatted}}"></i>{{$item->name}}</a>
        </div>
    @endforeach
</div>
