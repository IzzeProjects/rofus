<select-single
    name="{{$name}}"
    items="{{$items}}"
    value="{{isset($options['value']) ? $options['value'] : 'id'}}"
    text="{{isset($options['text']) ? $options['text'] : 'name'}}"
    default="{{old($name) != ''  ? old($name) : $default ?? ''}}"
></select-single>
