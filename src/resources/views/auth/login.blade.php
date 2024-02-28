@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection


@section('content')
<div class="form__content">
    <div class="form__heading">
        <h2>ログイン</h2>
    </div>
    <form class="form" action="/login" method="POST">
        @csrf
        <div class="form__group">
            <div class="form__input">
                <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
            </div>
            <div class="form__error">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input">
                <input type="password" name="password" placeholder="パスワード">
            </div>
            <div class="form__error">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
        </div>
        <div class="form__induction">
            <p class="form__induction--label">アカウントをお持ちでない方はこちらから</p>
            <a class="form__induction--link" href="/register">会員登録</a>
        </div>
    </form>
</div>
@endsection