@extends('admin.layout')

@section('page')
    <div class="content-wrapper__title">Новости</div>
    <div class="content-wrapper__nav">
        <div class="content-wrapper-nav__search">
            <form action="{{route('admin.news.index')}}" method="get">
                <input type="text" name="search" class="content-wrapper-nav__search-input" value="{{$_GET['search'] ?? ''}}">
                <button type="submit" class="content-wrapper-nav__search-button"></button>
            </form>
        </div>

        <a href="{{route('admin.news.create')}}" class="content-wrapper__nav content-wrapper__form-button">
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
                    <th>Автор</th>
                    <th>Дата создания</th>
                    <th>Категория</th>
                    <th style="width: 200px"></th>
                    <th style="width: 100px"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($news as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->author}}</td>
                        <td>{{date('d.m.Y G:i', strtotime($item->created_at))}}</td>
                        <td>{{$item->category->name ?? ''}}</td>
                        <td><a href="{{route('admin.news.edit', $item)}}">Редактировать</a></td>
                        <td>
                            @delete($item, 'admin.news.destroy')
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
        @links($news)
    </div>

@stop
