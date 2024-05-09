@extends('layouts.main')

@section('title')
    BandBlend
@endsection

@section('content')
    <main>
        <section id="about_us" class="about_us container_min">
            <div class="container">
                <h3>Мы соединили сервисы так, чтобы вам было еще удобнее ими пользоваться</h3>
                <div class="description_photos">
                    <div class="description">
                        <img src="{{asset('storage/img/about_us_photo1.png')}}" alt="photo1">
                        <p class="description_title">Комфортное сообщество</p>
                        <p class="main-text">Играйте, находите нужное, знакомьтесь, следите за здоровьем и решайте множество других задач прямо здесь</p>
                    </div>
                    <div class="description">
                        <img src="{{asset('storage/img/about_us_photo2.png')}}" alt="photo2">
                        <p class="description_title">Место встречи <br>с развлечениями</p>
                        <p class="main-text">Любимые песни и новые релизы в VK Музыке, лента роликов с трендами, челленджами и шоу — в VK Клипах, игры, стриминг и киберспорт — в VK Play.</p>
                    </div>
                    <div class="description">
                        <img src="{{asset('storage/img/about_us_photo3.png')}}" alt="photo3">
                        <p class="description_title">Место встречи <br>с развлечениями</p>
                        <p class="main-text">Любимые песни и новые релизы в VK Музыке, лента роликов с трендами, челленджами и шоу — в VK Клипах, игры, стриминг и киберспорт — в VK Play.</p>
                    </div>
                    <div class="description">
                        <img src="{{asset('storage/img/about_us_photo4.png')}}" alt="photo4">
                        <p class="description_title">Комфортное сообщество</p>
                        <p class="main-text">Играйте, находите нужное, знакомьтесь, следите за здоровьем и решайте множество других задач прямо здесь</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="main_ads container">
            <div class="container_min">
                <div class="ad_flex">
                    <h3>Текущие объявления</h3>
                    <div class="slider_buttons">
                        <button onclick="prevSlide()"><</button>
                        <button onclick="nextSlide()">></button>
                    </div>
                </div>
                <p class="main-text">Любимые песни и новые релизы в VK Музыке, лента роликов с трендами, челленджами и шоу — в VK Клипах, игры, стриминг и киберспорт — в VK Play.</p>

                <div class="slider main_ad_slider">
                    <div class="slide active catalog_item">
                        <p class="heading ad_title">Гитарист ищет группу</p>
                        <div class="grid">
                            <div>
                                <ul class="ad_genres">
                                    <li class="small-text">Rock</li>
                                    <li class="small-text">Punk</li>
                                    <li class="small-text">Pop-rock</li>
                                </ul>
                                <ul class="main-text">
                                    <li><span>Город: </span> Москва</li>
                                    <li><span>Коммерческий проект: </span>Нет</li>
                                </ul>
                                <a href="#" class="card_button">Откликнуться</a>
                            </div>
                            <img class="profile_photo" src="{{asset('storage/img/profile_photos/ava1.png')}}" alt="profile photo">
                        </div>
                    </div>
                    <div class="slide active catalog_item">
                        <p class="heading ad_title">Группа ищет пианиста</p>
                        <div class="grid">
                            <div>
                                <ul class="ad_genres">
                                    <li class="small-text">Rock</li>
                                    <li class="small-text">Jazz</li>
                                    <li class="small-text">Funk</li>
                                </ul>
                                <ul class="main-text">
                                    <li><span>Город: </span> Казань</li>
                                    <li><span>Коммерческий проект: </span>Да</li>
                                </ul>
                                <a href="#" class="card_button">Откликнуться</a>
                            </div>
                            <img class="profile_photo" src="{{asset('storage/img/profile_photos/ava2.png')}}" alt="profile photo">
                        </div>
                    </div>
                    <div class="slide active catalog_item">
                        <p class="heading ad_title">Барабанщик ищет группу</p>
                        <div class="grid">
                            <div>
                                <ul class="ad_genres">
                                    <li class="small-text">Rock</li>
                                    <li class="small-text">Jazz</li>
                                    <li class="small-text">Funk</li>
                                </ul>
                                <ul class="main-text">
                                    <li><span>Город: </span> Санкт-Петербург</li>
                                    <li><span>Коммерческий проект: </span>Да</li>
                                </ul>
                                <a href="#" class="card_button">Откликнуться</a>
                            </div>
                            <img class="profile_photo" src="{{asset('storage/img/profile_photos/ava3.png')}}" alt="profile photo">
                        </div>
                    </div>
                    <div class="slide active catalog_item">
                        <p class="heading ad_title">Группа ищет гитариста</p>
                        <div class="grid">
                            <div>
                                <ul class="ad_genres">
                                    <li class="small-text">Rock</li>
                                    <li class="small-text">Jazz</li>
                                    <li class="small-text">Funk</li>
                                </ul>
                                <ul class="main-text">
                                    <li><span>Город: </span> Набережные Челны</li>
                                    <li><span>Коммерческий проект: </span>Да</li>
                                </ul>
                                <a href="#" class="card_button">Откликнуться</a>
                            </div>
                            <img class="profile_photo" src="{{asset('storage/img/profile_photos/ava4.png')}}" alt="profile photo">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="main_gallery">
            <div class="container">
                <h3>Галерея с нашими талантливыми музыкантами передает лучи тепла даже через экран!</h3>
            </div>
                <div class="photo-marquee">
                    <div class="marquee-container">
                        <img src="{{asset('storage/img/profile_photos/ava11.png')}}" alt="Photo 1">
                        <img src="{{asset('storage/img/profile_photos/ava22.png')}}" alt="Photo 2">
                        <img src="{{asset('storage/img/profile_photos/ava33.png')}}" alt="Photo 3">
                        <img src="{{asset('storage/img/profile_photos/ava44.png')}}" alt="Photo 4">
                        <img src="{{asset('storage/img/profile_photos/ava55.png')}}" alt="Photo 5">
                        <img src="{{asset('storage/img/profile_photos/ava66.png')}}" alt="Photo 6">
                        <img src="{{asset('storage/img/profile_photos/ava77.png')}}" alt="Photo 7">
                        <img src="{{asset('storage/img/profile_photos/ava11.png')}}" alt="Photo 1">
                        <img src="{{asset('storage/img/profile_photos/ava22.png')}}" alt="Photo 2">
                        <img src="{{asset('storage/img/profile_photos/ava33.png')}}" alt="Photo 3">
                        <img src="{{asset('storage/img/profile_photos/ava44.png')}}" alt="Photo 4">
                        <img src="{{asset('storage/img/profile_photos/ava55.png')}}" alt="Photo 5">
                        <img src="{{asset('storage/img/profile_photos/ava66.png')}}" alt="Photo 6">
                        <img src="{{asset('storage/img/profile_photos/ava77.png')}}" alt="Photo 7">
                    </div>
                </div>
        </section>

        <section class="main_steps container">
            <div class="container_min">
                <h3>Стать частью нашего сообщества - просто!</h3>

                <div class="all_steps">

                    <div class="step">
                        <p class="heading">Создай и оформи свой профиль</p>

                        <div class="grid">
                            <div>
                                <p class="main-text">
                                    Зарегистрируйся, перейдя по специальной кнопке, и оформи свой профиль. Подойди к этому с душой!
                                </p>
                            </div>
                            <img class="profile_photo" src="{{asset('storage/img/step1.svg')}}" alt="step1">
                        </div>
                    </div>

                    <div class="step">
                        <p class="heading">Выложи первый музыкальный пост</p>
                        <div class="grid">
                            <div>

                                <p class="main-text">
                                    Делись своими звуками и творческой энергией, чтобы затронуть сердца слушателей.
                                    Пускай мир услышит тебя через твою музыку!
                                </p>
                            </div>
                            <img class="profile_photo" src="{{asset('storage/img/step2.svg')}}" alt="step2">
                        </div>
                    </div>

                    <div class="step">
                        <p class="heading">Объединяйся и продвигай свою музыку</p>
                        <div class="grid">
                            <div>

                                <p class="main-text">
                                    Объединяйся с другими музыкантами, чтобы создать прочные связи, расширить свою аудиторию
                                    и добиться большего в мире звука
                                </p>
                            </div>
                            <img class="profile_photo" src="{{asset('storage/img/step3.svg')}}" alt="step3">
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer>
        <div class="container">
            <div class="header_row">
                <div class="logo">
                    <a href="{{route('index')}}"><img src="{{asset('storage/img/logo.png')}}" alt="logo" height="60px"></a>
                </div>

                <nav class="main_navigation">
                    <ul class="main_nav_list">
                        <li class="main_nav_item">
                            <a href="{{route('index')}}" class="main_nav_link">Главная</a>
                        </li>
                        <li class="main_nav_item">
                            <a href="#" class="main_nav_link">Объявления</a>
                        </li>
                        <li class="main_nav_item">
                            <a href="#" class="main_nav_link">Контакты</a>
                        </li>
                    </ul>
                </nav>

                <ul class="lk_nav">
                    <li class="lk_nav_item">
                        <a href="{{route('login')}}" class="lk_nav_link">Войти</a>
                    </li>
                    <li class="lk_nav_item">
                        <a href="{{route('register')}}" class="lk_nav_link">Зарегистрироваться</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
@endsection

@section('custom_js')
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');

        function showSlide() {
            slides.forEach((slide, index) => {
                if (index === currentSlide || index === (currentSlide + 1) % slides.length) {
                    slide.classList.add('active');
                } else {
                    slide.classList.remove('active');
                }
            });
        }
        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide();
        }
        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide();
        }

        showSlide();
    </script>
@endsection
