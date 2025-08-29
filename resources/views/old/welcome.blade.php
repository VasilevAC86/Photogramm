<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js']) <!--Подключаем файлы-->
</head>
<body>
    <div class="container">
        <form id="login-form" method="post" action="/login"> <!--Форма для входа-->
            @csrf
            <label class="label">
                <input type="email" name="email" value="{{ old('email') }}" />                
                <span>E-mail</span>
                @error('email')
                <div class="err-msg">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <label class="label">
                <input type="password" name="password" />
                <span>Пароль</span>                
                @error('password')
                <div class="err-msg">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <button>Вход</button>
        </form>
    </div>
</body>
</html>