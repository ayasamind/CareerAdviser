<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Enums\Prefecture;
use Illuminate\Database\Eloquent\Model;

class Desire extends Model
{
    const DESIRE_TYPE_AXIS            = 1; // 軸
    const DESIRE_TYPE_INDUSTRY        = 2; // 業界
    const DESIRE_TYPE_JOB             = 3; // 職種
    const DESIRE_TYPE_PREFECTURE      = 4; // 希望勤務地
    const DESIRE_TYPE_COMPANY_TYPE    = 5; // 会社タイプ

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type'
    ];

    public function User()
    {
        return $this->hasOne('App\User');
    }
}
