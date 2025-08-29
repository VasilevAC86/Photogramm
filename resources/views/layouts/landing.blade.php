<!--Макет для главное страницы-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>@yield('title')</title> <!--Объявляем секцию, внутрь которой можно что-нибудь подставить-->
    @vite(['resources/css/landing.css']) <!--Подключаем ресуры-->
</head>
<body>
    <h1 class="greeting">Добро пожаловать в <br /> PHOTOGRAMM</h1>
    <div class="description">
        @yield('description') <!--Объявляем секцию-->
    </div>
</body>
</html>