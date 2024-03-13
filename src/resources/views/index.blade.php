@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection


@section('content')
<div class="main__content">
    <div class="main__content--title">
        <h2>{{ Auth::user()->name }}さんお疲れ様です！</h2>
    </div>
    <form class="form__attendance" action="/attendance" method="POST">
        @method('PATCH')
        @csrf
        <div class="form__button--attendance">
            @if($info['status'] == 0)
            <button class="form__button-submit" type="submit" name="clock_in">勤務開始</button>
            @else
            <button class="form__button-submit" type="submit" name="clock_in" disabled>勤務開始</button>
            @endif
            @if($info['status'] == 1)
            <button class="form__button-submit" type="submit" name="clock_out">勤務終了</button>
            @else
            <button class="form__button-submit" type="submit" name="clock_out" disabled>勤務終了</button>
            @endif
        </div>
    </form>
    <form class="form__break" action="/break" method="POST">
        @method('PATCH')
        @csrf
        <div class="form__button--break">
            @if($info['status'] == 1)
            <button class="form__button-submit" type="submit" name="break_begins">休憩開始</button>
            @else
            <button class="form__button-submit" type="submit" name="break_begins" disabled>休憩開始</button>
            @endif
            @if($info['status'] == 2)
            <button class="form__button-submit" type="submit" name="break_ends">休憩終了</button>
            @else
            <button class="form__button-submit" type="submit" name="break_ends" disabled>休憩終了</button>
            @endif
        </div>
    </form>
</div>
@endsection