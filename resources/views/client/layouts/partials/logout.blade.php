@auth
    <form id="logout-form" action="{{ route($route) }}" method="POST" class="header-wrapper__logout-form">
        @csrf
    </form>
@endauth
