<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
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

        $tags = [
            '自己分析',
            '業界研究',
            '企業研究',
            '職種研究',
            'ES添削',
            '面接対策',
            'GD対策',
            '企業紹介',
            '壁打ち',
            'ベンチャーに強い',
            '大手に強い',
            'メーカー業界に強い',
            '商社業界に強い',
            '金融業界に強い',
            '出版業界に強い',
            '流通業界に強い',
            'IT業界に強い',
            '不動産業界に強い'
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
            ['name' => $tags[17]]
        ]);
    }
}
