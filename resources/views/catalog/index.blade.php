@extends(auth()->check() ? 'layouts.auth' : 'layouts.main')



@section('title')
    Доска Объявлений
@endsection

@section('content')
    @if(auth()->check())
        <div class="right">
            @endif
        <section class="create_and_search">
            <div class="container">
                <div class="flex">
                    <div class="create_advertisement_btn flex input_stroke">
                        <p class="main-text">
                            Создайте свое объявление
                        </p>
                        <a href="{{route('create-advertisement')}}"><i class="fa-regular fa-circle-plus fa-lg"></i></a>
                    </div>

                    <div class="search_advertisement flex">
                        <input type="text" class="search_input main-text" placeholder="Поиск объявлений...">
                        <a href="#"><i class="fa-regular fa-magnifying-glass fa-lg grey"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section id="filtering" class="filtering">
            <div class="container">
                <div class="filtering_block inside_content">
                    <div class="filtering_inputs">
                        <form action="" class="catalog_form" method="get">
                            @csrf
                            <div class="filters flex">
                                <div class="input-group">
                                    <label for="ad-type" class="small-text">Тип объявления:</label>
                                    <select name="ad-type" id="ad-type" class="input_stroke">
                                        <option value="option0">Не выбрано</option>
                                        <option value="option1">Объявления от музыкантов</option>
                                        <option value="option2">Объявления от групп</option>
                                    </select>
                                </div>

                                <div class="input-group">
                                    <label for="city-select" class="small-text">Город:</label>
                                    <select id="city-select" name="city" class="input_stroke">
                                        <option value="0" selected>Не выбрано</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group">
                                    <label for="instruments-select" class="small-text">Инструмент:</label>
                                    <select id="instruments-select" name="instrument" class="input_stroke">
                                        <option value="0" selected>Не выбрано</option>
                                        @foreach($instruments as $instrument)
                                            <option value="{{ $instrument->id }}">{{ $instrument->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group">
                                    <label for="genres-select" class="small-text">Жанр или стиль:</label>
                                    <select id="genres-select" name="genre" class="input_stroke">
                                        <option value="0" selected>Не выбрано</option>
                                        @foreach($genres as $genre)
                                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group">
                                    <label for="experience" class="small-text">Опыт или стаж:</label>
                                    <select name="experience" id="experience" class="input_stroke">
                                        <option value="option0">Не выбрано</option>
                                        <option value="option1">1 год</option>
                                        <option value="option2">2 года</option>
                                        <option value="option3">3 года</option>
                                        <option value="option4">Более 5 лет</option>
                                        <option value="option5">Более 10 лет</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="instrument-categories flex">
                        <div class="category-container">
                            <button class="instrument-category guitar" data-filter="guitar"></button>
                            <div class="small-text button-description">
                                Акустическая<br>Гитара
                            </div>
                        </div>
                        <div class="category-container">
                            <button class="instrument-category piano" data-filter="piano"></button>
                            <div class="small-text button-description">
                                Клавишные
                            </div>
                        </div>
                        <div class="category-container">
                            <button class="instrument-category violin" data-filter="violin"></button>
                            <div class="small-text button-description">
                                Скрипка
                            </div>
                        </div>
                        <div class="category-container">
                            <button class="instrument-category drum" data-filter="drum"></button>
                            <div class="small-text button-description">
                                Ударные
                            </div>
                        </div>
                        <div class="category-container">
                            <button class="instrument-category trumpet" data-filter="trumpet"></button>
                            <div class="small-text button-description">
                                Труба
                            </div>
                        </div>
                        <div class="category-container">
                            <button class="instrument-category ukulele" data-filter="ukulele"></button>
                            <div class="small-text button-description">
                                Укулеле
                            </div>
                        </div>
                        <div class="category-container">
                            <button class="instrument-category singer" data-filter="singer"></button>
                            <div class="small-text button-description">
                                Вокалист
                            </div>
                        </div>
                        <div class="category-container">
                            <button class="instrument-category electric_guitar" data-filter="electric_guitar"></button>
                            <div class="small-text button-description">
                                Электрогитара
                            </div>
                        </div>
                        <div class="category-container">
                            <button class="instrument-category flute" data-filter="flute"></button>
                            <div class="small-text button-description">
                                Флейта
                            </div>
                        </div>
                        <div class="category-container">
                        <button class="instrument-category saxophone" data-filter="saxophone"></button>
                            <div class="small-text button-description">
                                Саксофон
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="all_advertisements">
            <div class="container">
                @if (!empty($advertisements))
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
                <div class="advertisements catalog_grid @if(auth()->check()) auth_grid @else unauth_grid @endif">
                    <!-- Здесь будут отображаться объявления -->
                    <div class="catalog_item">
                        <p class="heading ad_title">{{$title}}</p>
                        <div class="grid">
                            <div>
                                <ul class="ad_genres">
                                    @foreach ($advertisement->genres as $genre)
                                        <li class="small-text">{{ $genre }}</li>
                                    @endforeach
                                </ul>
                                <ul class="main-text">
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
                </div>
                @else
                    <div class="empty_ads">
                        <img src="{{ asset('storage/img/empty_icons/no-ads.svg') }}" alt="пустота">
                        <p class="grey">Не найдено ни одного объявления</p>
                    </div>
                @endif
            </div>
        </section>
            @if(auth()->check())
        </div>
    @endif
@endsection

@section('custom.js')
    <script src="{{ asset('js/cases.js') }}"></script>

@endsection
