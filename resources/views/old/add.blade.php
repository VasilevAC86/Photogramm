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
            <button>Отправить</button>
        </form>
    </div>
</body>
</html>