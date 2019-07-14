<div class="sidebar-wrapper">
    <div class="sidebar-wrapper__title">Разделы</div>
    <div class="sidebar-wrapper__items">
        <div class="sidebar-wrapper__item">
            <div class="sidebar-wrapper-item__wrapper js-menu-item" data-toggle="1">
                <div class="sidebar-wrapper-item__icon"
                     style="background-image: url('{{asset('/assets/admin/icons/members.svg')}}')"></div>
                <div class="sidebar-wrapper-item__text">Участники</div>
            </div>
            <div class="sidebar-wrapper-item__sub-items js-menu-item-toggle" data-toggle="1">
                <a href="{{route('admin.members.index')}}" class="sidebar-wrapper-item__sub-item">
                    <div class="item__sub-item__dot"></div>
                    <div>Список</div>
                </a>
            </div>
        </div>
        <div class="sidebar-wrapper__item">
            <div class="sidebar-wrapper-item__wrapper js-menu-item" data-toggle="2">
                <div class="sidebar-wrapper-item__icon"
                     style="background-image: url('{{asset('/assets/admin/icons/news.svg')}}')"></div>
                <div class="sidebar-wrapper-item__text">Новости</div>
            </div>
            <div class="sidebar-wrapper-item__sub-items js-menu-item-toggle" data-toggle="2">
                <a href="{{route('admin.news.index')}}" class="sidebar-wrapper-item__sub-item">
                    <div class="item__sub-item__dot"></div>
                    <div>Список</div>
                </a>
                <a href="{{route('admin.news.categories.index')}}" class="sidebar-wrapper-item__sub-item">
                    <div class="item__sub-item__dot"></div>
                    <div>Категории</div>
                </a>
            </div>
        </div>
        <div class="sidebar-wrapper__item">
            <div class="sidebar-wrapper-item__wrapper js-menu-item" data-toggle="3">
                <div class="sidebar-wrapper-item__icon"
                     style="background-image: url('{{asset('/assets/admin/icons/feedback.svg')}}')"></div>
                <div class="sidebar-wrapper-item__text">Заявки</div>
            </div>
            <div class="sidebar-wrapper-item__sub-items js-menu-item-toggle" data-toggle="3">
                <a href="{{route('admin.feedback.index')}}" class="sidebar-wrapper-item__sub-item">
                    <div class="item__sub-item__dot"></div>
                    <div>Список</div>
                </a>
            </div>
        </div>
    </div>
</div>
