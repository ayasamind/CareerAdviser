@extends('layouts.adviser')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">スケジュール編集</div>
                <div class="card-body">
                    <section class="calender_section mt15">
                        <h2>空き日程</h2>
                        <form action="{{ route('adviser.schedules.update', [
                            'id' => $adviser->id
                        ]) }}" id="form" method="post">
                            @csrf
                            <section class="advisor_profile_section_body">
                                <span class="mark_exp">○面談可 / △WEB面談のみ可 / ×面談不可</span>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="time"></th>
                                            <td colspan="3">
                                                <a href="{{ route("adviser.schedules.edit", [
                                                    'id' => $adviser->id,
                                                ]) }}">
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
                                            <th class="time">一括変更</th>
                                            @for ($i = 0; $i <=6; $i++)
                                                <td>
                                                    {!! Form::select('select', $schedule_lists, null, [
                                                        'id' => 'many_select_'.$i,
                                                        'class' => 'many_select'
                                                    ]) !!}
                                                </td>
                                            @endfor
                                            <th class="time"></th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                        <td>
                                            <?php $carbon = new \Carbon\Carbon() ?>
                                            @if ($carbon->addDay(2)->format('Y-m-d') != $week[0]->format('Y-m-d'))
                                                <a class="confirm" href="{{ route("adviser.schedules.edit", [
                                                    'id' => $adviser->id,
                                                    'param' => $week[0],
                                                    'type'  => 'before'
                                                ]) }}">
                                                    <span>前週</span>
                                                </a>
                                            @endif
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
                                            <a class="confirm" href="{{ route("adviser.schedules.edit", [
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
                                        <?php $hour = $i + 10 ?>
                                            <tr>
                                                <td class="time">{{ $hour }}:00</td>
                                                    @include("adviser.schedules._schedule_edit", ['schedule_lists' => $schedule_lists, 'minutes' => '00:00', 'week' => $week, 'schedules' => $schedules, 'index' => $i * 2, 'date' => $i + 10 . ":00", 'id' => $adviser->id])
                                                <td class="time">{{ $hour }}:00</td>
                                            </tr>
                                            <tr>
                                                <td class="time">{{ $hour }}:30</td>
                                                    @include("adviser.schedules._schedule_edit", ['schedule_lists' => $schedule_lists, 'minutes' => '30:01', 'week' => $week, 'schedules' => $schedules, 'index' => $i * 2 + 1, 'date' => $i + 10 . ":30", 'id' => $adviser->id])
                                                <td class="time">{{ $hour }}:30</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <td>
                                            <?php $carbon = new \Carbon\Carbon() ?>
                                            @if ($carbon->addDay(2)->format('Y-m-d') != $week[0]->format('Y-m-d'))
                                                <a class="confirm" href="{{ route("adviser.schedules.edit", [
                                                    'id' => $adviser->id,
                                                    'param' => $week[0],
                                                    'type'  => 'before'
                                                ]) }}">
                                                    <span>前週</span>
                                                </a>
                                            @endif
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
                                            <a class="confirm" href="{{ route("adviser.schedules.edit", [
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
                                    <div class="row">
                                        <div class="col-sm"></div>
                                        <div class="col-sm">
                                            <button type="submit" class="btn btn-primary btn-block">保存</button>
                                        </div>
                                        <div class="col-sm"></div>
                                    </div>
                                    <div class="calender_signup_overlay">
                                    <div class="calender_signup_overlay_inner">
                                    </div>
                                </div>
                            </section>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset("js/adviser_schedule.js") }}"></script>
@endsection
