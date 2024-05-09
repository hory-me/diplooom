@extends('layouts.main')

@section('title')
    BandBlend | Авторизация
@endsection

@section('content')
    <main>
        <section class="registration">
            <div class="container">
                <div class="auth_form">
                    <h2 class="auth_caption">Вход в аккаунт</h2>
                    <p class="auth_subtitle small-text">Найди свою музыкальную группу мечты или начни развивать <br> свой
                        собственный блог музыканта прямо сейчас!</p>
                    <form action="{{ route('authorization') }}" class="auth_form_content" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="text" class="input" placeholder="Логин" name="login">
                        <div class="password-container">
                            <input type="password" class="input" id="pass" placeholder="Пароль" name="password">
                            <span toggle="#pass" class="field-icon toggle-password">
                                <i id="eye-icon" class="fa-solid fa-eye"></i>
                            </span>
                        </div>

                        <button type="submit" class="form_btn">Войти</button>
                        @if($errors->has('error'))
                            <div class="text-danger login">
                                <p>{{ $errors->first('error') }}</p>
                            </div>
                        @endif
                        <p class="auth_subtitle auth_link">Ещё нет аккаунта? <a class="additional_btn" href="{{route('register')}}">Зарегистрироваться</a></p>
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
