@extends('admin.layout')

@section('page')
    <div class="content-wrapper__title">
        Редактирование участника #{{$member->id}} <br> "{{$member->first_name}} {{$member->surname}}"
    </div>
    <div class="content-wrapper__form-buttons">
        <a href="{{route('admin.members.create')}}" class="content-wrapper__nav content-wrapper__form-button">
            Добавить еще
        </a>
        <a href="{{route('admin.members.index')}}" class="content-wrapper__nav content-wrapper__form-button">
            Вернуться к списку
        </a>
    </div>
    <div class="content-wrapper__records">
        <div class="content-wrapper__tabs">
            <div class="content-wrapper__tab tab-active js-tab-change" data-tab="1">Основное</div>
            <div class="content-wrapper__tab js-tab-change" data-tab="2">Изображения</div>
        </div>
        <form action="{{route('admin.members.update', $member)}}" method="post">
            <div class="content-wrapper__form">
                @csrf
                @method('put')
                @errors()
                <div class="content-wrapper__tab-form tab-form-default" data-tab="1">
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label required">Имя</div>
                        @input('first_name', 'text', false, $member->first_name)
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label required">Фамилия</div>
                        @input('surname', 'text', false, $member->surname)
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label required">Изображение</div>
                        @file('image', $member->image)
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label required">Возраст</div>
                        @input('age', 'text', false, $member->age)
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label">Инфо</div>
                        @textarea('info', false, $member->info)
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label ">Город</div>
                        @input('city', 'text', false, $member->city)
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label ">VK</div>
                        @input('vk', 'text', false, $member->vk)
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label ">Instagram</div>
                        @input('instagram', 'text', false, $member->instagram)
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label ">Facebook</div>
                        @input('facebook', 'text', false, $member->facebook)
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label ">Twitter</div>
                        @input('twitter', 'text', false, $member->twitter)
                    </div>
                </div>
                <div class="content-wrapper__tab-form" data-tab="2" >
                    @imageIterator($member->images)
                </div>
                <button type="submit" class="content-wrapper__form-button">Отправить</button>
            </div>
        </form>
    </div>
@stop
