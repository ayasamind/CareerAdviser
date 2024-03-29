@extends('layouts.user')

@section('content')
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            認証メールを再送信しました！
        </div>
    @endif
    @if ($user)
        @if (!$user->email_verified_at)
            <div class="alert alert-success" role="alert">
                Eメールによる認証が完了していません。
                もし認証用のメールを受け取っていない場合、 <a href="{{ route('verification.resend') }}">こちらのリンク</a>をクリックして、認証メールを受け取ってください。
            </div>
        @endif
    @endif
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			{{-- <div class="landscape_notice">
				<p class="landscape_notice_txt">
					このウェブサイトは横画面には対応しておりません。<br>スマートフォンの向きを縦にしてご閲覧ください。
				</p>
			</div> --}}
			<section id="advisor_profile" class="container_service">
				<div class="row advisor_profile_main_row">
					<div class="advisor_col_l">
						<section class="profile_section">
							<h2>プロフィール</h2>
							<section class="advisor_profile_section_body">
								<section>
                                    <div
                                        @if ($adviser->AdviserProfile->gender == 1)
                                            class="row center_flex_ver person_male"
                                        @else
                                            class="row center_flex_ver person_female"
                                        @endif
                                    >
										<div class="person_icon_wrap">
											<img src="{{ $adviser->AdviserProfile->photo_url ? $adviser->AdviserProfile->photo_url : asset('img/service/default_usericon.jpg') }}">
										</div>
										<div class="person_info_wrap">
											<div class="person_info_wrap_inner center_flex_ver">
												<h3 class="ls15">
                                                    <span class="person_name">{{ $adviser->name }}</span>
													<!-- <span class="advisor_name_en">Aki Yamamoto</span> -->
												</h3>
												<dl>
                                                    @if($adviser->AdviserProfile->gender == 1)
													    <li class=""><img class="gender_icon" src="{{ asset("img/service/man.svg") }}">男性</li>
                                                    @else
                                                        <li class=""><img class="gender_icon" src="{{ asset("img/service/woman.svg") }}">女性</li>
                                                    @endif
                                                    <li><img class="area_icon" src="{{ asset("img/service/map.svg") }}">{{ $adviser->AdviserProfile->prefecture }}</li>
                                                    @if ($adviser->AdviserProfile->deny_interview)
                                                        <li><img class="reject_icon" src="{{ asset("img/service/reject.svg") }}">面談拒否あり</li>
                                                    @endif
                                                </dl>
											</div>
                                            <p
                                                @if($adviser->AdviserProfile->gender == 1)
                                                    class="voice_txt advisor_balloon advisor_balloon_male"
                                                @else
                                                    class="voice_txt advisor_balloon advisor_balloon_female"
                                                @endif
                                            >{{ $adviser->AdviserProfile->comment }}</p>
                                            <a target="_blank" href="https://www.google.com/maps/search/?api=1&query={{ $adviser->AdviserProfile->meeting_place }}" class="txt_link voice_txt advisor_balloon">面談場所: {{ $adviser->AdviserProfile->meeting_place }}</a>
										</div>
									</div>
									<dl class="advisor_card_taglist mt15 txt_l">
                                        @foreach ($adviser->Tag as $tag)
                                            <li><a href="{{ route('advisers.index', [
                                                'tag' => $tag->id
                                            ]) }}">{{ $tag->name }}</a></li>
										@endforeach
                                    </dl>
                                    <a href="{{ $adviser->AdviserProfile->article_url ? $adviser->AdviserProfile->article_url : "#" }}" target="_blank" class="to_interview_btn">
										<span>インタビュー記事を見る</span>
										<i class="fas fa-external-link-alt ml50"></i>
									</a>
                                </section>
                                @if (!$adviser->schedule_flag)
                                    <div class="advisor_card_inner">
                                        <a href="{{ route('user.send_request', [
                                            'id' => $adviser->id
                                        ])  }}" style="background:#fabe00;"
                                            @guest
                                                class="advisor_card_more_btn fw700 fs17 mt10 guest"
                                            @else
                                                class="advisor_card_more_btn fw700 fs17 mt10 user"
                                            @endguest
                                        >
                                            <i class="fas fa-user-circle fs28"></i>
                                            <span>面談依頼を送る(アドバイザーに通知がいきます)</span>
                                        </a>
                                    </div>
                                @endif
								<section class="self_introduction_section">
									<h3>自己紹介</h3>
                                    <p>{{ $adviser->AdviserProfile->introduce }}</p>
								</section>
								<section class="work_history_section">
									<h3>略歴</h3>
									<dl>
                                        @foreach ($adviser->AdviserCareer as $career)
                                            <li><span>{{ $career->year }}</span>{{ $career->career }}</li>
                                        @endforeach
									</dl>
								</section>
								<section class="work_history_section">
									<h3>その他</h3>
									<dl>
                                        <li><span>紹介できる企業の業界</span>{{ $adviser->AdviserProfile->industry }}</li>
                                        <li><span>紹介できる企業の数</span>{{ $adviser->AdviserProfile->company_number }}</li>
                                        <li><span>紹介できる企業の所在地</span>{{ $adviser->AdviserProfile->place }}</li>
                                        <li><span>面談実績(面談数:内定実績)</span>{{ $adviser->AdviserProfile->performance }}</li>
									</dl>
								</section>
							</section>
                        </section>
                        @if ($adviser->schedule_flag)
                            <section class="calender_section mt15">
                                <h2>空き日程</h2>
                                <section class="advisor_profile_section_body">
                                    <span class="mark_exp">○面談可 / △WEB面談のみ可 / ×面談不可</span>
                                    <table
                                        @guest
                                            class="disabled_calender"
                                        @else
                                            @if ($user)
                                                @if (!$user->email_verified_at)
                                                    class="disabled_calender"
                                                @endif
                                            @endif
                                        @endguest
                                    >
                                        <tbody>
                                            <tr>
                                            <th class="time"></th>
                                                <th class="month" colspan="7"><span>{{ $week[0]->month }}</span>月</th>
                                            <th class="time"></th>
                                            </tr>
                                        </tbody>
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
                                                <a href="{{ route("advisers.show", [
                                                    'id' => $adviser->id,
                                                    'param' => $week[0],
                                                    'type'  => 'before'
                                                ]) }}">
                                                    <img src="{{ asset("img/svg/arrow3_l.svg") }}">
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
                                                <a href="{{ route("advisers.show", [
                                                    'id' => $adviser->id,
                                                    'param' => $week[0],
                                                    'type'  => 'after'
                                                ]) }}">
                                                    <span>翌週</span>
                                                    <img src="{{ asset("img/svg/arrow3_r.svg") }}">
                                                </a>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i <=11; $i++)
                                                <tr>
                                                    <td class="time">{{ $i + 10 }}:00</td>
                                                        @include("user.advisers._schedule", ['week' => $week, 'schedules' => $schedules, 'index' => $i * 2, 'date' => $i + 10 . ":00", 'id' => $adviser->id])
                                                    <td class="time">{{ $i + 10 }}:00</td>
                                                </tr>
                                                <tr>
                                                    <td class="time">{{ $i + 10 }}:30</td>
                                                        @include("user.advisers._schedule", ['week' => $week, 'schedules' => $schedules, 'index' => $i * 2 + 1, 'date' => $i + 10 . ":30", 'id' => $adviser->id])
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
                                                <a href="{{ route("advisers.show", [
                                                    'id' => $adviser->id,
                                                    'param' => $week[0],
                                                    'type'  => 'before'
                                                ]) }}">
                                                    <img src="{{ asset("img/svg/arrow3_l.svg") }}">
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
                                                <a href="{{ route("advisers.show", [
                                                    'id' => $adviser->id,
                                                    'param' => $week[0],
                                                    'type'  => 'after'
                                                ]) }}">
                                                    <span>翌週</span>
                                                    <img src="{{ asset("img/svg/arrow3_r.svg") }}">
                                                </a>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="calender_signup_overlay">
                                        <div class="calender_signup_overlay_inner">
                                            @guest
                                                <span class="ls25">面談を予約するには、登録が必要です</span>
                                                <a href="{{ route('register') }}" class="calender_signup_btn fs24 fs22sp txt_c fw700 block ls25 ls15_sp">無料で登録する<!-- <i class="fas fa-sign-in-alt ml5"></i> --></a>
                                            @else
                                                @if ($user)
                                                    @if (!$user->email_verified_at)
                                                        <span class="ls25">面談を予約するには、メール認証が必要です</span>
                                                        <a href="{{ route('verification.resend') }}" class="calender_signup_btn fs24 fs22sp txt_c fw700 block ls25 ls15_sp">認証メールを再送する<!-- <i class="fas fa-sign-in-alt ml5"></i> --></a>
                                                    @endif
                                                @endif
                                            @endguest
                                        </div>
                                    </div>
                                </section>
                            </section>
                        @else
                            <div class="advisor_card_inner">
                                <a href="{{ route('user.send_request', [
                                    'id' => $adviser->id
                                ])  }}" style="background:#fabe00;"
                                    @guest
                                        class="advisor_card_more_btn fw700 fs17 mt10 guest"
                                    @else
                                        class="advisor_card_more_btn fw700 fs17 mt10 user"
                                    @endguest
                                >
                                    <i class="fas fa-user-circle fs28"></i>
                                    <span>面談依頼を送る(アドバイザーに通知がいきます)</span>
                                </a>
                            </div>
                        @endif
					</div>
					<div class="advisor_col_r">
						<section class="review_section">
							<h2>レビュー</h2>
							<section class="advisor_profile_section_body">
                                @if (count($meetingRequests) === 0)
                                    <span class="no_review">まだレビューがありません</span>
                                @endif
                                @foreach ($meetingRequests as $meetingRequest)
                                    <div class="review_block">
                                        <span class="review_user_icon"><img src="{{ $meetingRequest->User->UserProfile ? $meetingRequest->User->UserProfile->photo_url : asset("img/service/default_usericon.jpg") }}"></span>
                                        <span class="review_user_name">{{ $meetingRequest->User->name }}</span>
                                        <span>さん</span>
                                        <span class="stars star{{ $meetingRequest->star }}"></span>
                                        <div class="review_balloon">
                                            {{ $meetingRequest->review }}
                                        </div>
                                    </div>
                                @endforeach
                                @if ($canWriteReview)
                                    <a href="#modal_review_write" class="review_write_btn">
                                    <!-- <a class="review_write_btn disabled_review"> -->
                                        <span>レビューを書く</span>
                                        <i class="fas fa-edit ml50"></i>
                                    </a>
                                @endif
                                    <div class="remodal remodal_review" data-remodal-id="modal_review_write">
                                        <div class="modal_inner">
                                        <div class="remodal_review_ttl">レビューを投稿</div>
                                        <div class="review_form_wrap">
                                            {!! Form::model($canWriteReview, ['route' => ['user.save_review', $canWriteReview ? $canWriteReview->id : null],
                                                'method' => 'post',
                                                'class' => 'review_form row center_flex_ver'
                                            ]) !!}
                                                <label class="review_form_label">評価</label>
                                                <div class="evaluation">
                                                    <input id="star1" type="radio" name="star" value="5" />
                                                    <label for="star1">★</label>
                                                    <input id="star2" type="radio" name="star" value="4" />
                                                    <label for="star2">★</label>
                                                    <input id="star3" type="radio" name="star" value="3" />
                                                    <label for="star3">★</label>
                                                    <input id="star4" type="radio" name="star" value="2" />
                                                    <label for="star4">★</label>
                                                    <input id="star5" type="radio" name="star" value="1" />
                                                    <label for="star5">★</label>
                                                </div>
                                                <div class="review_text_wrap">
                                                    <label class="review_form_label">感想</label>
                                                    {!! Form::textarea('review', $canWriteReview ? $canWriteReview->review : null, ['id'=>'review_textarea', 'class'=>'mypage_input_txt', 'required'=>'required', 'placeholder' => '感想を記入してください', 'row' => 5]) !!}
                                                </div>
                                                <button type="submit" class="review_submit">レビューを投稿</button>
                                            {!! Form::close() !!}
                                        </div>
                                        <a class="remodal-cancel" data-remodal-action="cancel"><img src="{{ asset("img/service/close_bl.svg") }}"></a>
                                        </div>
                                    </div>
                                </section>
                        </section>
					</div>
				</div>
			</section>
		</main><!-- #main -->
    </div><!-- #primary -->
    <form id="request-form" action="{{ route('user.send_request', [
        'id' => $adviser->id
    ]) }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

@section('script')
    <script>
        $(document).on('click', '.guest', function () {
            alert('面談依頼には会員登録が必要です')
            return false
        })
        $(document).on('click', '.user', function () {
            event.preventDefault();
            document.getElementById('request-form').submit();
        })
    </script>
@endsection
