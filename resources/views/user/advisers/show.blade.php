@extends('layouts.user')

@section('content')
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="landscape_notice">
				<p class="landscape_notice_txt">
					このウェブサイトは横画面には対応しておりません。<br>スマートフォンの向きを縦にしてご閲覧ください。
				</p>
			</div>
			<section id="advisor_profile" class="container_service">
				<div class="row advisor_profile_main_row">
					<div class="advisor_col_l">
						<section class="profile_section">
							<h2>プロフィール</h2>
							<section class="advisor_profile_section_body">
								<section>
									<div class="row center_flex_ver person_female">
										<div class="person_icon_wrap">
											<img src="{{ $adviser->AdviserProfile->photo_url }}">
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
                                            <p class="voice_txt advisor_balloon advisor_balloon_female">{{ $adviser->AdviserProfile->comment }}</p>
										</div>
									</div>
									<dl class="advisor_card_taglist mt15 txt_l">
										<li><a href="">自己分析</a></li>
										<li><a href="">企業研究</a></li>
										<li><a href="">ES添削</a></li>
										<li><a href="">面接対策</a></li>
										<li><a href="">企業紹介</a></li>
										<li><a href="">ウェブ面談可</a></li>
										<li><a href="">自己分析ならお任せください</a></li>
									</dl>
								</section>
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
						<section class="calender_section mt15">
							<h2>空き日程</h2>
							<section class="advisor_profile_section_body">
								<span class="mark_exp">○面談可 / △WEB面談のみ可 / ×面談不可</span>
								<table>
								<!-- <table class="disabled_calender"> -->
								    <tbody>
								    	<tr>
									      <th class="time"></th>
									        <th class="month" colspan="7"><span>5</span>月</th>
									      <th class="time"></th>
								    	</tr>
								    </tbody>
								    <thead>
								      <tr>
								        <td class="time pagenation_btn_cell pagenation_btn_cell_prev disabled_pagenation">
								        	<a href="">
								        		<img src="{{ asset("img/svg/arrow3_l.svg") }}">
								        		<span>前週</span>
								        	</a>
								        </td>
								            <td class="sunday">19<span>日</span></td>
								            <td>20<span>月</span></td>
								            <td>21<span>火</span></td>
								            <td>22<span>水</span></td>
								            <td>23<span>木</span></td>
								            <td>24<span>金</span></td>
								            <td class="saturday">25<span>土</span></td>
								        <td class="time pagenation_btn_cell pagenation_btn_cell_next">
								        	<a href="">
								        		<span>翌週</span>
								        		<img src="{{ asset("img/svg/arrow3_r.svg") }}">
								        	</a>
								        </td>
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
								        <td class="time pagenation_btn_cell pagenation_btn_cell_prev disabled_pagenation">
								        	<a href="">
								        		<img src="{{ asset("img/svg/arrow3_l.svg") }}">
								        		<span>前週</span>
								        	</a>
								        </td>
								            <td class="sunday">19<span>日</span></td>
								            <td>20<span>月</span></td>
								            <td>21<span>火</span></td>
								            <td>22<span>水</span></td>
								            <td>23<span>木</span></td>
								            <td>24<span>金</span></td>
								            <td class="saturday">25<span>土</span></td>
								        <td class="time pagenation_btn_cell pagenation_btn_cell_next">
								        	<a href="">
								        		<span>翌週</span>
								        		<img src="{{ asset("img/svg/arrow3_r.svg") }}">
								        	</a>
								        </td>
								      </tr>
								    </tfoot>
								  </table>
								  <div class="calender_signup_overlay">
									<div class="calender_signup_overlay_inner">
										<span class="ls25">面談を予約するには、登録が必要です</span>
										<a href="https://line.me/R/ti/p/%40gay5294i" class="calender_signup_btn fs24 fs22sp txt_c fw700 block ls25 ls15_sp">無料で登録する<!-- <i class="fas fa-sign-in-alt ml5"></i> --></a>
									</div>
								  </div>
							</section>
						</section>
					</div>
					<div class="advisor_col_r">
						{{-- <section class="review_section">
							<h2>レビュー</h2>
							<section class="advisor_profile_section_body">
								<!-- <span class="no_review">まだレビューがありません</span> -->
								<div class="review_block">
									<span class="review_user_icon"><img src="{{ asset("img/service/default_usericon.jpg") }}"></span>
									<span class="review_user_name">ユーザー名</span>
									<span>さん</span>
									<span class="stars star5"></span>
									<div class="review_balloon">
										星の数には1-5があり「star1」「star2」というクラスをつけることで星の数を変えることができます。
									</div>
								</div>
								<div class="review_block">
									<span class="review_user_icon"><img src="{{ asset("img/service/default_usericon.jpg") }}"></span>
									<span class="review_user_name">ユーザー名</span>
									<span>さん</span>
									<span class="stars star3"></span>
									<div class="review_balloon">
										内容が長く改行する場合はこのような表示になります。内容が長く改行する場合はこのような表示になります。内容が長く改行する場合はこのような表示になります。
									</div>
								</div>
								<a href="#modal_review_write" class="review_write_btn">
								<!-- <a class="review_write_btn disabled_review"> -->
									<span>レビューを書く</span>
									<i class="fas fa-edit ml50"></i>
								</a>
								<div class="remodal remodal_review" data-remodal-id="modal_review_write">
									<div class="modal_inner">
									<div class="remodal_review_ttl">レビューを投稿</div>
									<div class="review_form_wrap">
										<form type="get" action="#" class="review_form">
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
										  	<textarea name="レビュー内容" id="review_textarea" placeholder="感想を記入してください" rows="5"></textarea>
										  </div>
										  <button type="submit" class="review_submit">レビューを投稿</button>
										</form>
									</div>
									<a class="remodal-cancel" data-remodal-action="cancel"><img src="{{ asset("img/service/close_bl.svg") }}"></a>
									</div>
								</div>
							</section>
						</section> --}}
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
@endsection