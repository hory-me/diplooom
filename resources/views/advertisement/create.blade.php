@extends('layouts.auth')

@section('title')
    Новое объявление
@endsection

@section('content')
    <div class="right">
        <form class="create_ad_form" action="" method="POST">
            <section class="create_ad info_for_search inside_content">
                <div class="container">
                    <h1 class="heading">Подать объявление</h1>
                    <div class="ad_type flex">
                        <input type="radio" id="radio1" name="type" value="musician" checked>
                        <label class="input_stroke main-text" for="radio1">Музыкант</label>
                        <input type="radio" id="radio2" name="type" value="band">
                        <label class="input_stroke main-text" for="radio2">Группа музыкантов</label>
                    </div>
                    <h2 class="heading">Информация для поиска</h2>
                    <div class="musician-fields" style="display: block">
                        <div class="flex">
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
                                <label for="experience" class="small-text">Опыт/Стаж музыканта:</label>
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

                        <input type="checkbox" id="concert_ex" class="custom-checkbox">
                        <label for="concert_ex" class="small-text label_margin_right">Концертный опыт</label>

                        <input type="checkbox" id="own_instrument" class="custom-checkbox">
                        <label for="own_instrument" class="small-text">Есть собственный инструмент</label>
                    </div>

                    <div class="band-fields" style="display: none">
                        <div class="flex">
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
                                <label for="experience" class="small-text">Опыт/Стаж группы:</label>
                                <select name="experience" id="experience" class="input_stroke">
                                    <option value="option0">Не выбрано</option>
                                    <option value="option1">1 год</option>
                                    <option value="option2">2 года</option>
                                    <option value="option3">3 года</option>
                                    <option value="option4">Более 5 лет</option>
                                    <option value="option5">Более 10 лет</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <label for="genreInput" class="small-text">Жанры:</label>
                                <input type="text" id="genreInput" class="input_stroke genre_input" placeholder="Выберите жанры">

                                <div class="modal" id="genreModal">
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <h3 class="heading">Выберите жанры</h3>
                                        <p class="main-text">Выберите от 1 до 3 жанров</p>
                                        <div class="flex">
                                            @foreach ($genres as $genre)
                                                <label class="main-text">
                                                    <input type="checkbox" value="{{ $genre->id }}" class="genre-checkbox"> {{ $genre->name }}
                                                </label><br>
                                            @endforeach
                                        </div>

                                        <button id="btnSubmit" class="btnSubmit form_btn" disabled>Готово</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="checkbox" id="commercial_project" class="custom-checkbox">
                        <label for="commercial_project" class="small-text">Коммерческий проект</label>
                    </div>
                </div>
            </section>

            <section class="create_ad requirements inside_content">
                <div class="container">

                    <div class="musician-fields" style="display: block">
                        <h2 class="heading">Требования к группе</h2>
                        <div class="flex">
                            <div class="input-group">
                                <label for="genreInput" class="small-text">Жанры:</label>
                                <input type="text" id="genreInput" class="genre_input input_stroke" placeholder="Выберите жанры">

                                <div class="modal" id="genreModal">
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <h3 class="heading">Выберите жанры</h3>
                                        <p class="main-text">Выберите от 1 до 3 жанров</p>
                                        <div class="flex">
                                            @foreach ($genres as $genre)
                                                <label class="main-text">
                                                    <input type="checkbox" value="{{ $genre->id }}" class="custom-checkbox genre-checkbox"> {{ $genre->name }}
                                                </label><br>
                                            @endforeach
                                        </div>

                                        <button id="btnSubmit" class="btnSubmit form_btn" disabled>Готово</button>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group">
                                <label for="experience" class="small-text">Опыт/Стаж группы:</label>
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

                        <input type="checkbox" id="commercial_project" class="custom-checkbox">
                        <label for="commercial_project" class="small-text">Коммерческий проект</label>

                        <div class="input-group input_textarea">
                            <label for="requirements" class="small-text">Требования к группе:</label>
                            <textarea name="requirements" id="requirements" class="input_stroke" placeholder="Укажите требования" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="band-fields" style="display: none">
                        <h2 class="heading">Требования к музыканту</h2>
                        <div class="flex">
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
                                <label for="age" class="small-text">Возраст музыканта:</label>
                                <input type="text" id="age" class="input_stroke" placeholder="Возраст или промежуток">
                            </div>

                            <div class="input-group">
                                <label for="experience" class="small-text">Опыт/Стаж музыканта:</label>
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

                        <input type="checkbox" id="concert_ex" class="custom-checkbox">
                        <label for="concert_ex" class="small-text label_margin_right">Концертный опыт</label>

                        <input type="checkbox" id="own_instrument" class="custom-checkbox">
                        <label for="own_instrument" class="small-text">Есть собственный инструмент</label>

                        <div class="input-group input_textarea">
                            <label for="requirements" class="small-text">Требования к музыканту:</label>
                            <textarea name="requirements" id="requirements" class="input_stroke" placeholder="Укажите требования" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </section>


            <section class="create_ad description_info inside_content">
                <div class="container">

                    <div class="musician-fields" style="display: block">
                        <h2 class="heading">Информация обо мне</h2>
                            <div class="input-group">
                                <label for="stage_name" class="small-text">Сценическое имя:</label>
                                <input type="text" id="stage_name" class="input_stroke" placeholder="Имя">
                            </div>

                            <div class="input-group input_textarea">
                                <label for="description" class="small-text">Несколько слов о себе:</label>
                                <textarea name="description" id="description" class="input_stroke" placeholder="Расскажите о себе" rows="10"></textarea>
                            </div>
                    </div>

                    <div class="band-fields" style="display: none">
                        <h2 class="heading">Информация о группе</h2>
                            <div class="input-group">
                                <label for="stage_name" class="small-text">Название группы:</label>
                                <input type="text" id="stage_name" class="input_stroke" placeholder="Введите название">
                            </div>

                            <div class="input-group input_textarea">
                                <label for="description" class="small-text">Несколько слов о группе:</label>
                                <textarea name="description" id="description" class="input_stroke" placeholder="Расскажите о своей группе" rows="10"></textarea>
                            </div>
                    </div>
                </div>
            </section>

            <section class="create_ad contact_info inside_content">
                <div class="container">
                    <h2 class="heading">Контакты</h2>
                    <div class="flex">
                        <div class="input-group">
                            <label for="email" class="small-text">Email:</label>
                            <input type="email" id="email" class="input_stroke" placeholder="Введите почту">
                        </div>
                        <div class="input-group">
                            <label for="phone" class="small-text">Телефон:</label>
                            <input type="text" id="phone" class="input_stroke" placeholder="Введите телефон">
                        </div>
                        <div class="input-group">
                            <label for="social_link" class="small-text">Соц. сеть:</label>
                            <input type="text" id="social_link" class="input_stroke" placeholder="Вставьте ссылку">
                        </div>
                    </div>
                </div>
            </section>
            <button type="submit" class="form_btn">Подать объявление</button>
        </form>
    </div>



@endsection

@section('custom_js')
        <script>
            document.querySelectorAll('input[name="type"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    const selectedType = this.value;

                    document.querySelectorAll('.musician-fields').forEach(function(field) {
                        field.style.display = selectedType === 'musician' ? 'block' : 'none';
                    });

                    document.querySelectorAll('.band-fields').forEach(function(field) {
                        field.style.display = selectedType === 'band' ? 'block' : 'none';
                    });
                });
            });

            //модальное окно
            // Получаем элементы модального окна
            const genreModal = document.getElementById('genreModal');
            const modalContent = genreModal.querySelector('.modal-content');
            const genreInput = document.getElementById('genreInput');
            const genreCheckboxes = modalContent.querySelectorAll('.genre-checkbox');
            const btnSubmit = document.getElementById('btnSubmit');
            const closeBtn = modalContent.querySelector('.close');

            // Функция для открытия модального окна
            const openModal = () => {
                genreModal.style.display = 'block';
            };

            // Функция для закрытия модального окна
            const closeModal = () => {
                genreModal.style.display = 'none';
            };

            // Функция для обработки выбора жанров
            const handleGenreSelection = () => {
                let selectedGenresCount = 0;

                genreCheckboxes.forEach((checkbox) => {
                    if (checkbox.checked) {
                        selectedGenresCount++;
                    }
                });

                btnSubmit.disabled = selectedGenresCount === 0;

                if (selectedGenresCount >= 3) {
                    genreCheckboxes.forEach((checkbox) => {
                        if (!checkbox.checked) {
                            checkbox.disabled = true;
                        }
                    });
                } else {
                    genreCheckboxes.forEach((checkbox) => {
                        checkbox.disabled = false;
                    });
                }
            };

            // Добавляем обработчики событий
            genreInput.addEventListener('click', openModal);
            btnSubmit.addEventListener('click', closeModal);
            closeBtn.addEventListener('click', closeModal);
            genreCheckboxes.forEach((checkbox) => {
                checkbox.addEventListener('change', handleGenreSelection);
            });

            // Приводим модальное окно в начальное состояние при его закрытии
            genreModal.addEventListener('click', function(event) {
                if (event.target === genreModal) {
                    genreCheckboxes.forEach((checkbox) => {
                        checkbox.checked = false;
                        checkbox.disabled = false;
                    });
                    btnSubmit.disabled = true;
                }
            });
        </script>

@endsection
