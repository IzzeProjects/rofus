@extends('admin.layout')

@section('page')
    <div class="content-wrapper__title">Категории новостей</div>
    <div class="content-wrapper__nav">
        <div class="content-wrapper-nav__search">
            <form action="{{route('admin.news.categories.index')}}" method="get">
                <input type="text" name="search" class="content-wrapper-nav__search-input" value="{{$_GET['search'] ?? ''}}">
                <button type="submit" class="content-wrapper-nav__search-button"></button>
            </form>
        </div>

        <a href="{{route('admin.news.categories.create')}}" class="content-wrapper__nav content-wrapper__form-button">
            Добавить
        </a>
    </div>
    <div class="content-wrapper__records">
        <div>
            <table class="content-wrapper__table">
                <thead>
                <tr>
                    <th class="content-wrapper__table-id">ID</th>
                    <th>Заголовок</th>
                    <th>URL</th>
                    <th>Количество новостей</th>
                    <th style="width: 200px"></th>
                    <th style="width: 100px"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->slug}}</td>
                        <td>{{$item->news->count()}}</td>
                        <td><a href="{{route('admin.news.categories.edit', $item)}}">Редактировать</a></td>
                        <td>
                            @delete($item, 'admin.news.categories.destroy')
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
        @links($categories)
    </div>

@stop
