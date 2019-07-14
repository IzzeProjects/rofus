@extends('admin.layout')

@section('page')
    <div class="content-wrapper__title">Заявки</div>
    <div class="content-wrapper__nav">
        <div class="content-wrapper-nav__search">
            <form action="{{route('admin.feedback.index')}}" method="get">
                <input type="text" name="search" class="content-wrapper-nav__search-input" value="{{$_GET['search'] ?? ''}}">
                <button type="submit" class="content-wrapper-nav__search-button"></button>
            </form>
        </div>
    </div>
    <div class="content-wrapper__records">
        <div>
            <table class="content-wrapper__table">
                <thead>
                <tr>
                    <th class="content-wrapper__table-id">ID</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Почта</th>
                    <th>Дата</th>
                    <th style="width: 100px"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($feedback as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{date('d.m.Y G:i', strtotime($item->created_at))}}</td>
                        <td>
                            @delete($item, 'admin.feedback.destroy')
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
        @links($feedback)
    </div>

@stop
