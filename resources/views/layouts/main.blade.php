<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <header>
        <a href="/" class="logo">PhotoGramm</a>
        <a href="/logout" class="user"> {{auth()->user()->email}}(Выход)</a>
    </header>    
    <div class="container">
        <div class="sidebar">
            @yield('sidebar')
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>