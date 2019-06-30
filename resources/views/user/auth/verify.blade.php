@extends('layouts.user')

@section('content')
@if (session('resent'))
    <div class="alert alert-success" role="alert">
        認証メールを再送信しました！
    </div>
@endif
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
                        Eメールによる認証が必要です
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
							<span class="fs16 fw700 block center_block mt50">
                                このページを閲覧するには、Eメールによる認証が必要です。
                                もし認証用のメールを受け取っていない場合、 <a style="color:cornflowerblue;" href="{{ route('verification.resend') }}">こちらのリンク</a>をクリックして、認証メールを受け取ってください。
                            </span>
						</div>
					</div>
				</section>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
@endsection
