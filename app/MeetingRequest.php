<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Prefecture;

class MeetingRequest extends Model
{
    const MEETING_TYPE_NORMAL = 1;
    const MEETING_TYPE_ONLINE = 2;

    const STATUS_TYPE_UNAPPROVED = 1; // 未承認
    const STATUS_TYPE_APPROVED   = 2; // 承認
    const STATUS_TYPE_DENIED     = 3; // 拒否

    protected $fillable = [
        'adviser_id',
        'user_id',
        'date',
        'type',
        'status',
        'place'
    ];

    protected $dates = ['date'];

    public function Adviser()
    {
        return $this->belongsTo('App\Adviser', 'adviser_id');
    }

    public function User()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
