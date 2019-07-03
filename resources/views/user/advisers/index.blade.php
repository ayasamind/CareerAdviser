@extends('layouts.user')

@section('content')
@if (session('resent'))
    <div class="alert alert-success" role="alert">
        認証メールを再送信しました！
    </div>
@endif
@if ($user)
    @if (!$user->email_verified_at)
        <div class="alert alert-success" role="alert">
            Eメールによる認証が完了していません。
            もし認証用のメールを受け取っていない場合、 <a href="{{ route('verification.resend') }}">こちらのリンク</a>をクリックして、認証メールを受け取ってください。
        </div>
    @endif
@endif
<div id="primary" class="content-area">
		<main id="main" class="site-main home_main">
			{{-- <div class="landscape_notice">
				<p class="landscape_notice_txt">
					このウェブサイトは横画面には対応しておりません。<br>スマートフォンの向きを縦にしてご閲覧ください。
				</p>
			</div> --}}

			<section id="home" class="sections">
				<div class="tag_header">
					<h2 class="container_service lh21">タグで探す</h2>
					<dl class="advisor_card_taglist_tag container_service">
                        @foreach ($tags as $tag)
                    <li><a href="{{ route('advisers.index', [
                        'tag' => $tag->id
                    ]) }}">{{ $tag->name }}</a></li>
                        @endforeach
					</dl>
				</div>
				<div class="container_service home_inner">
                    <div class="contents row advisor_row">
                        @foreach ($advisers as $adviser)
                            <div
                                @if ($adviser->AdviserProfile->gender == 1)
                                    class="box4 box1_sp txt_c advisor_box advisor_card advisor_card05 card_male"
                                @else
                                    class="box4 box1_sp txt_c advisor_box advisor_card advisor_card05 card_female"
                                @endif
                            >
                                <div class="advisor_card_img_wrap">
                                    <img src="{{ $adviser->AdviserProfile->photo_url }}">
                                </div>
                                <div class="advisor_card_contents">
                                    <p class="advisor_card_message sefif fs14vw lh15">
                                        {{ $adviser->AdviserProfile->comment }}
                                    </p>
                                    <div class="advisor_card_inner">
                                        <p class="fw700 ls15">
                                            <span class="advisor_card_name">{{ $adviser->name }}</span>
                                            {{-- <span class="advisor_card_name_en">Momoko Yamaguchi</span> --}}
                                        </p>
                                        <dl class="advisor_card_taglist mt15 txt_l">
                                            @foreach ($adviser->Tag as $tag)
                                                <li><a href="{{ route('advisers.index', [
                                                    'tag' => $tag->id
                                                ]) }}">{{ $tag->name }}</a></li>
                                            @endforeach
                                            <!-- <li><a href="">埼玉出身</a></li>
                                            <li><a href="">ディズニー大好き</a></li> -->
                                            <!-- <li><a href="">今の自分を変えたい人お待ちしてます</a></li> -->
                                        </dl>
                                        <a href="{{ route('advisers.show', [
                                            'id' => $adviser->id
                                        ])  }}" class="advisor_card_more_btn fw700 fs17 mt10">
                                            <i class="fas fa-user-circle fs28"></i>
                                            <span>プロフィールをみる</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">アドバイザー一覧</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>名前</th>
                            <th>登録日</th>
                            <th></th>
                        </tr>
                    @foreach ($advisers as $adviser)
                        <tr>
                            <td>{{ $adviser->name }}</td>
                            <td>{{ $adviser->created_at }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('advisers.show', [
                                    'adviser' => $adviser->id
                                ]) }}">詳細</a>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                    {{ $advisers->links() }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
