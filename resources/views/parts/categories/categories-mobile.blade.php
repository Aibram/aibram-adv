@php($catsLevelOne = categoriesByLevels())
<div id="owl-demo2" class="owl-carousel owl-theme">
    @foreach ($catsLevelOne['cats'] as $item)
        <div class="item">
            <a href="javascript:;" data-level="1" data-type="mob" data-parentid="{{$item->parent_id}}" data-id="{{$item->id}}" data-accumid="{{$item->category_hierarchy}}" class="btn btn-border category categorySearch">
                <i class="{{'fa '.$item->icon_formatted}}"></i>{{$item->name}}
            </a>
        </div>
    @endforeach
</div>
@php($catsLevelTwo = categoriesByLevels($catsLevelOne['ids']))
<div id="owl-demo3" class="owl-carousel owl-theme" style="display: none">
    @foreach ($catsLevelTwo['cats'] as $item)
        <div class="item">
            <a href="javascript:;" data-level="2" data-type="mob" data-parentid="{{$item->parent_id}}" data-id="{{$item->id}}" data-accumid="{{$item->category_hierarchy}}" class="btn btn-border category categorySearch" style="display: none">
                <i class="{{'fa '.$item->icon_formatted}}"></i>{{$item->name}}
            </a>
        </div>
    @endforeach
</div>
@php($catsLevelThree = categoriesByLevels($catsLevelTwo['ids']))
<div id="owl-demo4" class="owl-carousel owl-theme" style="display: none">
    @foreach ($catsLevelThree['cats'] as $item)
        <div class="item">
            <a href="javascript:;" data-level="3" data-type="mob" data-parentid="{{$item->parent_id}}" data-id="{{$item->id}}" data-accumid="{{$item->category_hierarchy}}" class="btn btn-border category categorySearch" style="display: none">
                <i class="{{'fa '.$item->icon_formatted}}"></i>{{$item->name}}
            </a>
        </div>
    @endforeach
</div>