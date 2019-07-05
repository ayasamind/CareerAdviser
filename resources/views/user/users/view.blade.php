@extends('layouts.user')

@section('content')
@if (session('resent'))
    <div class="alert alert-success" role="alert">
        認証メールを再送信しました！
    </div>
@endif
@if (!$user->email_verified_at)
    <div class="alert alert-success" role="alert">
        Eメールによる認証が完了していません。
        もし認証用のメールを受け取っていない場合、 <a href="{{ route('verification.resend') }}">こちらのリンク</a>をクリックして、認証メールを受け取ってください。
    </div>
@endif
<div id="ajax-message-success" class="alert alert-success hide" role="alert"></div>
<div id="ajax-message-error" class="alert alert-danger hide" role="alert"></div>
<div id="primary" class="content-area">
		<main id="main" class="site-main">
			{{-- <div class="landscape_notice">
				<p class="landscape_notice_txt">
					このウェブサイトは横画面には対応しておりません。<br>スマートフォンの向きを縦にしてご閲覧ください。
                </p>
            </div> --}}
            <section id="mypage" class="container_service">
				<div class="row mypage_main_row">
					<div class="mypage_col_l">
						<section class="profile_section">
                            <h2>プロフィール</h2>
							<section class="mypage_section_body">
								<section id="main_profile_section">
                                    {!! Form::model($user, ['route' => ['user.users.update', $user->id],
                                        'method' => 'put',
                                        'id' => 'file_upload',
                                        'class' => 'row center_flex_ver person_icon_row person_male profile_form'
                                    ]) !!}
										<div class="person_icon_wrap">
                                            @if ($user->UserProfile)
                                                <div class="preview" data-url="{{ $user->UserProfile->photo_url ? $user->UserProfile->photo_url : '' }}">
                                            @else
                                                <div class="preview" data-url="">
                                            @endif
                                                @if ($user->UserProfile)
                                                    <img src="{{ $user->UserProfile->photo_url ? $user->UserProfile->photo_url : asset('img/service/default_usericon.jpg') }}">
                                                @else
											        <img src="{{ asset('img/service/default_usericon.jpg') }}">
                                                @endif
                                            </div>
                                            <div class="uploadButton">
                                                ファイルを選択
                                                {!! Form::file('UserProfile[photo]', null, ['id'=>'photo']) !!}
                                                <span class="validate-error">
                                                    <br/>
                                                    <strong id="validate-photo_url"></strong>
                                                </span>
                                            </div>
										</div>
										<div class="person_info_wrap">
											<div class="person_info_wrap_inner center_flex_ver person_info_wrap_inner_static">
												<h3 class="ls15">
                                                    <span class="person_name">{{ $user->name }}</span>
												</h3>
												<dl>
                                                    @if ($user->UserProfile)
                                                        @if($user->UserProfile->gender == 1)
                                                            <li id="gender_area" class="male_li"><img class="gender_icon" src="../../img/service/man.svg">男性</li>
                                                        @elseif($user->UserProfile->gender == 2)
                                                            <li id="gender_area" class="female_li"><img class="gender_icon" src="../../img/service/woman.svg">女性</li>
                                                        @endif
                                                    @else
                                                        <li id="gender_area"></li>
                                                    @endif
                                                    <li>
                                                        <div id="prefecture_area">
                                                            <img class="area_icon" src="{{ asset("img/service/map.svg") }}">
                                                            @if ($user->UserProfile)
                                                                {{ $user->UserProfile->prefecture }}
                                                            @endif
                                                        </div>
                                                    </li>
                                                </dl>
												<div class="profile_edit_btn_wrap">
                                                    @if ($user->email_verified_at)
                                                        <a class="profile_edit_btn">編集</a>
                                                    @else
                                                        <a class="profile_edit_btn cant_edit1">編集</a>
                                                    @endif
												</div>
											</div>
											<!-- edit mode -->
											<div class="person_info_wrap_inner person_info_wrap_inner_edit center_flex_ver">
												<div>
													<div class="edit_user_name_wrap">
                                                        <label for="user_name" class="edit_label">名前</label>
                                                        {!! Form::text('name', $user->name, ['id'=>'name', 'class'=>'mypage_input_txt', 'required'=>'required']) !!}
                                                        <span class="validate-error">
                                                            <br/>
                                                            <strong id="validate-name"></strong>
                                                        </span>
													</div>
													<div class="edit_gender_wrap">
														<label class="edit_label">性別</label>
														<div class="md-radio md-radio-inline">
														<input id="male" type="radio" value=1 class="gender_select" name="UserProfile[gender]">
														<label for="male">男性</label>
														</div>
														<div class="md-radio md-radio-inline">
														<input id="female" type="radio" value=2 class="gender_select" name="UserProfile[gender]">
														<label for="female">女性</label>
                                                        </div>
                                                        <span class="validate-error">
                                                            <br/>
                                                            <strong id="validate-gender"></strong>
                                                        </span>
													</div>
													<div class="edit_area_wrap">
                                                        <label class="edit_label">地域</label>
                                                        {!! Form::select('UserProfile[prefecture_id]', $prefectures, null, ['id'=>'prefecture', 'class'=>'select_area', 'required'=>'required']) !!}
                                                        <span class="validate-error">
                                                            <br/>
                                                            <strong id="validate-prefecture"></strong>
                                                        </span>
													</div>
													<div class="profile_edit_btn_wrap">
														<a class="profile_cancel_btn">キャンセル</a>
														<a id="save_names" class="profile_save_btn">保存</a>
													</div>
												</div>
											</div>
											<!-- efit mode -->
										</div>
                                    {!! Form::close() !!}
									<!-- <dl class="advisor_card_taglist mt15 txt_l">
										<li><a href="">自己分析</a></li>
										<li><a href="">企業研究</a></li>
										<li><a href="">ES添削</a></li>
										<li><a href="">面接対策</a></li>
										<li><a href="">企業紹介</a></li>
										<li><a href="">ウェブ面談可</a></li>
										<li><a href="">自己分析ならお任せください</a></li>
									</dl> -->
								</section>
								<section id="basic_profile_section" class="mypage_profile_section">
                                    {!! Form::model($user, ['route' => ['user.users.update', $user->id],
                                        'method' => 'put',
                                        'class' => 'profile_form'
                                    ]) !!}
										<h3>基本プロフィール
                                            @if ($user->email_verified_at)
                                                <a class="profile_edit_btn profile_edit_btn_sub">編集</a>
                                            @else
                                                <a class="profile_edit_btn profile_edit_btn_sub cant_edit2">編集</a>
                                            @endif
											<div class="profile_edit_btn_wrap profile_edit_btn_wrap_sub">
												<a class="profile_cancel_btn">キャンセル</a>
												<a id="save_universities" class="profile_save_btn">保存</a>
											</div>
										</h3>
										<dl class="profile_dl_static">
                                            <li><span>大学/学部/学科</span>
                                                <div id="university-label">
                                                    @if ($user->UserProfile)
                                                        {{ $user->UserProfile->university  }}
                                                    @endif
                                                </div>
                                            </li>
                                            <li><span>卒業年度</span>
                                                <div id="graduate_year-label">
                                                    @if ($user->UserProfile)
                                                        {{ $user->UserProfile->graduate_year }}
                                                    @endif
                                                </div>
                                            </li>
                                            <li><span>生年月日</span>
                                                <div id="birthday-label">
                                                    @if ($user->UserProfile)
                                                        {{ $user->UserProfile->birthday ? $user->UserProfile->birthday->format('Y年m月d日') : "" }}
                                                    @endif
                                                </div>
                                            </li>
										</dl>
										<dl class="profile_dl_edit">
											<li>
                                                <span>大学/学部/学科</span><br>
                                                {!! Form::text('university', $user->UserProfile ? $user->UserProfile->university : null, ['id'=>'university', 'class'=>'basic_profile_input_txt', 'required'=>'required']) !!}
                                                <span class="validate-error">
                                                    <br/>
                                                    <strong id="validate-university"></strong>
                                                </span>
                                            </li>
											<li>
												<span>卒業年度</span>
												<select name="UserProfile[graduate_year]" id="graduate_year" class="select_area">
													<option value="">-</option>
													<option value="2020">2020年度</option>
													<option value="2021">2021年度</option>
													<option value="2022">2022年度</option>
													<option value="2023">2023年度</option>
													<option value="2024">2024年度</option>
													<option value="2025">2025年度</option>
													<option value="2026">2026年度</option>
                                                </select>
                                                <span class="validate-error">
                                                    <br/>
                                                    <strong id="validate-graduate_year"></strong>
                                                </span>
											</li>
											<li>
												<span>生年月日</span><br>
												<select name="year" id="year">
													<option value="">-</option>
													<option value="1990">1990</option>
													<option value="1991">1991</option>
													<option value="1992">1992</option>
													<option value="1993">1993</option>
													<option value="1994">1994</option>
													<option value="1995">1995</option>
													<option value="1996">1996</option>
													<option value="1997">1997</option>
													<option value="1998">1998</option>
													<option value="1999">1999</option>
													<option value="2000">2000</option>
													<option value="2001">2001</option>
													<option value="2002">2002</option>
												</select>
												年
												<select name="month" id="month" class="ml15 ml5sp">
													<option value="">-</option>
													<option value="01">1</option>
													<option value="02">2</option>
													<option value="03">3</option>
													<option value="04">4</option>
													<option value="05">5</option>
													<option value="06">6</option>
													<option value="07">7</option>
													<option value="08">8</option>
													<option value="09">9</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
												</select>
												月
												<select name="day" id="day" class="ml15 ml5sp">
													<option value="">-</option>
													<option value="01">1</option>
													<option value="02">2</option>
													<option value="03">3</option>
													<option value="04">4</option>
													<option value="05">5</option>
													<option value="06">6</option>
													<option value="07">7</option>
													<option value="08">8</option>
													<option value="09">9</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
													<option value="13">13</option>
													<option value="14">14</option>
													<option value="15">15</option>
													<option value="16">16</option>
													<option value="17">17</option>
													<option value="18">18</option>
													<option value="19">19</option>
													<option value="20">20</option>
													<option value="21">21</option>
													<option value="22">22</option>
													<option value="23">23</option>
													<option value="24">24</option>
													<option value="25">25</option>
													<option value="26">26</option>
													<option value="27">27</option>
													<option value="28">28</option>
													<option value="29">29</option>
													<option value="30">30</option>
													<option value="31">31</option>
												</select>
                                                日
                                                <span class="validate-error">
                                                    <br/>
                                                    <strong id="validate-birthday"></strong>
                                                </span>
											</li>
										</dl>
                                    {!! Form::close() !!}
								</section>
								<section id="situation_profile_section" class="mypage_profile_section">
									{!! Form::model($user, ['route' => ['user.users.update', $user->id],
                                        'method' => 'put',
                                        'class' => 'profile_form'
                                    ]) !!}
										<h3>就活状況
                                            @if ($user->email_verified_at)
                                                <a class="profile_edit_btn profile_edit_btn_sub">編集</a>
                                            @else
                                                <a class="profile_edit_btn profile_edit_btn_sub cant_edit3">編集</a>
                                            @endif
											<div class="profile_edit_btn_wrap profile_edit_btn_wrap_sub">
												<a class="profile_cancel_btn">キャンセル</a>
												<a id="save_informal_decision" class="profile_save_btn">保存</a>
											</div>
										</h3>
										<dl class="profile_dl_static">
                                        <li><span>内定数</span>
                                            <div id="informal_decision-label">
                                                @if ($user->UserProfile)
                                                    {{ $user->UserProfile->informal_decision }}
                                                @endif
                                            </div>
                                        </li>
											<li>
												<span>選考状況</span>
                                                <p id="situation-label">
                                                    @if ($user->UserProfile)
                                                        {{ $user->UserProfile->situation }}
                                                    @endif
                                                </p>
											</li>
										</dl>
										<dl class="profile_dl_edit">
											<li>
												<span>内定数</span>
                                                <select name="informal_decision" value="{{ $user->UserProfile ? $user->UserProfile->informal_decision : null }}" id="informal_decision" class="ml15">
													<option value="">-</option>
													<option value="0">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10以上">10以上</option>
                                                </select>
                                                <span class="validate-error">
                                                    <br/>
                                                    <strong id="validate-informal_decision"></strong>
                                                </span>
											</li>
											<li>
                                                <span>選考状況</span>
                                                {!! Form::textarea('UserProfile[situation]', $user->UserProfile ? $user->UserProfile->situation : null, ['id'=>'situation', 'cols' => '140', 'rows' => '6', 'class'=>'basic_profile_input_txt', 'required'=>'required']) !!}
                                                <span class="validate-error">
                                                    <br/>
                                                    <strong id="validate-situation"></strong>
                                                </span>
                                            </li>
										</dl>
                                    {!! Form::close() !!}
								</section>
								<section id="company_preference_profile_section" class="mypage_profile_section">
                                    {!! Form::model($user, ['route' => ['user.users.update', $user->id],
                                        'method' => 'put',
                                        'class' => 'profile_form'
                                    ]) !!}
										<h3>会社選びに関して
                                            @if ($user->email_verified_at)
                                                <a class="profile_edit_btn profile_edit_btn_sub">編集</a>
                                            @else
                                                <a class="profile_edit_btn profile_edit_btn_sub cant_edit4">編集</a>
                                            @endif
											<div class="profile_edit_btn_wrap profile_edit_btn_wrap_sub">
												<a class="profile_cancel_btn">キャンセル</a>
												<a id="save_companies" class="profile_save_btn">保存</a>
											</div>
										</h3>
										<dl class="profile_dl_static">
											<li>
                                                <span>軸</span>
                                                <div id="axis-label">{{ $user->desire_axis }}</div>
                                                <span>その理由</span>
                                                <div id="axis-reason-label">
                                                    @if ($user->UserProfile)
                                                        {{ $user->UserProfile->axis_reason }}
                                                    @endif
                                                </div>
											</li>
                                            <li><span>業界</span>
                                                <div id="industry-label">{{ $user->desire_industry }}</div>
                                            </li>
                                            <li><span>職種</span>
                                                <div id="job-label">{{ $user->desire_job }}</div>
                                            </li>
                                            <li><span>希望勤務地</span>
                                                <div id="desire-prefecture-label">{{ $user->desire_prefecture }}</div>
                                            </li>
                                            <li><span>会社タイプ</span>
                                                <div id="company-type-label">{{ $user->desire_company_type }}</div>
                                            </li>
										</dl>
										<dl class="profile_dl_edit">
                                            <span class="validate-error">
                                                <br/>
                                                <strong id="validate-desire"></strong>
                                            </span>
											<li>
												<span>軸</span>
												<div>
                                                    @foreach ($axisList as $key => $axis)
                                                        <label class="company_preference_control company_preference_control--checkbox">
                                                            {{ $axis }}
                                                            {!! Form::checkbox('Desire[]', $key, null,  ['class' => 'desire axis-check form-check-input', 'data-label' => $axis]) !!}
                                                            <div class="company_preference_control__indicator"></div>
                                                        </label>
													@endforeach
												</div>
                                                <span>その理由</span>
                                                {!! Form::textarea('UserProfile[axis_reason]', $user->UserProfile ? $user->UserProfile->axis_reason : null, ['id'=>'axis_reason', 'cols' => '140', 'rows' => '6', 'class'=>'basic_profile_input_txt', 'required'=>'required']) !!}
                                                <span class="validate-error">
                                                    <br/>
                                                    <strong id="validate-axis_reason"></strong>
                                                </span>
                                            </li>
											<li>
												<span>業界</span>
												<div>
                                                    @foreach ($industryList as $key => $industry)
                                                        <label class="company_preference_control company_preference_control--checkbox">
                                                            {{ $industry }}
                                                            {!! Form::checkbox('Desire[]', $key, null,  ['class' => 'desire industry-check form-check-input', 'data-label' => $industry]) !!}
                                                            <div class="company_preference_control__indicator"></div>
                                                        </label>
                                                    @endforeach
												</div>
											</li>
											<li>
												<span>職種</span>
												<div>
                                                    @foreach ($jobList as $key => $job)
                                                        <label class="company_preference_control company_preference_control--checkbox">
                                                            {{ $job }}
                                                            {!! Form::checkbox('Desire[]', $key, null,  ['class' => 'desire job-check form-check-input', 'data-label' => $job]) !!}
                                                            <div class="company_preference_control__indicator"></div>
                                                        </label>
                                                    @endforeach
												</div>
											</li>
											<li>
												<span>希望勤務地</span>
												<div>
                                                    @foreach ($prefectureList as $key => $prefecture)
                                                        <label class="company_preference_control company_preference_control--checkbox">
                                                            {{ $prefecture }}
                                                            {!! Form::checkbox('Desire[]', $key, null,  ['class' => 'desire prefecture-check form-check-input', 'data-label' => $prefecture]) !!}
                                                            <div class="company_preference_control__indicator"></div>
                                                        </label>
                                                    @endforeach
												</div>
											</li>
											<li>
												<span>会社タイプ</span>
												<div>
                                                    @foreach ($companyTypeList as $key => $type)
                                                        <label class="company_preference_control company_preference_control--checkbox">
                                                            {{ $type }}
                                                            {!! Form::checkbox('Desire[]', $key, null,  ['class' => 'desire company-type-check form-check-input', 'data-label' => $type]) !!}
                                                            <div class="company_preference_control__indicator"></div>
                                                        </label>
                                                    @endforeach
												</div>
											</li>
										</dl>
									{!! Form::close() !!}
								</section>
							</section>
						</section>
					</div>
					<div class="mypage_col_r">
					<section class="reserved_section">
							<h2>予約中の面談</h2>
							<section class="advisor_profile_section_body">
                                @if (!count($meetingRequests))
                                    <span class="no_reserved">予約中の面談はありません</span>
                                @else
                                    @foreach ($meetingRequests as $request)
                                        <div class="reserved_block">
                                            <span class="reserved_user_icon"><img src="{{ $request->Adviser->AdviserProfile->photo_url ? $request->Adviser->AdviserProfile->photo_url : asset('img/service/default_usericon.jpg') }}"></span>
                                            <a href="{{ route('advisers.show', [
                                                'id' => $request->Adviser->id
                                            ]) }}" class="reserved_advisor_link">
                                                <span class="reserved_user_name">{{ $request->Adviser->name }}</span>
                                            </a>
                                            <span>さん</span>
                                            <dl>
                                                <li><span>日時</span>{{ $request->is_no_schedule ?  "未定" : $request->date->format('Y年m月d日 H:i') }}</li>
                                                <li><span>形式</span>{{ $request->type_label }}</li>
                                                <li>
                                                    <span>場所</span>
                                                    <p class="lh15">{{ $request->Adviser->AdviserProfile->meeting_place }}</p>
                                                    <iframe src="https://maps.google.co.jp/maps?output=embed&q={{ $request->Adviser->AdviserProfile->meeting_place }}" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                </li>
                                                <li>
                                                    <span>メールアドレス</span>
                                                    <a href="mailto:{{ $request->Adviser->email }}">{{ $request->Adviser->email }}</a>
                                                </li>
                                            </dl>
                                            <span
                                            @if ($request->status == 1)
                                                class="approval_status approval_pending"
                                            @elseif ($request->status == 2)
                                                class="approval_status approval_accepted"
                                            @else
                                                class="approval_status approval_rejected"
                                            @endif
                                            >{{ $request->status_label }}</span>
                                        </div>
                                    @endforeach
                                @endif
							</section>
                        </section>
                        <section class="reserved_section detail_setting_section">
                            <h2>詳細設定/プライバシー</h2>
                            <div class="detail_setting_section_body_wrap">
                                <section id="detail_setting_section" class="detail_setting_section_body">
                                    <form class="profile_form">
                                        <h3>登録情報
                                            <a class="profile_edit_btn profile_edit_btn_sub">編集</a>
                                            <div class="profile_edit_btn_wrap profile_edit_btn_wrap_sub">
                                                <a class="profile_cancel_btn">キャンセル</a>
                                                <a id="save_email" class="profile_save_btn">保存</a>
                                            </div>
                                        </h3>
                                        <dl class="profile_dl_static">
                                            <!-- <li><span>内定数</span>3</li> -->
                                            <li>
                                                <span>登録メールアドレス</span>
                                                <p id="email-label">{{ $user->email }}</p>
                                            </li>
                                        </dl>
                                        <dl class="profile_dl_edit">
                                            <li>
                                                <span>新しいメールアドレス</span>
                                                {!! Form::email('email', $user->email, ['id'=>'input_email', 'class'=>'mypage_input_txt', 'required'=>'required']) !!}
                                                <span class="validate-error">
                                                    <br/>
                                                    <strong id="validate-email"></strong>
                                                </span>
                                            </li>
                                        </dl>
                                    </form>
                                </section>

                                <section id="password_setting_section" class="detail_setting_section_body">
                                    <form class="profile_form">
                                        <h3>パスワード
                                            <a class="profile_edit_btn profile_edit_btn_sub">編集</a>
                                            <div class="profile_edit_btn_wrap profile_edit_btn_wrap_sub">
                                                <a class="profile_cancel_btn">キャンセル</a>
                                                <a id="save_password" class="profile_save_btn">保存</a>
                                            </div>
                                        </h3>
                                        <dl class="profile_dl_static">
                                            <!-- <li><span>内定数</span>3</li> -->
                                            <li>
                                                <span>現在のパスワード</span>
                                                <p>*******</p>
                                            </li>
                                        </dl>
                                        <dl class="profile_dl_edit">
                                            <li>
                                                <span>新しいパスワード</span>
                                                <input name="password" type="password" class="contact_input" id="input_password" placeholder="" required>
                                                <span class="validate-error">
                                                    <br/>
                                                    <strong id="validate-password"></strong>
                                                </span>
                                            </li>
                                            <li>
                                                <span>新しいパスワード(確認)</span>
                                                <input name="password_confirmation" type="password" class="contact_input" id="input_password_confirm" placeholder="" required>
                                                <span class="validate-error">
                                                    <br/>
                                                    <strong id="validate-password_confirmation"></strong>
                                                </span>
                                            </li>
                                        </dl>
                                    </form>
                                </section>

                            </div>
                        </section>
                        <button class="logout" href="{{ route('user.logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <a href="{{ route('user.logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                ログアウト
                            </a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </button>
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
@endsection

@section('script')
    <script src="{{ asset("js/user_edit.js") }}"></script>
@endsection
