<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Prefecture;

class AdviserSchedule extends Model
{
    const SCHEDULE_TYPE_ONLINE = 1;
    const SCHEDULE_TYPE_NG     = 2;

    const ONLINE_FLAG_TRUE     = 1;
    const ONLINE_FLAG_FALSE    = 2;

    const SCHEDULE_LABEL_OK = "◯";
    const SCHEDULE_LABEL_ONLINE = "△";
    const SCHEDULE_LABEL_NG = "×";

    protected $fillable = [
        'adviser_id',
        'date',
        'type'
    ];

    protected $appends = ['is_online', 'is_ng'];

    protected $dates = ['date'];

    public function Adviser()
    {
        return $this->belongsTo('App\Adviser', 'adviser_id');
    }

    public function getIsOnlineAttribute()
    {
        return $this->type === $this::SCHEDULE_TYPE_ONLINE;
    }

    public function getIsNgAttribute()
    {
        return $this->type === $this::SCHEDULE_TYPE_NG;
    }

    public static function getTimeList()
    {
        return [
            "09:59:59",
            "10:30:00",
            "10:59:59",
            "11:30:00",
            "11:59:59",
            "12:30:00",
            "12:59:59",
            "13:30:00",
            "13:59:59",
            "14:30:00",
            "14:59:59",
            "15:30:00",
            "15:59:59",
            "16:30:00",
            "16:59:59",
            "17:30:00",
            "17:59:59",
            "18:30:00",
            "18:59:59",
            "19:30:00",
            "19:59:59",
            "20:30:00",
            "20:59:59",
            "21:30:00",
            "21:59:59",
        ];
    }

    public static function getScheduleLists()
    {
        return [
            null => self::SCHEDULE_LABEL_OK,
            self::SCHEDULE_TYPE_ONLINE => self::SCHEDULE_LABEL_ONLINE,
            self::SCHEDULE_TYPE_NG => self::SCHEDULE_LABEL_NG
        ];
    }
}
