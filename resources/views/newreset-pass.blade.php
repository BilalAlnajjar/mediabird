@extends('layouts.auth')
@section('content')

@php
    $title ="اعادة تعين كلمة المرور";
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
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">
                                    
                                <div class="form-group">
                                    <label>عنوان البريد الالكتروني</label>
                                    <input id="email" type="email" class="form-control form-control au-input au-input--full @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus  placeholder="Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>
                                <div class="form-group">
                                    <label> كلمة المرور الجديدة</label>

                                    <input id="password" type="password" class="form-control form-control au-input au-input--full @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="كلمة المرور الجديدة">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>

                                <div class="form-group">
                                    <label>تأكيد كلمة المرور</label>

                                    <input id="password-confirm" type="password" class="form-control form-control au-input au-input--full" name="password_confirmation" required autocomplete="new-password"  placeholder="تأكيد كلمة المرور">

                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">تأكيد</button>
                            </form>
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection