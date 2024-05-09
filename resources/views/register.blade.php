@extends('layouts.main')

@section('title')
    BandBlend | Регистрация
@endsection

@section('content')
    <main>
        <section class="registration">
            <div class="container">
                <div class="auth_form">

                    <h2 class="auth_caption">Регистрация</h2>
                    <p class="auth_subtitle">Найди свою музыкальную группу мечты или начни развивать <br> свой
                        собственный блог музыканта прямо сейчас!</p>
                    <form action="{{route('registration')}}" class="auth_form_content" method="post">
                        @csrf

                        <input type="text" class="input" placeholder="Фамилия" name="surname">
                        @error('surname')
                        <div class="text-danger mb-2">
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                        <input type="text" class="input" placeholder="Имя" name="name">
                        @error('name')
                        <div class="text-danger mb-2">
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                        <input type="text" class="input" placeholder="Логин" name="login">
                        @error('login')
                        <div class="text-danger mb-2">
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                        <div class="password-container">
                            <input type="password" class="input" id="pass" placeholder="Пароль" name="password">
                            <span toggle="#pass" class="field-icon toggle-password">
                                <i id="eye-icon" class="fa-solid fa-eye"></i>
                            </span>
                        </div>
                        @error('password')
                        <div class="text-danger mb-2">
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                        <input type="password" class="input" placeholder="Повтор пароля" name="password_confirmation">

                        <button type="submit" class="form_btn">Зарегистрироваться</button>
                        <p class="auth_subtitle auth_link">Уже есть аккаунт? <a class="additional_btn" href="{{route('login')}}">Войти</a></p>
                    </form>
                </div>
            </div>
        </section>

    </main>
@endsection

@section('custom_js')
    <script>
        let passwordInput = document.querySelector('#pass');
        let eyeIcon = document.getElementById('eye-icon');

        document.querySelector('.toggle-password').addEventListener('click', function() {
            if (passwordInput.getAttribute('type') === 'password') {
                passwordInput.setAttribute('type', 'text');
            } else {
                passwordInput.setAttribute('type', 'password');
            }

            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
