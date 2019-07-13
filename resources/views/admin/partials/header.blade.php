<div class="header-wrapper">
    <div class="header-wrapper__content">
        <div class="header-wrapper__title">
            Admin
        </div>
        <div class="header-wrapper__action-panel">
            <a href="/" target="_blank" class="header-wrapper__site">
                <div class="header-wrapper__icon header-wrapper-site__icon"></div>
                <div class="header-wrapper__text">Перейти на сайт</div>
            </a>
            <div class="header-wrapper__logout">
                <div class="header-wrapper__icon header-wrapper-logout__icon"></div>
                <div class="header-wrapper__text js-logout">Выйти</div>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="header-wrapper__logout-form">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
