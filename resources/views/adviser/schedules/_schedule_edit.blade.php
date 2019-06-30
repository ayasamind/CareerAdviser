<?php $i = 0 ?>
@foreach ($week as $key => $day)
    <?php $flag = false ?>
    @foreach ($schedules as $schedule)
        <?php $dt = new \Carbon\Carbon($day->format('Y-m-d') . ' ' . $array[$day->format('Y-m-d')][$index]) ?>
        <?php $dt2 = new \Carbon\Carbon($day->format('Y-m-d') . ' ' . $array[$day->format('Y-m-d')][$index + 1]) ?>
        @if ($schedule->date->between($dt, $dt2))
            @if ($schedule->is_online)
                <td class="web_ok">
                    {!! Form::hidden('schedules['. $day->format("Y-m-d") . ' ' . $hour .':'. $minutes . '][id]', $schedule->id) !!}
                    {!! Form::select('schedules['. $day->format("Y-m-d") . ' ' . $hour .':'. $minutes . '][type]', $schedule_lists, \App\AdviserSchedule::SCHEDULE_TYPE_ONLINE, [
                        'class' => $i
                    ]) !!}
                </td>
            @elseif ($schedule->is_ng)
                <td class="all_ng">
                    {!! Form::hidden('schedules['. $day->format("Y-m-d") . ' ' . $hour . ':' . $minutes . '][id]', $schedule->id) !!}
                    {!! Form::select('schedules['. $day->format("Y-m-d") . ' ' . $hour . ':' . $minutes . '][type]', $schedule_lists, \App\AdviserSchedule::SCHEDULE_TYPE_NG, [
                        'class' => $i
                    ]) !!}
                </td>
            @endif
            <?php $flag = true ?>
        @endif
    @endforeach
    @if (!$flag)
        <td class="all_ok">
            {!! Form::hidden('schedules['. $day->format("Y-m-d") . ' ' . $hour . ':' . $minutes . '][id]', null) !!}
            {!! Form::select('schedules['. $day->format("Y-m-d") . ' ' . $hour .':'. $minutes . '][type]', $schedule_lists, null, [
                'class' => $i
            ]) !!}
        </td>
    @endif
<?php $i++ ?>
@endforeach
