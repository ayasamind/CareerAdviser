@extends('layouts.user')

@section('content')

    <div id="primary" class="content-area">
		<main id="main" class="site-main">
			{{-- <div class="landscape_notice">
				<p class="landscape_notice_txt">
					このウェブサイトは横画面には対応しておりません。<br>スマートフォンの向きを縦にしてご閲覧ください。
				</p>
			</div> --}}
			<section id="company_main_wrap" class="main_wrap">
				<div class="section_ttl_wrap company_ttl_wrap mb30">
					<h2 class="section_ttl company_ttl fs26">
						運営会社
					</h2>
				</div>
				<!-- セクション開始 -->
				<section class="company_section container_lp_sub">
					<div class="section_inner company_inner">
						<div class="company_content">
							<img src="{{ asset('img/rashisa_logo.svg') }}" alt="株式会社RASHISA" class="block width30 center_block mb20 width50sp mt20sp">
							<table class="operating_company_table">
							    <tbody>
								    <tr>
								      <th>社名</th>
								      <td>株式会社RASHISA</td>
								    </tr>
								    <tr>
								      <th>代表者</th>
								      <td>岡本翔</td>
								    </tr>
								    <tr>
								      <th>設立</th>
								      <td>2017年1月23日</td>
								    </tr>
								    <tr>
								      <th>所在地</th>
								      <td>福岡県福岡市中央区天神3-15-1 にちりんビル3F</td>
								    </tr>
								    <tr>
								      <th>事業内容</th>
								      <td>
										<ul>
											<li>⑴キャリアドバイザー.comの運営</li>
											<li>⑵ジャパンキャリアフェスティバルの運営</li>
										</ul>
								      </td>
								    </tr>
							  	</tbody>
							</table>
						</div>
					</div>
				</section>
			</section>
		</main><!-- #main -->
    </div><!-- #primary -->
@endsection
