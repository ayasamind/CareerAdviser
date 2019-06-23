@extends('layouts.user')

@section('content')
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			{{-- <div class="landscape_notice">
				<p class="landscape_notice_txt">
					このウェブサイトは横画面には対応しておりません。<br>スマートフォンの向きを縦にしてご閲覧ください。
				</p>
			</div> --}}
			<section id="confirm" class="container_service pt60">
				<div class="breadcrumb_wrap">
					<div class="breadcrumb_inner center_flex_ver">
						<span class="breadcrumb_arrow"><img src="{{ asset('img/svg/arrow2_l.svg') }}" alt="breadcrumb_arrow"></span>
                        <a class="breadcrumb_item" href="{{ route('advisers.show', [
                            'id' => $adviser->id
                        ]) }}">戻る</a>
					</div>
				</div>
				<div class="row confirm_main_row">
					<div class="confirm_main_row_inner">
						<h2>送信内容を確認</h2>
						<div class="confirm_general_info">
							<h3 class="confirm_ttl">アドバイザー情報</h3>
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
								</div>
							</div>
							<h3 class="confirm_ttl">日時</h3>
                            <p class="confirm_date">{{ $date }}</p>
							{{-- <h3 class="confirm_ttl">場所</h3>
							<p class="confirm_date">〒810-0001 福岡県福岡市中央区 天神3-15-1 にちりんビル3F</p> --}}
						</div>
						<section class="profile_section">
							<section class="mypage_section_body">
                                    <section id="situation_profile_section" class="mypage_profile_section">
                                            {!! Form::model($user, ['route' => ['user.users.update', $user->id],
                                                'method' => 'put',
                                                'class' => 'profile_form'
                                            ]) !!}
                                            {{ csrf_field() }}
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
                                            {!! Form::model(null, ['route' => ['user.save_request'],
                                                'method' => 'post',
                                                'class' => 'profile_form'
                                            ]) !!}
                                                <input name="date" type="hidden" value="{{ $date }}">
                                                <input name="adviser_id" type="hidden" value="{{ $adviser->id }}">
                                                <input name="place" type="hidden" value="場所">
                                                <div class="web_or_ftf_wrap">
                                                    <label class="web_or_ftf_label">希望の方式を選択してください</label><span class="web_or_ftf_required">選択必須</span><br>
                                                    <!-- web面談のみ可能な時間帯の場合、非表示 ここから -->
                                                    @if ($online != \App\AdviserSchedule::ONLINE_FLAG_TRUE)
                                                        <div class="md-radio md-radio-inline">
                                                            <input id="normal" type="radio" name="type" value="{{ \App\MeetingRequest::MEETING_TYPE_NORMAL }}">
                                                            <label for="normal">対面</label>
                                                        </div>
                                                    @endif
                                                    <!-- web面談のみ可能な時間帯の場合、非表示 ここまで-->
                                                    <div class="md-radio md-radio-inline">
                                                        <input id="online" type="radio" name="type" value="{{ \App\MeetingRequest::MEETING_TYPE_ONLINE }}" checked>
                                                        <label for="online">Web</label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="confirm_submit_btn">面談依頼を送信</button>
                                            {!! Form::close() !!}
                                </section>
							</section>
						</section>
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
@endsection

@section('script')
    <script src="{{ asset("js/user_edit.js") }}"></script>
@endsection
