@extends('layouts.auth')

@section('title')
    BandBlend | {{$creator->surname}} {{$creator->name}}
@endsection

@section('content')
    <div class="right">
        <section class="main_block_lk">
            <div class="container">
                <div class="lk_head">
                    <div class="lk_banner"></div>
                    <div class="lk_head_info">
                        <div class="lk_head_wrapper flex">
                            <div class="img_wrapper">
                                @if (!empty($creator->avatar))
                                    <img class="user_photo" src="{{ asset($creator->avatar) }}" alt="Аватар пользователя">
                                @else
                                    <img class="user_photo" src="{{ asset('storage/img/default_user_avatar.png') }}" alt="Аватар по умолчанию" width="200px">
                                @endif
                            </div>
                            <div class="main_info">
                                <h1 class="user_name">{{$creator->surname}} {{$creator->name}}</h1>
                                @if (!empty($creator->small_description))
                                    <p class="user_instrument main-text">{{$user->small_description}}</p>
                                @else
                                    <p class="user_instrument main-text grey">Описания нет</p>
                                @endif
                                @if (!empty($creator->city))
                                    <p class="user_city main-text grey">{{$creator->city}}</p>
                                @else
                                    <p class="user_city main-text grey">Город не указан</p>
                                @endif
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
                                        <p class="number">1</p>
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

                <section class="post">
                    @if (!empty($posts->$creator->id))
                        @foreach ($posts as $post)
                    <div class="user_post flex">
                        <div class="img_wrapper">
                            @if (!empty($creator->avatar))
                                <img class="profile_photo" src="{{ asset($creator->avatar) }}" alt="Аватар пользователя" width="60px">
                            @else
                                <img class="profile_photo" src="{{ asset('storage/img/default_user_avatar.png') }}" alt="Аватар по умолчанию" width="60px">
                            @endif
                        </div>
                        <div class="main_info">
                            <p class="user_name">{{$creator->surname}} {{$creator->name}}</p>
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
                        <p class="grey">Пользователь пока ничего не опубликовал :(</p>
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
                                    @if ($creator->email)
                                        {{$creator->email}}
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
                                    @if ($creator->phone)
                                        {{$creator->phone}}
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
                                    @if ($creator->social_media)
                                        {{$creator->social_media}}
                                    @else
                                        Не указано
                                    @endif
                                </p>
                            </div>
                        </li>
                    </ul>
                </section>

                <section class="user_ad_title">
                    <h3 class="subheading">
                        Объявления пользователя
                    </h3>
                </section>

                <section class="ad_content">
                    @if (empty($advertisements->$creator->id))
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

@endsection
