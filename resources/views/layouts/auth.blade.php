<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/auth.css'])
</head>
<body>
    <h2 class="headline">@yield('headline')</h2>
    <div class="form-container">
        @yield('form')
    </div>
</body>
</html>