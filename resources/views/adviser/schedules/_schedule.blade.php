@foreach ($week as $key => $day)
    <?php $flag = false ?>
    @foreach ($schedules as $schedule)
        <?php $dt = new \Carbon\Carbon($day->format('Y-m-d') . ' ' . $array[$day->format('Y-m-d')][$index]) ?>
        <?php $dt2 = new \Carbon\Carbon($day->format('Y-m-d') . ' ' . $array[$day->format('Y-m-d')][$index + 1]) ?>
        @if ($schedule->date->between($dt, $dt2))
            @if ($schedule->is_online)
                <td class="web_ok">△</td>
            @elseif ($schedule->is_ng)
                <td class="all_ng">×</td>
            @endif
            <?php $flag = true ?>
        @endif
    @endforeach
    @if (!$flag)
        <td class="all_ok">○</td>
    @endif
@endforeach
