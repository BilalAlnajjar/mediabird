@extends('layouts.auth')
@section('content')

@php
    $title ="صفحة التسجيل";
@endphp

<body class="animsition">
    <div class="page-wrapper">
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
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label>اسم المستخدم</label>
                                    <input  id="name" type="text" class="form-control au-input au-input--full @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>
                                <div class="form-group">
                                    <label>عنوان البريد الالكترةني</label>
                                    <input id="email" type="email" class="form-control au-input au-input--full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>
                                <div class="form-group">
                                    <label>كلمة المرور</label>

                                    <input id="password" type="password" class="form-control au-input au-input--full @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>

                                <div class="form-group">
                                    <label>تأكيد كلمة المرور</label>

                                    <input id="password-confirm" type="password" class="form-control au-input au-input--full" name="password_confirmation" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">تسجيل</button>
                            </form>
                            <div class="register-link">
                                <p>
                                   هل لديك حساب بالفعل؟
                                <a href="{{route('login')}}">سجل الدخول</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection