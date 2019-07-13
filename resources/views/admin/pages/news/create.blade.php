@extends('admin.layout')

@section('page')
    <div class="content-wrapper__title">Создать новость</div>
    <div class="content-wrapper__form-buttons">
        <a href="{{route('admin.news.index')}}" class="content-wrapper__nav content-wrapper__form-button">
            Вернуться к списку
        </a>
    </div>
    <div class="content-wrapper__records">
        <div class="content-wrapper__tabs">
            <div class="content-wrapper__tab tab-active js-tab-change" data-tab="1">Основное</div>
            <div class="content-wrapper__tab js-tab-change" data-tab="2">Изображения</div>
        </div>
        <form action="{{route('admin.news.store')}}" method="post">
            <div class="content-wrapper__form">
                @csrf
                @errors()
                <div class="content-wrapper__tab-form" data-tab="1">
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label required">Загловок</div>
                        @input('title', 'text')
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label required">Категория</div>
                        @selectSearch('category_id', $categories, ['value' => 'id', 'text' => 'name'])
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label">Автор</div>
                        @input('author', 'text')
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label">Анонс</div>
                        @textarea('announce')
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label required">Текст</div>
                        @textarea('text', ['redactor' => true])
                    </div>
                    <div class="content-wrapper-form__group">
                        <div class="form-group__label">Статус</div>
                        @select('status', [1 => 'Активна', 0 => 'Не активна'])
                    </div>
                </div>
                {{--<div class="content-wrapper-form__group">--}}
                {{--<div class="form-group__label">Test</div>--}}
                {{--@selectMulti('categories', $categories, ['value' => 'id', 'text' => 'name'])--}}
                {{--</div>--}}
                <button type="submit" class="content-wrapper__form-button">Отправить</button>
            </div>
        </form>
    </div>
@stop
