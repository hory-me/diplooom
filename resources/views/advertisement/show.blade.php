@extends(auth()->check() ? 'layouts.auth' : 'layouts.main')



@section('title')
    BandBlend | Электрогитарист ищет группу
@endsection

@section('content')
    @if(auth()->check())
        <div class="right">
            @endif
        <section class="ad_card_main_info">
            <div class="container">
                <div class="flex">
                    <div class="ad_card_profile_photo inside_content">
                        @if (!empty($creator->avatar))
                            <img class="profile_photo" src="{{ asset($creator->avatar) }}" alt="Аватар пользователя">
                        @else
                            <img class="profile_photo" src="{{ asset('storage/img/default_user_avatar.png') }}" alt="Аватар по умолчанию">
                        @endif
                            <a href="{{ route('show-user-profile', $creator->id) }}">
                                <p class="user_name">{{$creator->surname}} {{$creator->name}}</p>
                            </a>
                            <a href="{{route('response-to-ad')}}" class="card_button">Откликнуться</a>
                    </div>

                    <div class="main_info inside_content">
                        <div class="flex">
                            <h1 class="heading ad_title">Электрогитарист ищет группу</h1>
                            <p class="grey post_date small-text">{{$advertisement->created_at}}</p>
                        </div>
                        <ul class="card_description">
                            <li class="ad_city main-text"><span>Город: </span>{{ $advertisement->city }}</li>
                            <ul class="ad_genres">
                                <span>Жанры: </span>
                                @foreach ($advertisement->genres as $genre)
                                    <li class="small-text">{{ $genre }}</li>
                                @endforeach
                            </ul>
                        </ul>
                        <div class="additional_card_info">
                            <div class="flex">
                                <div class="flex input input_stroke">
                                    <p class="main-text"><span>Опыт/Стаж группы:</span></p>
                                    <p class="main-text">{{$advertisement->group_experience}}</p>
                                </div>
                                <div class="flex input input_stroke">
                                    <p class="main-text"><span>Мой опыт/стаж</span></p>
                                    <p class="main-text">{{$advertisement->musician_experience}}</p>
                                </div>
                                <div class="flex input input_stroke">
                                    <p class="main-text"><span>Мой концертный опыт:</span></p>
                                    <p class="main-text">
                                        @if ($advertisement->concert_experience)
                                            Есть
                                        @else
                                            Нет
                                        @endif
                                    </p>
                                </div>
                                <div class="flex input input_stroke">
                                    <p class="main-text"><span>Есть собственный инструмент:</span></p>
                                    <p class="main-text">
                                        @if ($advertisement->own_material)
                                            Да
                                        @else
                                            Нет
                                        @endif
                                    </p>
                                </div>
                                <div class="flex input input_stroke">
                                    <p class="main-text"><span>Коммерческий проект:</span></p>
                                    <p class="main-text">
                                        @if ($advertisement->commercial_project)
                                            Да
                                        @else
                                            Нет
                                        @endif
                                    </p>
                                </div>
                                <div class="flex input input_stroke">
                                    <p class="main-text"><span>Сценическое имя:</span></p>
                                    <p class="main-text">
                                        @if ($advertisement->stage_name)
                                            {{$advertisement->stage_name}}
                                        @else
                                            Нет
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ad_card_description">
            <div class="container">
                <div class="inside_content">
                    <h2 class="ad_card_title about_me_title heading">О себе</h2>
                    <p class="main-text about_me_info">{{$advertisement->description}}</p>
                </div>
            </div>
        </section>

        <section class="ad_card_requirements">
            <div class="container">
                <div class="inside_content">
                    <h2 class="ad_card_title requirements_title heading">Требования</h2>
                    <p class="main-text requirements">{{$advertisement->requirements}}</p>
                </div>
            </div>
        </section>

        <section class="ad_card_contacts">
            <div class="container">
                <div class="inside_content">
                    <h2 class="ad_card_title contacts_title heading">Контактная информация</h2>
                    <p class="main-text">Ниже представлена контактная информация, которую предоставил данный автор для связи с ним</p>
                    <ul class="user_contacts">
                        <li class="contact_info flex">
                            <div class="img_wrapper">
                                <i class="fa-regular fa-envelope fa-xl"></i>
                            </div>
                            <div class="main_info">
                                <p>Электронная почта</p>
                                <p class="email main-text grey">
                                    @if (auth()->check())
                                        @if ($advertisement->email)
                                            {{$advertisement->email}}
                                        @else
                                            Не указано
                                        @endif
                                    @else
                                        Для просмотра электронной почты необходимо <a href="{{ route('login') }}">авторизоваться</a> или <a href="{{ route('register') }}">зарегистрироваться</a>.
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
                                    @if (auth()->check())
                                        @if ($advertisement->phone)
                                            {{$advertisement->phone}}
                                        @else
                                            Не указано
                                        @endif
                                    @else
                                        Для просмотра телефона необходимо <a href="{{ route('login') }}">авторизоваться</a> или <a href="{{ route('register') }}">зарегистрироваться</a>.
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
                                    @if (auth()->check())
                                        @if ($advertisement->social_media)
                                            {{$advertisement->social_media}}
                                        @else
                                            Не указано
                                        @endif
                                    @else
                                        Для просмотра социальных сетей необходимо <a href="{{ route('login') }}">авторизоваться</a> или <a href="{{ route('register') }}">зарегистрироваться</a>.
                                    @endif
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
            @if(auth()->check())
        </div>
    @endif

@endsection
