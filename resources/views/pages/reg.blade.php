@extends('layouts/auth')
@section('title', 'РЕГИСТРАЦИЯ в PhotoGramm БВ322')
@section('headline', 'Зарегистрируйтесь')

@section('form')
    <form method="post" action="/reg"> <!--Форма для входа, action - адрес, куда будет отправлен запрос-->
        @csrf <!--у формы доб. скрытое поле с случайным значением, чтобы пользователь не отправил скрытый запрос в БД, для безопастности-->
            <label class="label">
                <span>Имя пользователя</span>
                <input type="text" name="name" value="{{ old('name')}}" /> <!--value для сохранения старого ввода-->                
                @error('name') <!--если ошибка при заполнении формы, то будет выводится div класса err-msg-->
                    <div class="err-msg">
                        {{ $message }}
                    </div>
                @enderror
            </label>
            <label class="label">
                <span>E-mail</span>
                <input type="email" name="email" value="{{ old('email')}}">                
                @error('email') <!--если ошибка при заполнении формы, то будет выводится div класса err-msg-->
                    <div class="err-msg">
                        {{ $message }}
                    </div>
                @enderror
            </label>
            <label class="label">
                <span>Пароль</span> 
                <input type="password" name="password" />                
                @error('password') <!--если ошибка при заполнении формы, то будет выводится div класса err-msg-->
                    <div class="err-msg">
                        {{ $message }}
                    </div>
                @enderror               
            </label>
            <label class="label">
                <span>Повтор пароля</span>                
                <input type="password" name="password_confirmation" />                
                @error('password_confirmation') <!--если ошибка при заполнении формы, то будет выводится div класса err-msg-->
                    <div class="err-msg">
                        {{ $message }}
                    </div>
                @enderror
            </label>
            <button class="btn">Вход</button>
        </form>
@endsection