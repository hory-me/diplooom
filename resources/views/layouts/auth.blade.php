<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>
        @yield('title')
    </title>
</head>
<body>
    <header class="main_header profile_header">
        <div class="container">
            <div class="header_row">
                <div class="logo">
                    <a href="{{route('user')}}"><img src="{{asset('storage/img/logo.png')}}" alt="logo" height="60px"></a>
                </div>
                <div class="header_user main-text">
                    <a href="{{route('user')}}"><p>{{$user->surname}} {{$user->name}}</p></a>
                    @if (!empty($user->avatar))
                        <a href="{{route('user')}}"><img class="user_photo" src="{{ asset($user->avatar) }}" alt="Твоя аватарочка" width="60px"></a>
                    @else
                        <a href="{{route('user')}}"><img class="user_photo" src="{{ asset('storage/img/default_user_avatar.png') }}" alt="Аватар по умолчанию" width="60px"></a>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <main class="container auth_main">
        <div class=" left_nav">
            <div class="left_nav_column">
                <a href="{{route('user')}}">
                    <img src="{{asset('storage/img/home.svg')}}" alt="home">
                    <span>Мой Профиль</span>
                </a>
                <a href="#">
                    <img src="{{asset('storage/img/news.svg')}}" alt="news">
                    <span>Новости</span>
                </a>
                <a href="{{route('catalog')}}">
                    <img src="{{asset('storage/img/ads.svg')}}" alt="ads">
                    <span>Доска Объявлений</span>
                </a>
                @if(\Illuminate\Support\Facades\Auth::user()->role === 'admin')
                    <a href="#">
                        <img src="{{asset('storage/img/users.svg')}}" alt="users">
                        <span>Учетные Записи</span>
                    </a>
                    <a href="#">
                        <img src="{{asset('storage/img/support.svg')}}" alt="support">
                        <span>Обратная Связь</span>
                    </a>
                @endif
                <a href="#">
                    <img src="{{asset('storage/img/settings.svg')}}" alt="settings">
                    <span>Настройки</span>
                </a>
                <a href="{{route('logout')}}">
                    <img src="{{asset('storage/img/exit.svg')}}" alt="exit">
                    <span>Выйти</span>
                </a>
            </div>
        </div>
        @yield('content')
    </main>


@yield('custom_js')
<script src="{{asset('js/fontawesome.js')}}"></script>

</body>
</html>
