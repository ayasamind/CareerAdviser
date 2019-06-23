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
						新しいパスワードを入力
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
							<span class="fs16 fw700 block txt_c center_block mt50">新しいパスワードを入力してください。</span>
							<!-- フォーム -->
                            <form method="POST" class="contact_form" action="{{ route('password.update') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="token" value="{{ $token }}">
                                <!-- form block -->
                                <div class="contact_block">
                                    <input id="email" type="email" class="contact_input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="メールアドレス" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
								<div class="contact_block">
                                    <input id="password" type="password" class="contact_input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="パスワード" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
								<!-- form block -->
								<div class="contact_block">
                                    <input id="password-confirmation" type="password" class="contact_input" name="password_confirmation" placeholder="パスワード(確認)" required>
								</div>
								<!-- form block -->
								<div class="login_btn_wrap">
									<button type="" class="login_btn">パスワードを更新してログイン</button>
								</div>
							</form>
						</div>
					</div>
				</section>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
@endsection
