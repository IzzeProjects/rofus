@extends('admin.auth.layout')

@section('page')
    <login-form
        method="POST"
        route="{{route('admin.login')}}"
        server-errors="{{$errors ?? ''}}"
        inputs="{{json_encode(Session::getOldInput())}}"
    ></login-form>
@stop

