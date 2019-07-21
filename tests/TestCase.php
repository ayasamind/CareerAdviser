<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Concerns\RefreshSeedsState;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication,
        RefreshDatabase;

    private $seeded = false,
            $migrated = false;

    protected function refreshTestDatabase()
    {
        if (!RefreshDatabaseState::$migrated) {
            RefreshDatabaseState::$migrated = true;
            // 入出金管理システム側のデータのマイグレーション
            $this->artisan('migrate:fresh',[
                '--env' => 'testing',
                '--path' => [
                    'database/migrations',
                ]
            ]);
        }
        if (!RefreshSeedsState::$seeded) {
            RefreshSeedsState::$seeded = true;
            $this->artisan('db:seed', [
                '--env' => 'testing'
            ]);
        }
        $this->beginDatabaseTransaction();
    }
}
