@extends('admin.layout')

@section('page')
    <div class="content-wrapper__title">Новости</div>
    <div class="content-wrapper__nav">
        <div class="content-wrapper-nav__search">
            <input type="text" name="search" class="content-wrapper-nav__search-input">
            <div class="content-wrapper-nav__search-icon"></div>
        </div>
    </div>
    <div class="content-wrapper__records">
        <div>
            <table class="content-wrapper__table">
                <thead>
                <tr>
                    <th class="content-wrapper__table-id">ID</th>
                    <th>Заголовок</th>
                    <th>Автор</th>
                    <th style="width: 200px"></th>
                    <th style="width: 100px"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>
                <tr>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>
                <tr>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>
                <tr>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>
                <tr>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>
                <tr>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>
                <tr>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>
                <tr>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="content-wrapper__records-pagination">
            <a href="#" class="records-pagination_item">1</a>
            <div class="records-pagination_item-dots">...</div>
            <a href="#" class="records-pagination_item">3</a>
            <a href="#" class="records-pagination_item">4</a>
            <a href="#" class="records-pagination_item">5</a>
            <div class="records-pagination_item-dots">...</div>
            <a href="#" class="records-pagination_item">7</a>
        </div>
    </div>
@stop
