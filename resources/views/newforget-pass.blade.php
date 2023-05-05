@extends('layouts.auth');
@section('content')

@php
    $title ="نسيت كلمة المرور";
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
                            <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                                <div class="form-group">
                                    <label>البريد الالكتروني</label>
                                    <input id="email" type="email" class="form-control au-input au-input--full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="البريد الالكتروني">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

  @endsection 