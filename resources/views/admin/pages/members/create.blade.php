@extends('admin.layout')

@section('page')
    <div class="content-wrapper__title">Создать участника</div>
    <div class="content-wrapper__form-buttons">
        <a href="{{route('admin.members.index')}}" class="content-wrapper__nav content-wrapper__form-button">
            Вернуться к списку
        </a>
    </div>
    <div class="content-wrapper__records">
        <div class="content-wrapper__tabs">
            <div class="content-wrapper__tab tab-active js-tab-change" data-tab="1">Основное</div>
            <div class="content-wrapper__tab js-tab-change" data-tab="2">Изображения</div>
        </div>
        <form action="{{route('admin.members.store')}}" method="post">
            <div class="content-wrapper__form">
                @csrf
                @errors()
                <div class="content-wrapper__tab-form tab-form-default" data-tab="1">
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label required">Имя</div>
                        @input('first_name', 'text')
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label required">Фамилия</div>
                        @input('surname', 'text')
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label required">Изображение</div>
                        @file('image')
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label">Анонс</div>
                        @textarea('info')
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label ">Город</div>
                        @input('city', 'text')
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label ">VK</div>
                        @input('vk', 'text')
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label ">Instagram</div>
                        @input('instagram', 'text')
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label ">Facebook</div>
                        @input('facebook', 'text')
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label ">Twitter</div>
                        @input('twitter', 'text')
                    </div>
                </div>
                <div class="content-wrapper__tab-form" data-tab="2" >
                    @imageIterator()
                </div>
                <button type="submit" class="content-wrapper__form-button">Отправить</button>
            </div>
        </form>
    </div>
@stop
