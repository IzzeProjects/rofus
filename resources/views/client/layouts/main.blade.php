<!DOCTYPE html>
<html lang="ru">
@include('client.partials.head')
<body>
<div id="app">
    @yield('content')
    @include('client.partials.sidebar')
    <login-form url="{{route('login')}}" method="POST"></login-form>
    <register-form url="{{route('register')}}" method="POST"></register-form>
    <callback-form url="{{route('feedback')}}" method="POST" default-name="{{auth()->user()->name ?? ''}}"></callback-form>
    @logout('logout')
</div>
<script src="{{asset('/modules/client/build/js/app.js')}}"></script>
</body>
</html>
