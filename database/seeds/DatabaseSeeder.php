<?php

use Illuminate\Database\Seeder;
use App\Desire;
use App\Enums\Traits\GetPrefectureTrait;

class DatabaseSeeder extends Seeder
{
    use GetPrefectureTrait;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => '管理者',
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);

        DB::table('advisers')->insert([
            'name' => 'アドバイザー',
            'email' => 'adviser@example.com',
            'password' => bcrypt('password')
        ]);

        DB::table('users')->insert([
            'name' => 'ユーザー',
            'email' => 'yoshino@fusic.co.jp',
            'password' => bcrypt('yoshino'),
            'email_verified_at' => new \Carbon\Carbon()
        ]);

        $tags = [
            'メーカー業界を紹介できる','営業職を紹介できる','スタートアップ企業を紹介できる','自己分析',
            '商社業界を紹介できる',	'事務・秘書・受付職を紹介できる', 'ベンチャー企業を紹介できる',	'業界研究',
            '金融業界を紹介できる',	'経理職を紹介できる', '大手企業を紹介できる', '企業研究',
            '出版業界を紹介できる',	'総務人事職を紹介できる', '職種研究',
            '流通業界を紹介できる',	'企画職を紹介できる', 'ES添削',
            'IT業界を紹介できる', 'マーケティング職を紹介できる', '面接対策',
            '不動産業界を紹介できる', '宣伝・広報職を紹介できる', 'GD対策',
            'サービス業界を紹介できる',	'企業紹介',
            '人材業界を紹介できるスポーツ業界を紹介できる'
        ];

        DB::table('tags')->insert([
            ['name' => $tags[0]],
            ['name' => $tags[1]],
            ['name' => $tags[2]],
            ['name' => $tags[3]],
            ['name' => $tags[4]],
            ['name' => $tags[5]],
            ['name' => $tags[6]],
            ['name' => $tags[7]],
            ['name' => $tags[8]],
            ['name' => $tags[9]],
            ['name' => $tags[10]],
            ['name' => $tags[11]],
            ['name' => $tags[12]],
            ['name' => $tags[13]],
            ['name' => $tags[14]],
            ['name' => $tags[15]],
            ['name' => $tags[16]],
            ['name' => $tags[17]],
            ['name' => $tags[18]],
            ['name' => $tags[19]],
            ['name' => $tags[20]],
            ['name' => $tags[21]],
            ['name' => $tags[22]],
            ['name' => $tags[23]],
            ['name' => $tags[24]],
            ['name' => $tags[25]],
            ['name' => $tags[26]]
        ]);

        $axis = [
            [
                'type' => Desire::DESIRE_TYPE_AXIS,
                'name' => '理念'
            ],
            [
                'type' => Desire::DESIRE_TYPE_AXIS,
                'name' => '福利厚生'
            ],
            [
                'type' => Desire::DESIRE_TYPE_AXIS,
                'name' => '事業内容'
            ],
            [
                'type' => Desire::DESIRE_TYPE_AXIS,
                'name' => '働く人'
            ],
            [
                'type' => Desire::DESIRE_TYPE_AXIS,
                'name' => 'その他'
            ]
        ];

        DB::table('desires')->insert($axis);

        $industry = [
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'IT・通信'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'ソフトウェア・情報処理'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'インターネット関連・ゲーム・アプリ関連'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '機械・産業用装置・電機・OA機器'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '自動車・自動車部品・輸送用機器'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'コンピュータ・通信機器・精密機器'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '電子部品・半導体'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '食品・飲料・たばこ・飼料'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '化学・医薬・化粧品'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '鉄鋼・非鉄金属・金属製品'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '石油・石炭・ゴム・プラスチック'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'ガラス・セラミック・セメント'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'パルプ・紙・紙加工・印刷・印刷関連'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '日用品・文具・オフィス用品'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '健在・エクステリア'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'インテリア・住宅関連'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'アパレル'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'スポーツ・玩具・ゲーム機器'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'その他メーカー・製造関連'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '電機・ガス・水道・石油'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '放送（テレビ・ラジオ含む）'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '新聞・出版'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '広告'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'その他（芸能・エンタメ）'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '運輸（鉄道・航空・海運・物流）'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '総合商社'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '専門商社'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '百貨店・スーパー・ドラックストア'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '通信販売、専門店・その他小売り'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '銀行'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '証券'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '保険'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'その他金融（クレジットなど）'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'リース・レンタル'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'ディベロッパー'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '建設・建築設定・ハウスメーカー'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '設備関連'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'プラント・プラントエンジニアリング'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '不動産取引・不動産賃貸・不動産管理'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'デザイン・芸術関連'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'コンサルティング・マーケティング・調査'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'その他専門・技術サービス'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'ホテル・旅館'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '外食'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'その他フード'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '旅行・観光'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '家事サービス・クリーニング'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '冠婚葬祭'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'その他生活サービス'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'アミューズメント・レジャーサービス'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '教育関連'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '医療・保育・介護、福祉'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '環境・リサイクル・廃棄物処理'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => '整備・修理・人材'
            ],
            [
                'type' => Desire::DESIRE_TYPE_INDUSTRY,
                'name' => 'その他'
            ],
        ];

        DB::table('desires')->insert($industry);

        $job = [
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '営業'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '事務・秘書・受付'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '経理'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '総務人事'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => 'バイヤー'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '法務'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '企画'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => 'マーケティング'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '宣伝・広報'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '経営コンサルタント'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '為替ディーラー・トレーダー'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '証券アナリスト'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '融資・資産運用'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => 'ファイナンシャルアドバイザー'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => 'アクチュアリー'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => 'システムエンジニア・プログラマ'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => 'ネットワークエンジニア'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => 'カスタマーエンジニア'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '研究職'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '設計開発'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '生産・製造'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => 'セールスエンジニア'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '研究開発'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '薬剤師'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '栄養士'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '福祉士・介護士・ホームヘルパー'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '講師・インストラクター・専門コンサルタント'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '建築・土木設計'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '施工管理'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => 'Webデザイナー'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => 'デザイナー'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => 'ゲームクリエイター'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '記者・ライター'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '編集・製作'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '販売・接客'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => '店長'
            ],
            [
                'type' => Desire::DESIRE_TYPE_JOB,
                'name' => 'スーパーアドバイザー'
            ]
        ];

        DB::table('desires')->insert($job);

        $prefectures = [];
        foreach ($this->getPrefectureList() as $key => $list) {
            if ($key !== "") {
                $prefectures[] = [
                    'type' => Desire::DESIRE_TYPE_PREFECTURE,
                    'name' => $list
                ];
            }
        }

        DB::table('desires')->insert($prefectures);

        $company_type =  [
            [
                'type' => Desire::DESIRE_TYPE_COMPANY_TYPE,
                'name' => '会社規模が大きい（組織や制度が出来上がった環境で働きたい）'
            ],
            [
                'type' => Desire::DESIRE_TYPE_COMPANY_TYPE,
                'name' => '会社規模が小さい（組織や制度を創っていきたい）'
            ],
            [
                'type' => Desire::DESIRE_TYPE_COMPANY_TYPE,
                'name' => '安定・着実を好む（着実に成長していきたい）'
            ],
            [
                'type' => Desire::DESIRE_TYPE_COMPANY_TYPE,
                'name' => '挑戦・成長を好む（人より早く成長したい）'
            ]
        ];

        DB::table('desires')->insert($company_type);
    }
}
