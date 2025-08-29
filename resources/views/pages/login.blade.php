@extends('layouts/auth')
@section('title', 'ВХОД PhotoGramm БВ322')
@section('headline', 'Войти в систему')

@section('form')
    <form method="post" action="/login"> <!--Форма для входа-->
            @csrf
            <label class="label">
                <span>E-mail</span>
                <input type="email" name="email" value="{{ old('email') }}" />                                
                @error('email')
                <div class="err-msg">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <label class="label">
                <span>Пароль</span>
                <input type="password" name="password" />                                
                @error('password')
                <div class="err-msg">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <button class="btn">Вход</button>
        </form>
@endsection