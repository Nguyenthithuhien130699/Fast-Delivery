<select class="form-control" required name="district" id="district"  onchange="getWard()">

    @if(isset($data) && count($data) > 0)
        <option value="">Quận/huyện</option>
        @foreach($data as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    @else
        <option value="">Chọn quận/huyện</option>
    @endif
</select>
