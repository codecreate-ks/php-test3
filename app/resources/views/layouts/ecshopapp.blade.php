<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="header">
        <p>ShopCreate</p>
        @if (Auth::check())
        <a href="">
            <img class="header_icon" class="listImage_img" src="/img/icon_cart.svg" alt="カート">
        </a>
        @endif
    </header>
    <main class="main">
        <h1>@yield('title')</h1>
        @yield('content')
    </main>
    <footer class="footer">
        なんでも売ります。ShopCreate
    </footer>
</body>
</html>