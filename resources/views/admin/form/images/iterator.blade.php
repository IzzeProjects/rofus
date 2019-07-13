<image-iterator
    default="{{json_encode(old('images') != ''  ? old('images') : $default ?? [])}}"
></image-iterator>
