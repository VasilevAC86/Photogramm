<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js']) <!--Подключаем файлы-->
</head>
<body>
    @auth <!--Работрает как if-->
        <h3>
            {{ auth() -> user() -> email}} 
            <a href="/logout">Выйти</a>
        </h3>
        <a href="/add">Добавить фото</a>
    @else
        <h3>Вы не авторизованы!</h3>
    @endauth
    <div class="container">
        @foreach($posts as $post)
            <div class="post">
                <img src="/storage/{{$post->url}}"/>
                <div class="desc">
                    {{$post->text}}
                </div>
            </div>
        @endforeach

        {{$posts->links('paginate')}} <!--Пагинация (стрелки с переходами по страницам) из файла paginate.blade.php в папке view-->
    </div>

</body>
</html>