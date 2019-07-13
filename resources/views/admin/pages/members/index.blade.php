@extends('admin.layout')

@section('page')
    <div class="content-wrapper__title">Участники</div>
    <div class="content-wrapper__nav">
        <div class="content-wrapper-nav__search">
            <form action="{{route('admin.members.index')}}" method="get">
                <input type="text" name="search" class="content-wrapper-nav__search-input" value="{{$_GET['search'] ?? ''}}">
                <button type="submit" class="content-wrapper-nav__search-button"></button>
            </form>
        </div>

        <a href="{{route('admin.members.create')}}" class="content-wrapper__nav content-wrapper__form-button">
            Добавить
        </a>
    </div>
    <div class="content-wrapper__records">
        <div>
            <table class="content-wrapper__table">
                <thead>
                <tr>
                    <th class="content-wrapper__table-id">ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Город</th>
                    <th style="width: 200px"></th>
                    <th style="width: 100px"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($members as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->first_name}}</td>
                        <td>{{$item->surname}}</td>
                        <td>{{$item->city}}</td>
                        <td><a href="{{route('admin.members.edit', $item)}}">Редактировать</a></td>
                        <td>
                            @delete($item, 'admin.members.destroy')
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
        @links($members)
    </div>

@stop
