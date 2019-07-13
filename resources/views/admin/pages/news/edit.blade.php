@extends('admin.layout')

@section('page')
    <div class="content-wrapper__title">
        Редактирование новости #{{$news->id}} <br>"{{$news->title}}"
    </div>
    <div class="content-wrapper__form-buttons">
        <a href="{{route('admin.news.create')}}" class="content-wrapper__nav content-wrapper__form-button">
            Добавить еще
        </a>
        <a href="{{route('admin.news.index')}}" class="content-wrapper__nav content-wrapper__form-button">
            Вернуться к списку
        </a>
    </div>
    <div class="content-wrapper__records">
        <form action="{{route('admin.news.update', $news)}}" method="post">
            <div class="content-wrapper__form">
                @csrf
                @method('put')
                @errors()
                <div class="content-wrapper-form__group">
                    <div class="form-group__label required">Загловок</div>
                    @input('title', 'text', false, $news->title)
                </div>
                <div class="content-wrapper-form__group">
                    <div class="form-group__label required">Категория</div>
                    @selectSearch('category_id', $categories, ['value' => 'id', 'text' => 'name'], $news->category_id)
                </div>
                <div class="content-wrapper-form__group">
                    <div class="form-group__label">Автор</div>
                    @input('author', 'text', false, $news->author)
                </div>
                <div class="content-wrapper-form__group">
                    <div class="form-group__label">Анонс</div>
                    @textarea('announce', false, $news->announce)
                </div>
                <div class="content-wrapper-form__group">
                    <div class="form-group__label required">Текст</div>
                    @textarea('text', ['redactor' => true], $news->text)
                </div>
                <div class="content-wrapper-form__group">
                    <div class="form-group__label">Статус</div>
                    @select('status', [1 => 'Активна', 0 => 'Не активна'], false, $news->status)
                </div>
                <button type="submit" class="content-wrapper__form-button">Отправить</button>
            </div>
        </form>
    </div>
@stop
