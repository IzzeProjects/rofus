<form action="{{route($route, $item)}}" method="post">
    @method('delete')
    @csrf
    <button type="submit" class="form-delete-button">Удалить</button>
</form>
