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
							<table class="operating_company_table">
							    <tbody>
								    <tr>
								      <th>社名</th>
								      <td>株式会社えらるどヒューマン</td>
								    </tr>
								    <tr>
								      <th>代表者</th>
								      <td>吉瀬 機一郎</td>
								    </tr>
								    <tr>
								      <th>設立</th>
								      <td>2019年11月22日</td>
								    </tr>
								    <tr>
								      <th>所在地</th>
								      <td>東京都北区豊島1丁目30番3号</td>
								    </tr>
								    <tr>
								      <th>事業内容</th>
								      <td>
										<ul>
											<li>キャリアドバイザー.comの運営</li>
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
