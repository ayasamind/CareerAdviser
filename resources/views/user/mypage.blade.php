@extends('layouts.user')

@section('content')
<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="landscape_notice">
				<p class="landscape_notice_txt">
					このウェブサイトは横画面には対応しておりません。<br>スマートフォンの向きを縦にしてご閲覧ください。
				</p>
			</div>
			<section id="mypage" class="container_service">
				<div class="row mypage_main_row">
					<div class="mypage_col_l">
						<section class="profile_section">
							<h2>プロフィール</h2>
							<section class="mypage_section_body">
								<section id="main_profile_section">
									<form class="row center_flex_ver person_icon_row person_male profile_form">
										<div class="person_icon_wrap">
											<img src="{{ asset('img/service/default_usericon.jpg') }}">
											<div class="uploadButton">
												ファイルを選択
												<input type="file" onchange="uv.style.display='inline-block'; uv.value = this.value;" />
												<input type="text" id="uv" class="uploadValue" disabled />
											</div>
										</div>
										<div class="person_info_wrap">
											<div class="person_info_wrap_inner center_flex_ver person_info_wrap_inner_static">
												<h3 class="ls15">
                                                    <span class="person_name">{{ $user->name }}</span>
												</h3>
												<dl>
													<li class="male_li"><img class="gender_icon" src="../../img/service/man.svg">男性</li>
													<li class="female_li"><img class="gender_icon" src="../../img/service/woman.svg">女性</li>
													<li><img class="area_icon" src="../../img/service/map.svg">東京</li>
												</dl>
												<div class="profile_edit_btn_wrap">
													{{-- <a class="profile_edit_btn">編集</a> --}}
												</div>
											</div>
											<!-- efit mode -->
											<div class="person_info_wrap_inner person_info_wrap_inner_edit center_flex_ver">
												<div>
													<div class="edit_user_name_wrap">
														<label for="user_name" class="edit_label">名前</label>
														<input name="user_name" type="text" value="山田 孝之" id="user_name" class="mypage_input_txt">
													</div>
													<div class="edit_gender_wrap">
														<label class="edit_label">性別</label>
														<div class="md-radio md-radio-inline">
														<input id="male" type="radio" name="user_gender" checked>
														<label for="male">男性</label>
														</div>
														<div class="md-radio md-radio-inline">
														<input id="female" type="radio" name="user_gender">
														<label for="female">女性</label>
														</div>
													</div>
													<div class="edit_area_wrap">
														<label class="edit_label">地域</label>
														<select class="select_area">
															<option value="北海道">北海道</option>
															<option value="青森県">青森県</option>
															<option value="岩手県">岩手県</option>
															<option value="宮城県">宮城県</option>
															<option value="秋田県">秋田県</option>
															<option value="山形県">山形県</option>
															<option value="福島県">福島県</option>
															<option value="茨城県">茨城県</option>
															<option value="栃木県">栃木県</option>
															<option value="群馬県">群馬県</option>
															<option value="埼玉県">埼玉県</option>
															<option value="千葉県">千葉県</option>
															<option value="東京都" selected>東京都</option>
															<option value="神奈川県">神奈川県</option>
															<option value="新潟県">新潟県</option>
															<option value="富山県">富山県</option>
															<option value="石川県">石川県</option>
															<option value="福井県">福井県</option>
															<option value="山梨県">山梨県</option>
															<option value="長野県">長野県</option>
															<option value="岐阜県">岐阜県</option>
															<option value="静岡県">静岡県</option>
															<option value="愛知県">愛知県</option>
															<option value="三重県">三重県</option>
															<option value="滋賀県">滋賀県</option>
															<option value="京都府">京都府</option>
															<option value="大阪府">大阪府</option>
															<option value="兵庫県">兵庫県</option>
															<option value="奈良県">奈良県</option>
															<option value="和歌山県">和歌山県</option>
															<option value="鳥取県">鳥取県</option>
															<option value="島根県">島根県</option>
															<option value="岡山県">岡山県</option>
															<option value="広島県">広島県</option>
															<option value="山口県">山口県</option>
															<option value="徳島県">徳島県</option>
															<option value="香川県">香川県</option>
															<option value="愛媛県">愛媛県</option>
															<option value="高知県">高知県</option>
															<option value="福岡県">福岡県</option>
															<option value="佐賀県">佐賀県</option>
															<option value="長崎県">長崎県</option>
															<option value="熊本県">熊本県</option>
															<option value="大分県">大分県</option>
															<option value="宮崎県">宮崎県</option>
															<option value="鹿児島県">鹿児島県</option>
															<option value="沖縄県">沖縄県</option>
														</select>
													</div>
													<div class="profile_edit_btn_wrap">
														<a class="profile_cancel_btn">キャンセル</a>
														<a class="profile_save_btn">保存</a>
													</div>
												</div>
											</div>
											<!-- efit mode -->
										</div>
									</form>
									<!-- <dl class="advisor_card_taglist mt15 txt_l">
										<li><a href="">自己分析</a></li>
										<li><a href="">企業研究</a></li>
										<li><a href="">ES添削</a></li>
										<li><a href="">面接対策</a></li>
										<li><a href="">企業紹介</a></li>
										<li><a href="">ウェブ面談可</a></li>
										<li><a href="">自己分析ならお任せください</a></li>
									</dl> -->
								</section>
								<section id="basic_profile_section" class="mypage_profile_section">
									<form class="profile_form">
										<h3>基本プロフィール
											{{-- <a class="profile_edit_btn profile_edit_btn_sub">編集</a> --}}
											<div class="profile_edit_btn_wrap profile_edit_btn_wrap_sub">
												<a class="profile_cancel_btn">キャンセル</a>
												<a class="profile_save_btn">保存</a>
											</div>
										</h3>
										<dl class="profile_dl_static">
											<li><span>大学/学部/学科</span>〇〇大学 〇〇学部 〇〇学科</li>
											<li><span>卒業年度</span>2020年度</li>
											<li><span>生年月日</span>1997年 5月10日</li>
										</dl>
										<dl class="profile_dl_edit">
											<li>
												<span>大学/学部/学科</span><br>
												<input name="university" type="text" value="〇〇" id="university" class="basic_profile_input_txt" required>
												大学
												<input name="faculty" type="text" value="〇〇" id="faculty" class="basic_profile_input_txt" required>
												学部
												<input name="department" type="text" value="〇〇" id="department" class="basic_profile_input_txt">
												学科
											</li>
											<li>
												<span>卒業年度</span>
												<select class="select_area">
													<option value="">-</option>
													<option value="2020年度" selected>2020年度</option>
													<option value="2021年度">2021年度</option>
													<option value="2022年度">2022年度</option>
													<option value="2023年度">2023年度</option>
													<option value="2024年度">2024年度</option>
													<option value="2025年度">2025年度</option>
													<option value="2026年度">2026年度</option>
												</select>
											</li>
											<li>
												<span>生年月日</span><br>
												<select name="year">
													<option value="">-</option>
													<option value="1990">1990</option>
													<option value="1991">1991</option>
													<option value="1992">1992</option>
													<option value="1993">1993</option>
													<option value="1994">1994</option>
													<option value="1995">1995</option>
													<option value="1996">1996</option>
													<option value="1997">1997</option>
													<option value="1998">1998</option>
													<option value="1999">1999</option>
													<option value="2000">2000</option>
													<option value="2001">2001</option>
													<option value="2002">2002</option>
												</select>
												年
												<select name="month" class="ml15 ml5sp">
													<option value="">-</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
												</select>
												月
												<select name="day" class="ml15 ml5sp">
													<option value="">-</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
													<option value="13">13</option>
													<option value="14">14</option>
													<option value="15">15</option>
													<option value="16">16</option>
													<option value="17">17</option>
													<option value="18">18</option>
													<option value="19">19</option>
													<option value="20">20</option>
													<option value="21">21</option>
													<option value="22">22</option>
													<option value="23">23</option>
													<option value="24">24</option>
													<option value="25">25</option>
													<option value="26">26</option>
													<option value="27">27</option>
													<option value="28">28</option>
													<option value="29">29</option>
													<option value="30">30</option>
													<option value="31">31</option>
												</select>
												日
											</li>
										</dl>
									</form>
								</section>
								<section id="situation_profile_section" class="mypage_profile_section">
									<form class="profile_form">
										<h3>就活状況
											{{-- <a class="profile_edit_btn profile_edit_btn_sub">編集</a> --}}
											<div class="profile_edit_btn_wrap profile_edit_btn_wrap_sub">
												<a class="profile_cancel_btn">キャンセル</a>
												<a class="profile_save_btn">保存</a>
											</div>
										</h3>
										<dl class="profile_dl_static">
											<li><span>内定数</span>3</li>
											<li>
												<span>選考状況</span>
												<p>内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。</p>
											</li>
										</dl>
										<dl class="profile_dl_edit">
											<li>
												<span>内定数</span>
												<select name="month" class="ml15">
													<option value="">-</option>
													<option value="0">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10以上">10以上</option>
												</select>
											</li>
											<li>
												<span>選考状況</span>
												<textarea name="current_situation" cols="140" rows="6">内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。内定は取れているが、まだ納得できていない。</textarea>
											</li>
										</dl>
									</form>
								</section>
								<section id="company_preference_profile_section" class="mypage_profile_section">
									<form class="profile_form">
										<h3>会社選びに関して
											{{-- <a class="profile_edit_btn profile_edit_btn_sub">編集</a> --}}
											<div class="profile_edit_btn_wrap profile_edit_btn_wrap_sub">
												<a class="profile_cancel_btn">キャンセル</a>
												<a class="profile_save_btn">保存</a>
											</div>
										</h3>
										<dl class="profile_dl_static">
											<li>
												<span>軸</span>理念,福利厚生
												<span>その理由</span>安定を求めたい。
											</li>
											<li><span>業界</span>メーカー</li>
											<li><span>職種</span>セールス</li>
											<li><span>希望勤務地</span>東京</li>
											<li><span>会社タイプ</span>会社規模が大きい（組織や制度が出来上がった環境で働きたい）</li>
										</dl>
										<dl class="profile_dl_edit">
											<li>
												<span>軸</span>
												<div>
													<label class="company_preference_control company_preference_control--checkbox">理念
														<input type="checkbox" value="理念">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">福利厚生
														<input type="checkbox" value="福利厚生">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">事業内容
														<input type="checkbox" value="事業内容">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">働く人
														<input type="checkbox" value="働く人">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">その他
														<input type="checkbox" value="その他">
														<div class="company_preference_control__indicator"></div>
													</label>
												</div>
												<span>その理由</span>
												<textarea name="reason_for_priority" cols="140" rows="6"></textarea>
											</li>
											<li>
												<span>業界</span>
												<div>
													<label class="company_preference_control company_preference_control--checkbox">IT・通信
														<input type="checkbox" value="IT・通信">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">ソフトウェア・情報処理
														<input type="checkbox" value="ソフトウェア・情報処理">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">インターネット関連・ゲーム・アプリ関連
														<input type="checkbox" value="インターネット関連・ゲーム・アプリ関連">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">機械・産業用装置・電機・OA機器
														<input type="checkbox" value="機械・産業用装置・電機・OA機器">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">自動車・自動車部品・輸送用機器
														<input type="checkbox" value="自動車・自動車部品・輸送用機器">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">コンピュータ・通信機器・精密機器
														<input type="checkbox" value="コンピュータ・通信機器・精密機器">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">電子部品・半導体
														<input type="checkbox" value="電子部品・半導体">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">食品・飲料・たばこ・飼料
														<input type="checkbox" value="食品・飲料・たばこ・飼料">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">化学・医薬・化粧品
														<input type="checkbox" value="化学・医薬・化粧品">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">鉄鋼・非鉄金属・金属製品
														<input type="checkbox" value="鉄鋼・非鉄金属・金属製品">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">石油・石炭・ゴム・プラスチック
														<input type="checkbox" value="石油・石炭・ゴム・プラスチック">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">ガラス・セラミック・セメント
														<input type="checkbox" value="ガラス・セラミック・セメント">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">ガラス・セラミック・セメント
														<input type="checkbox" value="ガラス・セラミック・セメント">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">パルプ・紙・紙加工・印刷・印刷関連
														<input type="checkbox" value="パルプ・紙・紙加工・印刷・印刷関連">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">日用品・文具・オフィス用品
														<input type="checkbox" value="日用品・文具・オフィス用品">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">健在・エクステリア
														<input type="checkbox" value="健在・エクステリア">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">インテリア・住宅関連
														<input type="checkbox" value="インテリア・住宅関連">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">アパレル
														<input type="checkbox" value="アパレル">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">スポーツ・玩具・ゲーム機器
														<input type="checkbox" value="スポーツ・玩具・ゲーム機器">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">その他メーカー・製造関連
														<input type="checkbox" value="その他メーカー・製造関連">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">電機・ガス・水道・石油
														<input type="checkbox" value="電機・ガス・水道・石油">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">放送（テレビ・ラジオ含む）
														<input type="checkbox" value="放送（テレビ・ラジオ含む）">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">新聞・出版
														<input type="checkbox" value="新聞・出版">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">広告
														<input type="checkbox" value="広告">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">その他（芸能・エンタメ）
														<input type="checkbox" value="その他（芸能・エンタメ）">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">運輸（鉄道・航空・海運・物流）
														<input type="checkbox" value="運輸（鉄道・航空・海運・物流）">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">総合商社
														<input type="checkbox" value="総合商社">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">専門商社
														<input type="checkbox" value="専門商社">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">百貨店・スーパー・ドラックストア
														<input type="checkbox" value="百貨店・スーパー・ドラックストア">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">通信販売、専門店・その他小売り
														<input type="checkbox" value="通信販売、専門店・その他小売り">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">銀行
														<input type="checkbox" value="銀行">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">証券
														<input type="checkbox" value="証券">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">保険
														<input type="checkbox" value="保険">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">その他金融（クレジットなど）
														<input type="checkbox" value="その他金融（クレジットなど）">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">リース・レンタル
														<input type="checkbox" value="リース・レンタル">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">ディベロッパー
														<input type="checkbox" value="ディベロッパー">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">建設・建築設定・ハウスメーカー
														<input type="checkbox" value="建設・建築設定・ハウスメーカー">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">設備関連
														<input type="checkbox" value="設備関連">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">プラント・プラントエンジニアリング
														<input type="checkbox" value="プラント・プラントエンジニアリング">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">不動産取引・不動産賃貸・不動産管理
														<input type="checkbox" value="不動産取引・不動産賃貸・不動産管理">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">デザイン・芸術関連
														<input type="checkbox" value="デザイン・芸術関連">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">コンサルティング・マーケティング・調査
														<input type="checkbox" value="コンサルティング・マーケティング・調査">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">その他専門・技術サービス
														<input type="checkbox" value="その他専門・技術サービス">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">ホテル・旅館
														<input type="checkbox" value="ホテル・旅館">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">外食
														<input type="checkbox" value="外食">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">その他フード
														<input type="checkbox" value="その他フード">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">旅行・観光
														<input type="checkbox" value="旅行・観光">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">家事サービス・クリーニング
														<input type="checkbox" value="家事サービス・クリーニング">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">冠婚葬祭
														<input type="checkbox" value="冠婚葬祭">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">その他生活サービス
														<input type="checkbox" value="その他生活サービス">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">アミューズメント・レジャーサービス
														<input type="checkbox" value="アミューズメント・レジャーサービス">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">教育関連
														<input type="checkbox" value="教育関連">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">医療・保育・介護、福祉
														<input type="checkbox" value="医療・保育・介護、福祉">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">環境・リサイクル・廃棄物処理
														<input type="checkbox" value="環境・リサイクル・廃棄物処理">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">整備・修理・人材
														<input type="checkbox" value="整備・修理・人材">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">その他
														<input type="checkbox" value="その他">
														<div class="company_preference_control__indicator"></div>
													</label>
												</div>
											</li>
											<li>
												<span>職種</span>
												<div>
													<label class="company_preference_control company_preference_control--checkbox">営業
														<input type="checkbox" value="営業">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">事務・秘書・受付
														<input type="checkbox" value="事務・秘書・受付">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">経理
														<input type="checkbox" value="経理">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">総務人事
														<input type="checkbox" value="総務人事">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">バイヤー
														<input type="checkbox" value="バイヤー">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">法務
														<input type="checkbox" value="法務">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">企画
														<input type="checkbox" value="企画">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">マーケティング
														<input type="checkbox" value="マーケティング">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">宣伝・広報
														<input type="checkbox" value="宣伝・広報">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">経営コンサルタント
														<input type="checkbox" value="経営コンサルタント">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">為替ディーラー・トレーダー
														<input type="checkbox" value="為替ディーラー・トレーダー">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">証券アナリスト
														<input type="checkbox" value="証券アナリスト">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">融資・資産運用
														<input type="checkbox" value="融資・資産運用">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">ファイナンシャルアドバイザー
														<input type="checkbox" value="ファイナンシャルアドバイザー">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">アクチュアリー
														<input type="checkbox" value="アクチュアリー">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">システムエンジニア・プログラマ
														<input type="checkbox" value="システムエンジニア・プログラマ">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">ネットワークエンジニア
														<input type="checkbox" value="ネットワークエンジニア">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">カスタマーエンジニア
														<input type="checkbox" value="カスタマーエンジニア">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">研究職
														<input type="checkbox" value="研究職">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">設計開発
														<input type="checkbox" value="設計開発">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">生産・製造
														<input type="checkbox" value="生産・製造">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">セールスエンジニア
														<input type="checkbox" value="セールスエンジニア">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">研究開発
														<input type="checkbox" value="研究開発">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">薬剤師
														<input type="checkbox" value="薬剤師">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">栄養士
														<input type="checkbox" value="栄養士">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">福祉士・介護士・ホームヘルパー
														<input type="checkbox" value="福祉士・介護士・ホームヘルパー">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">講師・インストラクター・専門コンサルタント
														<input type="checkbox" value="講師・インストラクター・専門コンサルタント">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">建築・土木設計
														<input type="checkbox" value="建築・土木設計">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">施工管理
														<input type="checkbox" value="施工管理">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">Webデザイナー
														<input type="checkbox" value="Webデザイナー">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">デザイナー
														<input type="checkbox" value="デザイナー">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">ゲームクリエイター
														<input type="checkbox" value="ゲームクリエイター">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">記者・ライター
														<input type="checkbox" value="記者・ライター">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">編集・製作
														<input type="checkbox" value="編集・製作">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">販売・接客
														<input type="checkbox" value="販売・接客">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">店長
														<input type="checkbox" value="店長">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">スーパーアドバイザー
														<input type="checkbox" value="スーパーアドバイザー">
														<div class="company_preference_control__indicator"></div>
													</label>
												</div>
											</li>
											<li>
												<span>希望勤務地</span>
												<div>
													<label class="company_preference_control company_preference_control--checkbox">北海道
														<input type="checkbox" value="北海道">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">青森県
														<input type="checkbox" value="青森県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">岩手県
														<input type="checkbox" value="岩手県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">宮城県
														<input type="checkbox" value="宮城県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">秋田県
														<input type="checkbox" value="秋田県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">山形県
														<input type="checkbox" value="山形県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">福島県
														<input type="checkbox" value="福島県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">茨城県
														<input type="checkbox" value="茨城県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">栃木県
														<input type="checkbox" value="栃木県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">群馬県
														<input type="checkbox" value="群馬県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">埼玉県
														<input type="checkbox" value="埼玉県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">千葉県
														<input type="checkbox" value="千葉県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">東京都
														<input type="checkbox" value="東京都">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">神奈川県
														<input type="checkbox" value="神奈川県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">新潟県
														<input type="checkbox" value="新潟県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">富山県
														<input type="checkbox" value="富山県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">石川県
														<input type="checkbox" value="石川県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">福井県
														<input type="checkbox" value="福井県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">山梨県
														<input type="checkbox" value="山梨県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">長野県
														<input type="checkbox" value="長野県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">岐阜県
														<input type="checkbox" value="岐阜県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">静岡県
														<input type="checkbox" value="静岡県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">愛知県
														<input type="checkbox" value="愛知県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">三重県
														<input type="checkbox" value="三重県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">滋賀県
														<input type="checkbox" value="滋賀県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">京都府
														<input type="checkbox" value="京都府">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">大阪府
														<input type="checkbox" value="大阪府">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">兵庫県
														<input type="checkbox" value="兵庫県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">奈良県
														<input type="checkbox" value="奈良県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">和歌山県
														<input type="checkbox" value="和歌山県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">鳥取県
														<input type="checkbox" value="鳥取県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">島根県
														<input type="checkbox" value="島根県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">岡山県
														<input type="checkbox" value="岡山県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">広島県
														<input type="checkbox" value="広島県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">山口県
														<input type="checkbox" value="山口県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">徳島県
														<input type="checkbox" value="徳島県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">香川県
														<input type="checkbox" value="香川県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">愛媛県
														<input type="checkbox" value="愛媛県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">高知県
														<input type="checkbox" value="高知県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">福岡県
														<input type="checkbox" value="福岡県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">佐賀県
														<input type="checkbox" value="佐賀県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">長崎県
														<input type="checkbox" value="長崎県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">熊本県
														<input type="checkbox" value="熊本県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">大分県
														<input type="checkbox" value="大分県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">宮崎県
														<input type="checkbox" value="宮崎県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">鹿児島県
														<input type="checkbox" value="鹿児島県">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">沖縄県
														<input type="checkbox" value="沖縄県">
														<div class="company_preference_control__indicator"></div>
													</label>
												</div>
											</li>
											<li>
												<span>会社タイプ</span>
												<div>
													<label class="company_preference_control company_preference_control--checkbox">会社規模が大きい（組織や制度が出来上がった環境で働きたい）
														<input type="checkbox" value="会社規模が大きい（組織や制度が出来上がった環境で働きたい）">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">会社規模が小さい（組織や制度を創っていきたい）
														<input type="checkbox" value="会社規模が小さい（組織や制度を創っていきたい）">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">安定・着実を好む（着実に成長していきたい）
														<input type="checkbox" value="安定・着実を好む（着実に成長していきたい）">
														<div class="company_preference_control__indicator"></div>
													</label>
													<label class="company_preference_control company_preference_control--checkbox">挑戦・成長を好む（人より早く成長したい）
														<input type="checkbox" value="挑戦・成長を好む（人より早く成長したい）">
														<div class="company_preference_control__indicator"></div>
													</label>
												</div>
											</li>
										</dl>
									</form>
								</section>
							</section>
						</section>
					</div>
					<div class="mypage_col_r">
						<section class="reserved_section">
							<h2>予約中の面談</h2>
							<section class="advisor_profile_section_body">
								<!-- <span class="no_reserved">予約中の面談はありません</span> -->
								<div class="reserved_block">
									<span class="reserved_user_icon"><img src="../../img/advisor_img/AkiYamamoto.png"></span>
									<a href="../advisor/advisor_profile.php" class="reserved_advisor_link">
										<span class="reserved_user_name">山本 愛生</span>
									</a>
									<span>さん</span>
									<dl>
										<li><span>日時</span>5/28 14:00~</li>
										<li><span>形式</span>対面</li>
										<li>
											<span>場所</span>
											<p class="lh15">〒810-0001 福岡県福岡市中央区 天神3-15-1 にちりんビル3F</p>
											<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.4711768677585!2d130.39526891520308!3d33.59307718073346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3541918e9ac5d915%3A0x9136f8c60302bd6c!2z44CSODEwLTAwMDEg56aP5bKh55yM56aP5bKh5biC5Lit5aSu5Yy65aSp56We77yT5LiB55uu77yR77yV4oiS77yRIOOBq-OBoeOCiuOCk-ODk-ODqzNG!5e0!3m2!1sja!2sjp!4v1560150859406!5m2!1sja!2sjp" frameborder="0" style="border:0" allowfullscreen></iframe>
										</li>
										<li>
											<span>電話番号</span>
											<a href="tel:09012345678">090-1234-5678</a>
										</li>
									</dl>
									<span class="approval_status approval_pending">承認待ち</span>
									<!-- <span class="approval_status approval_accepted">承認済み</span> -->
									<!-- <span class="approval_status approval_rejected">不承認</span> -->
								</div>
								<div class="reserved_block">
										<span class="reserved_user_icon"><img src="../../img/advisor_img/AkiYamamoto.png"></span>
										<a href="../advisor/advisor_profile.php" class="reserved_advisor_link">
											<span class="reserved_user_name">山本 愛生</span>
										</a>
										<span>さん</span>
									<dl>
										<li><span>日時</span>5/28 14:00~</li>
										<li><span>形式</span>対面</li>
										<li>
											<span>場所</span>
											<p class="lh15">〒810-0001 福岡県福岡市中央区 天神3-15-1 にちりんビル3F</p>
											<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.4711768677585!2d130.39526891520308!3d33.59307718073346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3541918e9ac5d915%3A0x9136f8c60302bd6c!2z44CSODEwLTAwMDEg56aP5bKh55yM56aP5bKh5biC5Lit5aSu5Yy65aSp56We77yT5LiB55uu77yR77yV4oiS77yRIOOBq-OBoeOCiuOCk-ODk-ODqzNG!5e0!3m2!1sja!2sjp!4v1560150859406!5m2!1sja!2sjp" frameborder="0" style="border:0" allowfullscreen></iframe>
										</li>
										<li>
											<span>電話番号</span>
											<a href="tel:09012345678">090-1234-5678</a>
										</li>
									</dl>
									<!-- <span class="approval_status approval_pending">承認待ち</span> -->
									<span class="approval_status approval_accepted">承認済み</span>
									<!-- <span class="approval_status approval_rejected">不承認</span> -->
								</div>
								<div class="reserved_block">
										<span class="reserved_user_icon"><img src="../../img/advisor_img/AkiYamamoto.png"></span>
										<a href="../advisor/advisor_profile.php" class="reserved_advisor_link">
											<span class="reserved_user_name">山本 愛生</span>
										</a>
										<span>さん</span>
									<dl>
										<li><span>日時</span>5/28 14:00~</li>
										<li><span>形式</span>対面</li>
										<li>
											<span>場所</span>
											<p class="lh15">〒810-0001 福岡県福岡市中央区 天神3-15-1 にちりんビル3F</p>
											<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.4711768677585!2d130.39526891520308!3d33.59307718073346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3541918e9ac5d915%3A0x9136f8c60302bd6c!2z44CSODEwLTAwMDEg56aP5bKh55yM56aP5bKh5biC5Lit5aSu5Yy65aSp56We77yT5LiB55uu77yR77yV4oiS77yRIOOBq-OBoeOCiuOCk-ODk-ODqzNG!5e0!3m2!1sja!2sjp!4v1560150859406!5m2!1sja!2sjp" frameborder="0" style="border:0" allowfullscreen></iframe>
										</li>
										<li>
											<span>電話番号</span>
											<a href="tel:09012345678">090-1234-5678</a>
										</li>
									</dl>
									<!-- <span class="approval_status approval_pending">承認待ち</span> -->
									<!-- <span class="approval_status approval_accepted">承認済み</span> -->
									<span class="approval_status approval_rejected">不承認</span>
								</div>
							</section>
						</section>
					</div>
				</div>
			</section>

			<section id="" class="main_wrap">
				<div></div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
@endsection
