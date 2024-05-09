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
    <meta name="description" content="На сайте 'Поиск музыкантов' вы можете легко найти и связаться с талантливыми музыкантами для вашего мероприятия.">
    <meta name="keywords" content="поиск музыкантов, исполнители для мероприятий, бронирование музыкантов, поиск артистов, музыкальные группы">
    <title>
        @yield('title')
    </title>
</head>
<body>
@if(Request::is('/'))
    <header class="main_header welcome_page_header">
@else
    <header class="main_header">
@endif
    <div class="container">
        <div class="header_row">
            <nav class="main_navigation">
                <ul class="main_nav_list">
                    <li class="main_nav_item">
                        <a href="{{route('index')}}" class="main_nav_link">Главная</a>
                    </li>
                    <li class="main_nav_item">
                        <a href="{{route('catalog')}}" class="main_nav_link">Объявления</a>
                    </li>
                    <li class="main_nav_item">
                        <a href="#" class="main_nav_link">Контакты</a>
                    </li>
                </ul>
            </nav>
            <div class="logo">
                <a href="{{route('index')}}"><img src="{{asset('storage/img/logo.png')}}" alt="logo" height="60px"></a>
            </div>
            <ul class="lk_nav">
                <li class="lk_nav_item">
                    <a href="{{route('login')}}" class="lk_nav_link">Войти</a>
                </li>
                <li class="lk_nav_item">
                    <a href="{{route('register')}}" class="lk_nav_link header_btn">Зарегистрироваться</a>
                </li>
            </ul>
        </div>

        @if(Request::is('/'))
            <!-- Дополнительные элементы только для страницы "index" -->
            <div class="additional_elements">
                <h2 class="h2_header">Объединяйся, твори, вдохновляй</h2>
                <p class="auth_subtitle small-text header_subtitle">BandBlend это лучший сервис на земле и в космосе.
                    <br>Все музыканты пользуются только им, а остальные просто завидуют</p>
                <p class="header_secondary_btn"><a href="#about_us" class="secondary_btn">Начать</a></p>

                <div class="bg_images">
                    <img src="{{asset('storage/img/phone_bg.svg')}}" width="520" alt="phone">
                    <div class="bg_text_group">
                        <p class="text_bg">Band</p>
                        <p class="text_bg">Blend</p>
                    </div>

                </div>
            </div>
        @endif
    </div>
</header>

@yield('content')
@yield('custom_js')
<script src="{{asset('js/fontawesome.js')}}"></script>
</body>
</html>
