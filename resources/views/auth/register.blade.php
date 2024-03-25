@extends('use.app')
@section('title', 'home')

@section('content')

    <div class="container py-4">
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-md-6">
                    <form class="form mt-5" action="{{ route('register') }}" method="post">
                        @csrf
                        <h3 class="text-center text-dark">Регистрация</h3>
                        <div class="form-group">
                            <label for="name" class="text-dark">Имя:</label><br>
                            <input type="text" name="name" id="name" class="form-control">
                            @error('name')
                                <small class="fs-6 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="email" class="text-dark">Email:</label><br>
                            <input type="email" name="email" id="email" class="form-control">
                            @error('email')
                                <small class="fs-6 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="password" class="text-dark">Пароль:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <small class="fs-6 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="confirm-password" class="text-dark">Подтвердите пароль:</label><br>
                            <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
                            @error('password_confirmation')
                                <small class="fs-6 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group d-flex align-items-center gap-3 mt-3">
                            {{-- <label for="remember-me" class="text-dark"></label><br> --}}
                            <button type="submit" name="submit" class="btn btn-secondary">Зарегестрироваться</button>
                            <div class="text-right ">
                                <a href="/login" class="text-dark">Уже есть аккаунт? </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    @endsection
