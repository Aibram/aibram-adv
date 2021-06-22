@foreach ($categories as $item)
    @php($children = $item->children()->active(1)->get())
    @if(count($children)==0)
        <option value="{{ $item->id }}">{{ html_entity_decode(str_repeat("&nbsp;", $level)).$item->name }}</option>
    @else
        <option disabled>{{ html_entity_decode(str_repeat("&nbsp;", $level)).$item->name }}</option>
        @include('parts.categories.categories-option-input',['categories'=>$children,'level'=>$level+2])
    @endif
@endforeach
