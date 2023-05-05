@extends('layouts.auth')
@section('content')
@php
    $title ="صفحة تسجيل الدخول";
@endphp

<body class="animsition">
    <div class="page-wrapper" style="background-image: url('/img/madiabird2.png')">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="/img/photo.png" alt="CoolAdmin" width="60px">
                                <h2> ميديا بيرد</h2>
                            </a>
                        </div>
                        <div class="login-form">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>عنوان البريد الالكتروني</label>
                                    <input id="email" type="email" class="form-control au-input au-input--full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>
                                <div class="form-group">
                                    <label>كلمة المرور</label>
                                    <input  id="password" type="password" class="form-control au-input au-input--full @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>تذكر كلمة المرور
                                    </label>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('هل نسيت كلمة المرور؟') }}
                                    </a>
                                @endif
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20 " type="submit" >
                                    {{ __('تسجيل الدخول ') }}</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    هل ليس لديك حساب ؟
                                    <a href="{{route('register')}}">سجل من هنا</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

    