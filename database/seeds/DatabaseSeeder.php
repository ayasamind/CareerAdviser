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

    }
}
