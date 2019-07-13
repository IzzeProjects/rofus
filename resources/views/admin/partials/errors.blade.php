@if ($errors->any())
    <div class="content-wrapper__request-errors__container">
        @foreach ($errors->all() as $error)
            <div class="content-wrapper__request-errors">
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif
