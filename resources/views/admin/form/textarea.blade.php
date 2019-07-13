<textarea
    name="{{$name}}"
    id="{{$options['id'] ?? ''}}"
    class="form-group__field
    {{isset($options['classes']) ? implode(' ', $options['classes']) : ''}}
    {{isset($options['redactor']) ? 'js-redactor' : ''}}"
>{{old($name) != '' ? old($name) : $default ?? ''}}</textarea>
