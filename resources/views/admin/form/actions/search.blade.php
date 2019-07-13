@if($_GET['search'] ?? false)
    {{$items->appends($_GET)->links('admin.partials.pagination')}}
@else
    {{$items->links('admin.partials.pagination')}}
@endif
