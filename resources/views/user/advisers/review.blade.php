@extends('layouts.user')

@section('content')
    <div id="primary">
        <main id="main">
            <section id="mypage" class="container_service">
                {!! Form::model($meetingRequest, ['route' => ['user.save_review', $meetingRequest->id],
                    'method' => 'post',
                    'class' => 'row center_flex_ver'
                ]) !!}
                    <div class="row mypage_main_row review_row">
                        <section class="profile_section">
                            <h2>レビューを書く</h2>
                            <section class="mypage_section_body">
                                <section id="main_profile_section">
                                    <div class="review_form_wrap">
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
                                            {!! Form::textarea('review', $meetingRequest->review, ['id'=>'review_textarea', 'class'=>'mypage_input_txt', 'required'=>'required', 'placeholder' => '感想を記入してください', 'row' => 5]) !!}
                                        </div>
                                    </div>
                                </section>
                            </section>
                        </section>
                    </div>
                <button type="submit" class="review_btn">レビューを登録</button>
                {!! Form::close() !!}
            </section>
            <section id="advisor_profile" class="container_service">
                <div class="row advisor_profile_main_row">
                    <div class="review_row">
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
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection
