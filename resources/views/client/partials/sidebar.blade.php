<div tabindex="0" class="sidebar-wrapper js-sidebar">
    <div class="sidebar-wrapper__close modal-wrapper__close js-sidebar-close"></div>
    <div class="sidebar__forms">
        @auth
            <div>Привет, {{auth()->user()->name}} !</div>
            <div class="sidebar__form js-logout js-form-logout">Выйти</div>
        @endauth
        <div class="sidebar__form js-modal-open" data-modal-open="callback">Обратный звонок</div>
        @guest
            <div class="sidebar__form js-modal-open" data-modal-open="login">Вход</div>
                <div class="sidebar__form js-modal-open" data-modal-open="register">Регистрация</div>
            @endguest
    </div>
</div>
