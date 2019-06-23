@extends('layouts.user')

@section('content')

<div id="primary" class="content-area">
		<main id="main" class="site-main">
			{{-- <div class="landscape_notice">
				<p class="landscape_notice_txt">
					このウェブサイトは横画面には対応しておりません。<br>スマートフォンの向きを縦にしてご閲覧ください。
				</p>
			</div> --}}
			<section id="signup_main_wrap" class="main_wrap">
				<div class="section_ttl_wrap signup_ttl_wrap mb30 mb50tb">
					<h2 class="section_ttl signup_ttl fs23 fs18sp fw400">
						キャリアアドバイザー .comに登録
					</h2>
				</div>
				<!-- セクション開始 -->
				<section class="signup_section container_lp_sub">
					<div class="section_inner signup_inner">
						<div class="signup_content">
							<div class="txt_c">
							<a href="/" class="block width30 center_block width50sp mt20sp">
								<img src="{{ asset('img/logo_ver.svg') }}" alt="キャリアアドバイザー.com" class="width100">
							</a>
							</div>
							<div class="sns_signup_wrap_outer">
								<div class="sns_signup_wrap">
									<button type="button" href="#" class="fb_login fs15 fw700 disable" disabled>
										<i class="fab fa-facebook-square fs26 mr40"></i>facebookで新規登録
                                    </button>
									<button type="button" href="#" class="tw_login fs15 fw700 disable" disabled>
										<i class="fab fa-twitter fs26 mr40"></i>Twitterで新規登録
                                    </button>
								</div>
							</div>
							<span class="fs14 block txt_c center_block signup_or ttl_bdr_ccc">または</span>
							<!-- フォーム -->
							<form method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <!-- form block -->
								<div class="contact_block">
									<div class="contact_label_wrap">
										<label class="contact_label"  for="input_name">お名前(ニックネーム不可)</label><span class="required">※必須</span>
									</div>
									<input required="required" value="{{ old('name') }}" name="name" type="text" class="contact_input" id="input_name" placeholder="">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
								<!-- form block -->

								<!-- form block -->
									<!-- <label class="edit_label">性別</label>
									<div class="md-radio md-radio-inline">
									<input id="male" type="radio" name="user_gender" checked>
									<label for="male">男性</label>
									</div>
									<div class="md-radio md-radio-inline">
									<input id="female" type="radio" name="user_gender">
									<label for="female">女性</label>
									</div> -->

								<!-- form block -->

								<!-- form block -->
								<div class="contact_block">
									<div class="contact_label_wrap">
										<label class="contact_label" for="input_email">メールアドレス</label><span class="required">※必須</span>
									</div>
									<input name="email" value="{{ old('email') }}" type="email" class="contact_input" id="input_email" placeholder="" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
								<!-- form block -->

								<!-- form block -->
								<div class="contact_block">
									<div class="contact_label_wrap">
										<label class="contact_label" for="input_password">パスワード</label><span class="required">※必須</span>
									</div>
									<input name="password" type="password" class="contact_input" id="input_password" placeholder="" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
								<!-- form block -->

								<!-- form block -->
								<div class="contact_block">
									<div class="contact_label_wrap">
										<label class="contact_label" for="input_password_confirm">パスワード(確認)</label><span class="required">※必須</span>
									</div>
									<input name="password_confirmation" type="password" class="contact_input" id="input_password_confirm" placeholder="" required>
								</div>
								<!-- form block -->

								<!-- remember-me -->
								<!-- <div class="contact_block txt_c fs16">
									<input type="checkbox" name="remember" value="1"><span class="fs14 ml5">ログイン状態を保持</span>
								</div> -->
								<!-- remember-me -->
								<div class="signup_btn_wrap">
									<button type="submit" class="signup_btn">メールアドレスで新規登録</button>
								</div>
								<div class="txt_c fs13 fs12sp mt10">
									<p>アカウントをすでにお持ちの方
                                        <a href="{{ route('login') }}" class="fs14 fs13sp txt_tc underline">ログイン</a>
									</p>
								</div>
							</form>
						</div>
					</div>
					<!-- <div class="txt_c mt20">
						<a href="/reset_password" class="fs13 fs12sp txt_888 fw700 underline">パスワードを忘れた場合</a>
					</div> -->
				</section>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
@endsection
