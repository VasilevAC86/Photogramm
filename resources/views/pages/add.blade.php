<!--Страница добавления фото-->
@extends('layouts/auth')

@section('title', 'ДОБАВИТЬ ФОТО PhotoGramm БВ322')
@section('headline', 'Добавление фото') <!--Заголовок на самой странице-->
@section('form')
    <form id="login-form" action="/add" method="POST" enctype="multipart/form-data"> <!--Форма для входа, action - адрес, куда будет отправлен запрос-->
        @csrf <!--у формы доб. скрытое поле с случайным значением, чтобы пользователь не отправил скрытый запрос в БД, для безопастности-->
            <label class="label">
                <input type="file" name="foto" /> <!--value для сохранения старого ввода-->
                <span>Фото поста</span>
                @error('foto') <!--если ошибка при заполнении формы, то будет выводится div класса err-msg-->
                    <div class="err-msg">
                        {{ $message }}
                    </div>
                @enderror
            </label>
            <label class="label">
                <input type="text" name="text" value="{{ old('text')}}">
                <span>Описание</span>
                @error('text') <!--если ошибка при заполнении формы, то будет выводится div класса err-msg-->
                    <div class="err-msg">
                        {{ $message }}
                    </div>
                @enderror            
            </label>
            <button class="btn">Отправить</button>
    </form>
@endsection