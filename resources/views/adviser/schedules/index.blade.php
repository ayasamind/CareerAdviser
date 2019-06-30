@extends('layouts.adviser')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">空き日程一覧</div>
                <div class="card-body">
                    <section class="calender_section mt15">
                        <h2>空き日程</h2>
                        <a class="btn btn-primary float-right btn-lg" href="{{ route('adviser.schedules.edit', [
                            'adviser' => $adviser->id
                        ]) }}">編集</a>
                        <section class="advisor_profile_section_body">
                            <span class="mark_exp">○面談可 / △WEB面談のみ可 / ×面談不可</span>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="time"></th>
                                        <td colspan="3">
                                            <a href="{{ route("adviser.schedules.index") }}">
                                                <span>今週</span>
                                            </a>
                                        </td>
                                        <th class="month" colspan="7">
                                            <span>{{ $week[0]->month }}</span>月
                                        </th>
                                        <th class="time"></th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                    <td
                                        <?php $carbon = new \Carbon\Carbon() ?>
                                        @if ($carbon->addDay(2)->format('Y-m-d') == $week[0]->format('Y-m-d'))
                                            class="time pagenation_btn_cell pagenation_btn_cell_prev disabled_pagenation"
                                        @else
                                            class="time pagenation_btn_cell pagenation_btn_cell_prev"
                                        @endif
                                    >
                                        <a href="{{ route("adviser.schedules.index", [
                                            'id' => $adviser->id,
                                            'param' => $week[0],
                                            'type'  => 'before'
                                        ]) }}">
                                            <span>前週</span>
                                        </a>
                                    </td>
                                    @foreach ($week as $day)
                                        <td
                                            @if ($day->isSunday())
                                                class="sunday"
                                            @elseif ($day->isSaturday())
                                                class="sunday"
                                            @endif
                                        >{{ $day->day }}
                                            <span>{{ $day->formatLocalized('%a') }}</span>
                                        </td>
                                    @endforeach
                                    <td class="time pagenation_btn_cell pagenation_btn_cell_next">
                                        <a href="{{ route("adviser.schedules.index", [
                                            'id' => $adviser->id,
                                            'param' => $week[0],
                                            'type'  => 'after'
                                        ]) }}">
                                            <span>翌週</span>
                                        </a>
                                    </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i <=11; $i++)
                                        <tr>
                                            <td class="time">{{ $i + 10 }}:00</td>
                                                @include("adviser.schedules._schedule", ['week' => $week, 'schedules' => $schedules, 'index' => $i * 2, 'date' => $i + 10 . ":00", 'id' => $adviser->id])
                                            <td class="time">{{ $i + 10 }}:00</td>
                                        </tr>
                                        <tr>
                                            <td class="time">{{ $i + 10 }}:30</td>
                                                @include("adviser.schedules._schedule", ['week' => $week, 'schedules' => $schedules, 'index' => $i * 2 + 1, 'date' => $i + 10 . ":30", 'id' => $adviser->id])
                                            <td class="time">{{ $i + 10 }}:30</td>
                                        </tr>
                                    @endfor
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <td
                                        <?php $carbon = new \Carbon\Carbon() ?>
                                        @if ($carbon->addDay(2)->format('Y-m-d') == $week[0]->format('Y-m-d'))
                                            class="time pagenation_btn_cell pagenation_btn_cell_prev disabled_pagenation"
                                        @else
                                            class="time pagenation_btn_cell pagenation_btn_cell_prev"
                                        @endif
                                    >
                                        <a href="{{ route("adviser.schedules.index", [
                                            'id' => $adviser->id,
                                            'param' => $week[0],
                                            'type'  => 'before'
                                        ]) }}">
                                            <span>前週</span>
                                        </a>
                                    </td>
                                    @foreach ($week as $day)
                                        <td
                                            @if ($day->isSunday())
                                                class="sunday"
                                            @elseif ($day->isSaturday())
                                                class="sunday"
                                            @endif
                                        >{{ $day->day }}
                                            <span>{{ $day->formatLocalized('%a') }}</span>
                                        </td>
                                    @endforeach
                                    <td class="time pagenation_btn_cell pagenation_btn_cell_next">
                                        <a href="{{ route("adviser.schedules.index", [
                                            'id' => $adviser->id,
                                            'param' => $week[0],
                                            'type'  => 'after'
                                        ]) }}">
                                            <span>翌週</span>
                                        </a>
                                    </td>
                                    </tr>
                                </tfoot>
                                </table>
                                <div class="calender_signup_overlay">
                                <div class="calender_signup_overlay_inner">
                                </div>
                            </div>
                        </section>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
