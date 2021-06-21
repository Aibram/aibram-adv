@foreach ($categories as $item)
    @php($children = $item->children()->active(1)->get())
    @if(count($children)==0)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
    @else
        <optgroup label="{{ $item->name }}">
            @include('parts.categories.categories-option-input',['categories'=>$children])
        </optgroup>
    @endif
@endforeach
