<select-multi name="{{$name}}"
              items="{{$items}}"
              value="{{isset($options['value']) ? $options['value'] : 'id'}}"
              text="{{isset($options['text']) ? $options['text'] : 'name'}}"
              default="{{old($name) ? json_encode(old($name)) : $default ?? ''}}"
></select-multi>
