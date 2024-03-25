@extends('use.app')
@section('title', 'home')

@section('content')

    <div class="container py-4">
        <div class="row">
            <div class="row justify-content-center">
                @include('shared.success-mess')
                <div class="col-12 col-sm-8 col-md-6">
                    <form class="form mt-5" action="{{ route('login') }}" method="post">
                        @csrf
                        <h3 class="text-center text-dark">Авторизация</h3>
                        <div class="form-group">
                            <label for="email" class="text-dark">Email:</label><br>
                            <input type="email" name="email" id="email" class="form-control">

                        </div>
                        <div class="form-group mt-3">
                            <label for="password" class="text-dark">Пароль:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                            <div class="mt-3">
                                @error('password')
                                    <small class="fs-6 text-danger">{{ $message }}</small>
                                @enderror
                                @error('email')
                                    <small class="fs-6 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group  d-flex align-items-center gap-3 mt-3">
                            {{-- <label for="remember-me" class="text-dark"></label><br> --}}
                            <button type="submit" name="submit" class="btn btn-secondary">Войти </button>
                            <div class="text-right mt-2">
                                <a href="/register" class="text-dark">Еще не зарегестрированы?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    @endsection
