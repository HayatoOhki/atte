@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/user.css') }}" />
<link rel="stylesheet" href="{{ asset('css/paginate.css') }}" />
@endsection


@section('content')
<div class="main__content">
    <div class="main__content--title">
        <h2>ユーザー一覧</h2>
    </div>
    <ul class="user__list">
        @foreach($users as $user)
        <li class="user__list--item"><a href="/user/{{ $user['id'] }}">{{ $user['name'] }}</a></li>
        @endforeach
    </ul>
    {{ $users->links() }}
</div>
@endsection