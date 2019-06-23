<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Prefecture;

class MeetingRequest extends Model
{
    const MEETING_TYPE_NORMAL = 1;
    const MEETING_TYPE_ONLINE = 2;

    const MEETING_LABEL_NORMAL = "対面";
    const MEETING_LABEL_ONLINE = "Web";

    const STATUS_TYPE_UNAPPROVED = 1; // 未承認
    const STATUS_TYPE_APPROVED   = 2; // 承認
    const STATUS_TYPE_DENIED     = 3; // 拒否

    const STATUS_LABEL_UNAPPROVED = "未承認";
    const STATUS_LABEL_APPROVED   = "承認";
    const STATUS_LABEL_DENIED     = "拒否";

    protected $fillable = [
        'adviser_id',
        'user_id',
        'date',
        'type',
        'status',
        'place'
    ];

    protected $dates = ['date'];

    protected $appends = ['type_label', 'status_label'];

    public function Adviser()
    {
        return $this->belongsTo('App\Adviser', 'adviser_id');
    }

    public function User()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getTypeLabelAttribute()
    {
        $label = "";
        if ($this->type == self::MEETING_TYPE_NORMAL) {
            $label = self::MEETING_LABEL_NORMAL;
        } elseif ($this->type == self::MEETING_TYPE_ONLINE) {
            $label = self::MEETING_LABEL_ONLINE;
        }
        return $label;
    }

    public function getStatusLabelAttribute()
    {
        $label = "";
        if ($this->status == self::STATUS_TYPE_UNAPPROVED) {
            $label = self::STATUS_LABEL_UNAPPROVED;
        } elseif ($this->status == self::STATUS_TYPE_APPROVED) {
            $label = self::STATUS_LABEL_APPROVED;
        } elseif ($this->status == self::STATUS_TYP_DENIED) {
            $label = self::STATUS_LABEL_DENIED;
        }
        return $label;
    }
}