@extends('layouts.app')


@section('css')
<!-- login.cssと同様の為代用 -->
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection


@section('content')
<div class="form__content">
    <div class="form__heading">
        <h2>会員登録</h2>
    </div>
    <form class="form" action="/register" method="POST">
        @csrf
        <div class="form__group">
            <div class="form__input">
                <input type="text" name="name" placeholder="名前" value="{{ old('name') }}">
            </div>
            <div class="form__error">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>
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
        <div class="form__group">
            <div class="form__input">
                <input type="password" name="password_confirmation" placeholder="確認用パスワード">
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">会員登録</button>
        </div>
        <div class="form__induction">
            <p class="form__induction--label">アカウントをお持ちの方はこちらから</p>
            <a class="form__induction--link" href="/login">ログイン</a>
        </div>
    </form>
</div>
@endsection