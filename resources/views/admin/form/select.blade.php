<select
    name="{{$name}}"
    id="{{$options['id'] ?? ''}}"
    class="form-group__field {{isset($options['classes']) ? implode(' ', $options['classes']) : ''}}"
>
    @forelse($values as $key => $value)
        @if(old($name) != '')
            <option {{old($name) == $key ? 'selected': ''}} value="{{$key}}">{{$value}}</option>
        @elseif(isset($default))
            <option @if(isset($default)) {{$default == $key ? 'selected': ''}} @endif value="{{$key}}">{{$value}}</option>
        @else
            <option value="{{$key}}">{{$value}}</option>
        @endif
    @empty
    @endforelse
</select>
