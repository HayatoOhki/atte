@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}" />
<link rel="stylesheet" href="{{ asset('css/paginate.css') }}" />
@endsection


@section('content')
<div class="main__content">
    <div class="main__content--title">
        <form class="form__date" action="/attendance" method="POST">
            @method('PUT')
            @csrf
            @if($num != 0)
            <button type="submit" name="prev"><</button>
            @endif
            <h2>{{ $date_list[$num] }}</h2>
            <input type="hidden" name="num" value="{{ $num }}">
            @if($num < count($date_list) - 1)
            <button type="submit" name="next">></button>
            @endif
        </form>
    </div>
    <div class="attendance-table">
        <table class="attendance-table__inner">
            <tr class="attendance-table__row">
                <th class="attendance-table__header">名前</th>
                <th class="attendance-table__header">勤務開始</th>
                <th class="attendance-table__header">勤務終了</th>
                <th class="attendance-table__header">休憩時間</th>
                <th class="attendance-table__header">勤務時間</th>
            </tr>
            @foreach($attendances as $attendance)
            <tr class="attendance-table__row">
                <td class="attendance-table__item">{{ $attendance['user']['name'] }}</td>
                <td class="attendance-table__item">{{ $attendance['clock_in'] }}</td>
                <td class="attendance-table__item">{{ $attendance['clock_out'] }}</td>
                <td class="attendance-table__item">{{ $attendance['break_times'] }}</td>
                <td class="attendance-table__item">{{ $attendance['time_worked'] }}</td>
            </tr>
            @endforeach
        </table>
        {{ $attendances->links() }}
    </div>
</div>
@endsection