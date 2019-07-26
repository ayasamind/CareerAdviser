@extends('layouts.user')

@section('content')
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found center_flex">
				<div class="inner_404 container">
					<h1 class="page-title">ただいまメンテナンス中です</h1>
					<div class="content_404">
						<p class="msg_url">恐れいりますが時間をおいてお試しください</p>
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
