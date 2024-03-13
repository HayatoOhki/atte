@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
<link rel="stylesheet" href="{{ asset('css/paginate.css') }}" />
@endsection


@section('content')
<div class="main__content">
    <div class="main__content--title">
        <h2>{{ $user['name'] }}</h2>
    </div>
    <div class="user-table">
        <table class="user-table__inner">
            <tr class="user-table__row">
                <th class="user-table__header">日付</th>
                <th class="user-table__header">勤務開始</th>
                <th class="user-table__header">勤務終了</th>
                <th class="user-table__header">休憩時間</th>
                <th class="user-table__header">勤務時間</th>
            </tr>
            @foreach($attendances as $attendance)
            <tr class="user-table__row">
                <td class="user-table__item">{{ $attendance['date'] }}</td>
                <td class="user-table__item">{{ $attendance['clock_in'] }}</td>
                <td class="user-table__item">{{ $attendance['clock_out'] }}</td>
                <td class="user-table__item">{{ $attendance['break_times'] }}</td>
                <td class="user-table__item">{{ $attendance['time_worked'] }}</td>
            </tr>
            @endforeach
        </table>
        {{ $attendances->links() }}
    </div>
</div>
    @endsection