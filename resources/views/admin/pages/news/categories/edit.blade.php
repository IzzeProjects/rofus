@extends('admin.layout')

@section('page')
    <div class="content-wrapper__title">
        Редактирование категории #{{$category->id}} <br>"{{$category->name}}"
    </div>
    <div class="content-wrapper__form-buttons">
        <a href="{{route('admin.news.categories.create')}}" class="content-wrapper__nav content-wrapper__form-button">
            Добавить еще
        </a>
        <a href="{{route('admin.news.categories.index')}}" class="content-wrapper__nav content-wrapper__form-button">
            Вернуться к списку
        </a>
    </div>
    <div class="content-wrapper__records">
        <form action="{{route('admin.news.categories.update', $category)}}" method="post">
            <div class="content-wrapper__form">
                @csrf
                @method('put')
                @errors()
                <div class="content-wrapper-form__group">
                    <div class="form-group__label required">Загловок</div>
                    @input('name', 'text', false, $category->name)
                </div>
                <div class="content-wrapper-form__group">
                    <div class="form-group__label">Статус</div>
                    @select('status', [1 => 'Активна', 0 => 'Не активна'], false, $category->status)
                </div>
                <button type="submit" class="content-wrapper__form-button">Отправить</button>
            </div>
        </form>
    </div>
@stop
