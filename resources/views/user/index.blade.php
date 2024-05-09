@extends('layouts.auth')

@section('title')
    BandBlend | {{$user->surname}} {{$user->name}}
@endsection

@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->role === 'user')
        <div class="right">
            <section class="main_block_lk">
                <div class="container">
                    <div class="lk_head">
                        <div class="lk_banner"></div>
                        <div class="lk_head_info">
                            <div class="lk_head_wrapper flex">
                                <div class="img_wrapper">
                                    @if (!empty($user->avatar))
                                        <img class="user_photo" src="{{ asset($user->avatar) }}" alt="Твоя аватарочка" width="200px">
                                    @else
                                        <img class="user_photo" src="{{ asset('storage/img/default_user_avatar.png') }}" alt="Аватар по умолчанию" width="200px">
                                    @endif
                                </div>
                                <div class="main_info">
                                    <h1 class="user_name">{{$user->surname}} {{$user->name}}</h1>
                                    @if (!empty($creator->small_description))
                                        <p class="user_instrument main-text">{{$user->small_description}}</p>
                                    @else
                                        <p class="user_instrument main-text grey">Описания нет</p>
                                    @endif
                                    @if (!empty($user->city))
                                        <p class="user_city main-text grey">{{$user->city}}</p>
                                    @else
                                        <p class="user_city main-text grey">Город не указан</p>
                                    @endif
                                </div>

                                <div class="user_statistic">
                                    <ul class="statistic flex">
                                        <li>
                                            <p class="number"></p>
                                            <p>Постов</p>
                                        </li>
                                        <li>
                                            <p class="number"></p>
                                            <p>Лайков</p>
                                        </li>
                                        <li>
                                            <p class="number"></p>
                                            <p>Объявлений</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <div class="lk_columns flex">
                <div class="left_lk_column">
                    <section class="make_post">
                        <form id="post-form">
                            <div class="post-container">
                                <textarea id="post-text" placeholder="Создайте свой пост..."></textarea>
                                <div class="flex-column">
                                    <div class="icons">

                                        <label for="upload-video">
                                            <input type="file" id="upload-video" style="display: none">
                                            <i class="fa-regular fa-circle-play fa-lg"></i>
                                        </label>
                                        <label for="upload-audio">
                                            <input type="file" id="upload-audio" style="display: none">
                                            <i class="fa-regular fa-music fa-lg"></i>
                                        </label>
                                        <label for="upload-image">
                                            <input type="file" id="upload-image" style="display: none">
                                            <i class="fa-solid fa-image fa-lg"></i>
                                        </label>
                                    </div>
                                    <button type="submit" id="publish-btn">Опубликовать</button>
                                </div>

                            </div>
                        </form>
                    </section>

                    <section class="post">
                        @if (!empty($posts->$user->id))
                            @foreach ($posts as $post)
                                <div class="user_post flex">
                                    <div class="img_wrapper">
                                        @if (!empty($user->avatar))
                                            <img class="profile_photo" src="{{ asset($user->avatar) }}" alt="Твоя аватарочка" width="60px">
                                        @else
                                            <img class="profile_photo" src="{{ asset('storage/img/default_user_avatar.png') }}" alt="Аватар по умолчанию" width="60px">
                                        @endif
                                    </div>
                                    <div class="main_info">
                                        <p class="user_name">{{$user->surname}} {{$user->name}}</p>
                                        <p class="post_date small-text grey">12.04.2024</p>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <img src="{{asset('storage/img/post_example.png')}}" alt="post">
                                </div>
                                <div class="feedback">
                                    <button class="like-button" data-post-id="1">
                                        <i class="fa-regular fa-heart fa-xl"></i>
                                    </button>
                                    <button class="comment-button" data-post-id="1">
                                        <i class="fa-regular fa-comment fa-xl"></i>
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <div class="empty_ads">
                                <img src="{{asset('storage/img/empty_icons/no-posts.svg')}}" alt="пустота">
                                <p class="grey">Вы еще ничего не опубликовали :(</p>
                            </div>
                        @endif
                    </section>
                </div>

                <div class="right_lk_column">
                    <section class="contact_title">
                        <h3 class="subheading">
                            Контактная информация
                        </h3>
                    </section>

                    <section class="contact_content">
                        <p class="main-text">Ниже представлена контактная информация, которую предоставил данный автор для связи с ним</p>
                        <ul class="user_contacts">
                            <li class="contact_info flex">
                                <div class="img_wrapper">
                                    <i class="fa-regular fa-envelope fa-xl"></i>
                                </div>
                                <div class="main_info">
                                    <p>Электронная почта</p>
                                    <p class="email main-text grey">
                                        @if ($user->email)
                                            {{$user->email}}
                                        @else
                                            Не указано
                                        @endif
                                    </p>
                                </div>
                            </li>
                            <li class="contact_info flex">
                                <div class="img_wrapper">
                                    <i class="fa-regular fa-phone fa-xl"></i>
                                </div>
                                <div class="main_info">
                                    <p>Телефон</p>
                                    <p class="email main-text grey">
                                        @if ($user->phone)
                                            {{$user->phone}}
                                        @else
                                            Не указано
                                        @endif
                                    </p>
                                </div>
                            </li>
                            <li class="contact_info flex">
                                <div class="img_wrapper">
                                    <i class="fa-regular fa-id-badge fa-xl"></i>
                                </div>
                                <div class="main_info">
                                    <p>Социальные сети</p>
                                    <p class="email main-text grey">
                                        @if ($user->social_media)
                                            {{$user->social_media}}
                                        @else
                                            Не указано
                                        @endif
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </section>

                    <section class="user_ad_title">
                        <div class="flex">
                            <h3 class="subheading">
                                Мои Объявления
                            </h3>
                            <a href="{{route('create-advertisement')}}"><i class="fa-regular fa-circle-plus fa-xl"></i></a>
                        </div>
                    </section>

                    <section class="ad_content">
                        {{--@php dd($user->id); @endphp--}}
                        @if (!empty($advertisements->$user->id))
                            @foreach ($advertisements as $advertisement)
                                @php
                                    // Получение значения инструмента из базы данных
                                    $searchedInstrument = $advertisement->instrument;
                                    $foundInstrument = null;
                                    $newForm = null;

                                    // Получение массива инструментов и их измененных форм из конфигурационного файла
                                    $instrumentsCategories = config('instrumentsCategories');

                                    // Перебор массива для поиска инструмента из базы данных и получения его измененной формы
                                    foreach ($instrumentsCategories as $findInstrument => $form) {
                                        if ($findInstrument === $searchedInstrument) {
                                            $foundInstrument = $findInstrument;
                                            $newForm = $form;
                                            break; // Выходим из цикла, когда нашли нужный инструмент
                                        }
                                    }
                                    // Смена регистра первой буквы инструмента, если ищет группа
                                    if ($advertisement->type == 'band' && !empty($newForm)) {
                                        $newForm = mb_strtolower(mb_substr($newForm, 0, 1)) . mb_substr($newForm, 1);
                                    }
                                    // Формирование заголовка в зависимости от типа объявления
                                    if ($advertisement->type == 'musician') {
                                        // Для музыканта
                                        $title = $newForm . ' ищет группу';
                                    } elseif ($advertisement->type == 'band') {
                                        // Для группы
                                        $title = 'Группа ищет ' . $newForm.'а';
                                    }
                                @endphp
                                <div class="all_user_ads">
                                    <div class="catalog_item">
                                        <p class="subheading ad_title" style="font-weight: 600">{{$title}}</p>
                                        <div class="grid">
                                            <div>
                                                <ul class="ad_genres">
                                                    @foreach ($advertisement->genres as $genre)
                                                        <li class="small-text" >{{ $genre }}</li>
                                                    @endforeach
                                                </ul>
                                                <ul class="main-text" style="font-size: 14px">
                                                    <li class="ad_city"><span>Город: </span>{{ $advertisement->city }}</li>
                                                    <li class="ad_bool"><span>Коммерческий проект: </span>{{ $advertisement->commercial ? 'Да' : 'Нет' }}</li>
                                                </ul>
                                                <a href="{{ route('show-advertisement', $advertisement->id) }}" class="card_button">Откликнуться</a>
                                            </div>
                                            @if (!empty($advertisement->user->avatar))
                                                <img class="profile_photo" src="{{ asset($advertisement->user->avatar) }}" alt="Аватар пользователя">
                                            @else
                                                <img class="profile_photo" src="{{ asset('storage/img/default_user_avatar.png') }}" alt="Аватар по умолчанию">
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                        <div class="empty_ads">
                                            <img src="{{asset('storage/img/empty_icons/no-ads.svg')}}" alt="пустота">
                                            <p class="grey">Пользователь не создал ни одного объявления</p>
                                        </div>
                                    @endif
                                </div>
                    </section>

                </div>
            </div>

        </div>
    @else
        <div class="right">
            <section class="main_block_lk">
                <div class="container">
                    <div class="lk_head">
                        <div class="lk_banner"></div>
                        <div class="lk_head_info">
                            <div class="lk_head_wrapper flex">
                                <div class="img_wrapper">
                                    <img src="{{asset('storage/img/profile_photos/ava9.png')}}" alt="Твоя аватарочка" class="user_photo" width="200px">
                                </div>
                                <div class="main_info">
                                    <h1 class="user_name">{{$user->surname}} {{$user->name}}</h1>
                                    <p class="user_instrument main-text">Не указано</p>
                                    <p class="user_city main-text grey">Не указано</p>
                                </div>

                                <div class="user_statistic">
                                    <ul class="statistic flex">
                                        <li>
                                            <p class="number">0</p>
                                            <p>Постов</p>
                                        </li>
                                        <li>
                                            <p class="number">0</p>
                                            <p>Лайков</p>
                                        </li>
                                        <li>
                                            <p class="number">0</p>
                                            <p>Объявлений</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <div class="lk_columns flex">
                <div class="left_lk_column">
                    <section class="make_post">
                        <form id="post-form">
                            <div class="post-container">
                                <textarea id="post-text" placeholder="Создайте свой пост..."></textarea>
                                <div class="flex-column">
                                    <div class="icons">

                                        <label for="upload-video">
                                            <input type="file" id="upload-video" style="display: none">
                                            <i class="fa-regular fa-circle-play fa-lg"></i>
                                        </label>
                                        <label for="upload-audio">
                                            <input type="file" id="upload-audio" style="display: none">
                                            <i class="fa-regular fa-music fa-lg"></i>
                                        </label>
                                        <label for="upload-image">
                                            <input type="file" id="upload-image" style="display: none">
                                            <i class="fa-solid fa-image fa-lg"></i>
                                        </label>
                                    </div>
                                    <button type="submit" id="publish-btn">Опубликовать</button>
                                </div>

                            </div>
                        </form>
                    </section>

                    <section class="post">
                        <div class="empty_ads">
                            <img src="{{asset('storage/img/empty_icons/no-posts.svg')}}" alt="пустота">
                            <p class="grey">Вы еще ничего не опубликовали :(</p>
                        </div>
                    </section>
                </div>

                <div class="right_lk_column">
                    <section class="contact_title">
                        <h3 class="subheading">
                            Контактная информация
                        </h3>
                    </section>

                    <section class="contact_content">
                        <p class="main-text">Ниже представлена контактная информация, которую предоставил данный автор для связи с ним</p>
                        <ul class="user_contacts">
                            <li class="contact_info flex">
                                <div class="img_wrapper">
                                    <i class="fa-regular fa-envelope fa-xl"></i>
                                </div>
                                <div class="main_info">
                                    <p>Электронная почта</p>
                                    <p class="email main-text grey">Не указано</p>
                                </div>
                            </li>
                            <li class="contact_info flex">
                                <div class="img_wrapper">
                                    <i class="fa-regular fa-phone fa-xl"></i>
                                </div>
                                <div class="main_info">
                                    <p>Телефон</p>
                                    <p class="email main-text grey">Не указано</p>
                                </div>
                            </li>
                            <li class="contact_info flex">
                                <div class="img_wrapper">
                                    <i class="fa-regular fa-id-badge fa-xl"></i>
                                </div>
                                <div class="main_info">
                                    <p>Социальные сети</p>
                                    <p class="email main-text grey">Не указано</p>
                                </div>
                            </li>
                        </ul>
                    </section>

                    <section class="user_ad_title">
                        <div class="flex">
                            <h3 class="subheading">
                                Мои Объявления
                            </h3>
                            <a href="#"><i class="fa-regular fa-circle-plus fa-xl"></i></a>
                        </div>
                    </section>

                    <section class="ad_content">
                        <div class="all_user_ads">
                            <div class="empty_ads">
                                <img src="{{asset('storage/img/empty_icons/no-ads.svg')}}" alt="пустота">
                                <p class="grey">Вы пока не создали ни одного объявления</p>
                            </div>
                        </div>
                    </section>

                </div>
            </div>

        </div>
    @endif
@endsection

@section('custom_js')
    <script>
        const postText = document.getElementById('post-text');
        const publishBtn = document.getElementById('publish-btn');
        const iconBlock = document.querySelector('.icon-block');

        let isTextAreaActive = false;

        postText.addEventListener('focus', function() {
            isTextAreaActive = true;
            postText.classList.add('expanded');
            postText.style.height = '120px';

            // Показываем кнопку "Опубликовать"
            publishBtn.style.display = 'block';
        });

        postText.addEventListener('blur', function() {
            isTextAreaActive = false;
        });

        document.addEventListener('click', function(event) {
            if (event.target !== postText && event.target !== publishBtn && !isTextAreaActive) {
                postText.classList.remove('expanded');
                postText.style.height = 'auto';
                publishBtn.style.display = 'none';
            }
        });
    </script>
@endsection
