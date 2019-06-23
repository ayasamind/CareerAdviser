@extends('layouts.user')

@section('content')
<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="landscape_notice">
				<p class="landscape_notice_txt">
					このウェブサイトは横画面には対応しておりません。<br>スマートフォンの向きを縦にしてご閲覧ください。
				</p>
			</div>
			<section id="login_main_wrap" class="main_wrap">
				<div class="section_ttl_wrap login_ttl_wrap mb30 mb50tb">
					<h2 class="section_ttl login_ttl fs23 fs18sp fw400">
						パスワードを再設定
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
							<!-- <div class="sns_login_wrap_outer">
								<div class="sns_login_wrap">
									<a href="#" class="fb_login fs15 fw700">
										<i class="fab fa-facebook-square fs26 mr40"></i>facebookでログイン
									</a>
									<a href="#" class="tw_login fs15 fw700">
										<i class="fab fa-twitter fs26 mr40"></i>Twitterでログイン
									</a>
								</div>
							</div> -->
							<span class="fs16 fw700 block txt_c center_block mt50">登録時に使用したメールアドレスを入力してください。パスワード再設定用のリンクが送信されます。</span>
							<!-- フォーム -->
                            <form method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}
								<!-- form block -->
								<div class="contact_block">
									<!-- <div class="contact_label_wrap">
										<label class="contact_label" for="input_email">メールアドレス</label>
									</div> -->
									<input id="email" type="email" class="contact_input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
								</div>
								<!-- form block -->
								<div class="login_btn_wrap">
									<button type="submit" class="login_btn">再設定用メールを送信</button>
								</div>
								<!-- <div class="txt_c fs13 fs12sp mt10">
									<p>アカウントをお持ちではありませんか？
										<a href="/reset_password" class="fs14 fs13sp txt_tc underline">新規登録</a>
									</p>
								</div> -->
							</form>
						</div>
					</div>
					<div class="txt_c mt20">
                        <a href="{{ route("login") }}" class="fs13 fs12sp txt_888 fw700 underline">ログインページに戻る</a>
					</div>
				</section>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
@endsection
