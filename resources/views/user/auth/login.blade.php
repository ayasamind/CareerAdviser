@extends('layouts.user')

@section('content')
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			{{-- <div class="landscape_notice">
				<p class="landscape_notice_txt">
					このウェブサイトは横画面には対応しておりません。<br>スマートフォンの向きを縦にしてご閲覧ください。
				</p>
			</div> --}}
			<section id="login_main_wrap" class="main_wrap">
				<div class="section_ttl_wrap login_ttl_wrap mb30 mb50tb">
					<h2 class="section_ttl login_ttl fs23 fs18sp fw400">
						キャリアアドバイザー .comにログイン
					</h2>
				</div>
				<!-- セクション開始 -->
				<section class="login_section container_lp_sub">
					<div class="section_inner login_inner">
						<div class="login_content">
							<div class="txt_c">
							<a href="/" class="block width30 center_block width50sp mt20sp">
								<img src="{{ asset('img/logo_ver.svg') }}" alt="キャリアアドバイザー.com" class="width100">
							</a>
							</div>
							<div class="sns_login_wrap_outer">
								<div class="sns_login_wrap">
									<a href="#" class="fb_login fs15 fw700">
										<i class="fab fa-facebook-square fs26 mr40"></i>facebookでログイン
									</a>
									<a href="#" class="tw_login fs15 fw700">
										<i class="fab fa-twitter fs26 mr40"></i>Twitterでログイン
									</a>
								</div>
							</div>
							<span class="fs14 block txt_c center_block login_or ttl_bdr_ccc">または</span>
							<!-- フォーム -->
							<form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
								<!-- form block -->
								<div class="contact_block">
									<!-- <div class="contact_label_wrap">
										<label class="contact_label" for="input_email">メールアドレス</label>
									</div> -->
									<input name="email" type="email" class="contact_input" id="input_email" placeholder="メールアドレス" required>
                                    @if ($errors->has('email'))
                                        {{-- <span class="invalid-feedback" role="alert"> --}}
                                            <strong class="validate-error">{{ $errors->first('email') }}</strong>
                                        {{-- </span> --}}
                                    @endif
                                </div>
								<!-- form block -->

								<!-- form block -->
								<div class="contact_block">
									<!-- <div class="contact_label_wrap">
										<label class="contact_label" for="input_password">パスワード</label>
									</div> -->
									<input name="password" type="password" class="contact_input" id="input_password" placeholder="パスワード" required>
                                    @if ($errors->has('password'))
                                        {{-- <span class="invalid-feedback" role="alert"> --}}
                                            <strong class="validate-error">{{ $errors->first('password') }}</strong>
                                        {{-- </span> --}}
                                    @endif
                                </div>
								<!-- form block -->
								<!-- remember-me -->
								<!-- <div class="contact_block txt_c fs16">
									<input type="checkbox" name="remember" value="1"><span class="fs14 ml5">ログイン状態を保持</span>
								</div> -->
								<!-- remember-me -->
								<div class="login_btn_wrap">
									<button type="submit" class="login_btn">メールアドレスでログイン</button>
								</div>
								<div class="txt_c fs13 fs12sp mt10">
									<p>アカウントをお持ちではありませんか？
										<a href="{{ route('register') }}" class="fs14 fs13sp txt_tc underline">新規登録</a>
									</p>
								</div>
							</form>
						</div>
					</div>
					<div class="txt_c mt20">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="fs13 fs12sp txt_888 fw700 underline">パスワードを忘れた場合</a>
                        @endif

					</div>
				</section>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
@endsection
