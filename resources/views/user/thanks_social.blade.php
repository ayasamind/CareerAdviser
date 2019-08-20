@extends('layouts.user')

@section('content')
<section id="login_main_wrap" class="main_wrap">
        <div class="section_ttl_wrap login_ttl_wrap mb30 mb50tb">
            <h2 class="section_ttl login_ttl fs23 fs18sp fw400">
                会員登録が完了しました
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
                <span class="fs16 fw700 block txt_c center_block mt50"><a class="txt_link" href="{{ route('user.mypage') }}">マイページ</a>からユーザー情報を編集してください。</span>
                </div>
            </div>
        </section>
    </section>
@endsection
