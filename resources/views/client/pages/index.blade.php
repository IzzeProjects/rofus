@extends('client.layouts.main')

@section('content')
    <div class="main-wrapper" style="background-image: url('{{asset('/modules/client/build/img/background0.jpg')}}')">
        @include('client.partials.header')
        <div class="content main-content mod-center">
            <div class="main-header__row mod-center">
                <div class="main-title-container">
                    <h1 class="main-title">Reflection Of Us</h1>
                    <div class="main-subtitle">Cover Dance Team</div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-wrapper main-cards-container" style="background-image: url('{{asset('/modules/client/build/img/background1.jpg')}}')">
        <full-description></full-description>
        <main-cards coefficient="15"></main-cards>
    </div>
@stop
