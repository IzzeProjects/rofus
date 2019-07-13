<input
    name="{{$name}}"
    type="{{$type}}"
    value="{{old($name) != '' ? old($name) : $default ?? ''}}"
    class="form-group__field {{isset($options['classes']) ? implode(' ', $options['classes']) : ''}}"
    id="{{$options['id'] ?? ''}}"
    @if(isset($options['required'])) required @endif
>
