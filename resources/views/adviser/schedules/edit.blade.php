@extends('layouts.adviser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">スケジュール編集</div>
                <div class="card-body">
                    <section class="col-md-10 col-md-offset-1 calender_section">
                        <h2>空き日程</h2>
                        <section class="advisor_profile_section_body">
                            <span class="mark_exp">○面談可 / △WEB面談のみ可 / ×面談不可</span>
                            <table>
                                <thead>
                                    <tr>
                                        <td class="time pagenation_btn_cell pagenation_btn_cell_prev disabled_pagenation"></td>
                                        <td class="sunday"><span>日</span></td>
                                        <td><span>月</span></td>
                                        <td><span>火</span></td>
                                        <td><span>水</span></td>
                                        <td><span>木</span></td>
                                        <td><span>金</span></td>
                                        <td class="saturday"><span>土</span></td>
                                        <td class="time pagenation_btn_cell pagenation_btn_cell_next"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td class="time">10:00</td>
                                        <td class="web_ok"><a href="confirm.php">△</a></td>
                                        <td class="web_ok"><a href="confirm.php">△</a></td>
                                        <td class="web_ok"><a href="confirm.php">△</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">10:00</td>
                                    </tr>
                                    <tr>
                                    <td class="time">10:30</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ng">×</td>
                                    <td class="time">10:30</td>
                                    </tr>
                                    <tr>
                                    <td class="time">11:00</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ng">×</td>
                                    <td class="time">11:00</td>
                                    </tr>
                                    <tr>
                                    <td class="time">11:30</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ng">×</td>
                                    <td class="time">11:30</td>
                                    </tr>
                                    <tr>
                                    <td class="time">12:00</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ng">×</td>
                                    <td class="time">12:00</td>
                                    </tr>
                                    <tr>
                                    <td class="time">12:30</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ng">×</td>
                                    <td class="time">12:30</td>
                                    </tr>
                                    <tr>
                                    <td class="time">13:00</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ng">×</td>
                                    <td class="time">13:00</td>
                                    </tr>
                                    <tr>
                                    <td class="time">13:30</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ng">×</td>
                                    <td class="time">13:30</td>
                                    </tr>
                                    <tr>
                                    <td class="time">14:00</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ng">×</td>
                                    <td class="time">14:00</td>
                                    </tr>
                                    <tr>
                                    <td class="time">14:30</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                    <td class="time">14:30</td>
                                    </tr>
                                    <tr>
                                    <td class="time">15:00</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                    <td class="time">15:00</td>
                                    </tr>
                                    <tr>
                                    <td class="time">15:30</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                    <td class="time">15:30</td>
                                    </tr>
                                    <tr>
                                    <td class="time">16:00</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">16:00</td>
                                    </tr>
                                    <tr>
                                    <td class="time">16:30</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">16:30</td>
                                    </tr>
                                    <tr>
                                    <td class="time">17:00</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">17:00</td>
                                    </tr>
                                    <tr>
                                    <td class="time">17:30</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">17:30</td>
                                    </tr>
                                    <tr>
                                    <td class="time">18:00</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">18:00</td>
                                    </tr>
                                    <tr>
                                    <td class="time">18:30</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">18:30</td>
                                    </tr>
                                    <tr>
                                    <td class="time">19:00</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">19:00</td>
                                    </tr>
                                    <tr>
                                    <td class="time">19:30</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">19:30</td>
                                    </tr>
                                    <tr>
                                    <td class="time">20:00</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">20:00</td>
                                    </tr>
                                    <tr>
                                    <td class="time">20:30</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">20:30</td>
                                    </tr>
                                    <tr>
                                    <td class="time">21:00</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">21:00</td>
                                    </tr>
                                    <tr>
                                    <td class="time">21:30</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">21:30</td>
                                    </tr>
                                    <tr>
                                    <td class="time">22:00</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ng">×</td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                        <td class="all_ok"><a href="confirm.php">○</a></td>
                                    <td class="time">22:00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <td class="time pagenation_btn_cell pagenation_btn_cell_prev disabled_pagenation"></td>
                                        <td class="sunday"><span>日</span></td>
                                        <td><span>月</span></td>
                                        <td><span>火</span></td>
                                        <td><span>水</span></td>
                                        <td><span>木</span></td>
                                        <td><span>金</span></td>
                                        <td class="saturday"><span>土</span></td>
                                    <td class="time pagenation_btn_cell pagenation_btn_cell_next"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </section>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
