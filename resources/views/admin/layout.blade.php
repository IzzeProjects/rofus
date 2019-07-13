<!DOCTYPE html>
<html>
@include('admin.partials.head')
<body>
<div id="app" class="main-wrapper">

    <div class="content">
        @include('admin.partials.header')
        <div class="content-row">
            @include('admin.partials.sidebar')
            <div class="content-wrapper">
                @yield('page')
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/1g8rwzyd2iskdag55e8oxkp5varccjk636062t3ngryty4vf/tinymce/5/tinymce.min.js"></script>
<script src="{{asset('/modules/admin/build/js/app.js')}}"></script>
</body>
</html>
