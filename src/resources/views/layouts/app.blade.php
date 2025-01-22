<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
            @if (Auth::check())
            <div class="header-nav__item">
                <form action="/logout" method="post">
                    @csrf
                    <button class="header-nav__button">logout</button>
                </form>
            </div>
            @endif
            <?php $url = $_SERVER['REQUEST_URI'];
            if (strstr($url, 'login') || strstr($url, 'store')): ?>
            <div class="header-nav__item">
                <form action="/contents/register" method="post">
                    @csrf
                    <button class="header-nav__button">register</button>
                </form>
            </div>
            <?php endif; ?>
            <?php $url = $_SERVER['REQUEST_URI'];
            if (strstr($url, 'register')): ?>
            <div class="header-nav__item">
                <form action="/store" method="post">
                    @csrf
                    <button class="header-nav__button">login</button>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>