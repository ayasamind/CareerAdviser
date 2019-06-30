@extends('layouts.user')

@section('content')
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			{{-- <div class="landscape_notice">
				<p class="landscape_notice_txt">
					このウェブサイトは横画面には対応しておりません。<br>スマートフォンの向きを縦にしてご閲覧ください。
				</p>
			</div> --}}
			<section id="done" class="container_service pt80 pb40">
				<div class="row done_main_row">
					<div class="done_main_row_inner">
						<h2>面談への応募が完了しました</h2>
                        <!-- 面談拒否ありのアドバイザーに応募したときのみ表示　ここから -->
                        @if ($meetingRequest->Adviser->AdviserProfile->deny_interview)
                            <p class="reject_alert">
                                応募したアドバイザーは、面談依頼を拒否する場合があります。アドバイザーからの承認をお待ちください。応募した日の翌日23:59までに承認されなかった場合、面談は自動的にキャンセルされます。
                            </p>
                        @endif
						<!-- 面談拒否ありのアドバイザーに応募したときのみ表示　ここまで -->
						<div class="done_general_info">
							<h3>アドバイザー</h3>
                            <p>{{ $meetingRequest->adviser->name }}</p>
							<h3 class="mt20">日時</h3>
                            <p>{{ $meetingRequest->date->format('Y年m月d日 H:i') }}</p>
							<h3 class="mt20">場所</h3>
							<p>〒810-0001 福岡県福岡市中央区 天神3-15-1 にちりんビル3F</p>
							<span class="mt20 fw700">*無断キャンセルは絶対にお辞めください。アドバイザーの方に多大な迷惑がかかります。</span>
						</div>
                        <p class="done_txt">日程などの詳細は、<a href="{{ route('user.mypage') }}">マイページ</a>からいつでも確認できます。</p>
                        <a href="{{ route('advisers.index') }}" class="back_to_top_btn">トップへ戻る</a>
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
@endsection
