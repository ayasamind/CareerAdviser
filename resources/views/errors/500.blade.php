@extends('layouts.user')

@section('content')
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found center_flex">
				<div class="inner_404 container">
					<h1 class="page-title">内部的なエラーが発生しました</h1>
					<div class="content_404">
						<p class="msg_404 ls_1">500 Error</p>
						<p class="msg_url">お手数ですがお問い合わせフォームからシステム管理者に連絡してください。</p>
						<!-- <p class="error_msg"></p> -->
						<p class="btn">
                            <a href="{{ route('top') }}">
								<i class="fas fa-caret-right"></i>
								<span>トップへ戻る</span>
							</a>
						</p>
					</div>
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
@endsection
