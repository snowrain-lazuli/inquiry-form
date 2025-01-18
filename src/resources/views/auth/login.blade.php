@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="contact-form__heading">
    <h2>Login</h2>
</div>
<div class="contact-form__content">
    <form class="form" action="/login" method="post">
        @csrf
        <div class="form__groups">
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" placeholder="例:test@example.com"
                            value="{{ old('email') }}@if (!empty($contact['email'])){{ $contact['email'] }}@endif" />
                    </div>
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">パスワード</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text" name="password">
                        <input type="password" name="password" placeholder="例:coachtech1106"
                            value="{{ old('password') }}@if (!empty($contact['password'])){{ $contact['password'] }}@endif">
                    </div>
                    <div class="form__error">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>




            <div class="form__button">
                <button class="form__button-submit" type="submit">ログイン</button>
            </div>
        </div>
    </form>
</div>
@endsection