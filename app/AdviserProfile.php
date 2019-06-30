<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Prefecture;

class AdviserProfile extends Model
{
    protected $fillable = [
        'adviser_id',
        'photo_url',
        'gender',
        'prefecture_id',
        'comment',
        'introduce',
        'industry',
        'company_number',
        'place',
        'performance',
        'meeting_place',
        'article_url'
    ];

    protected $appends = ['prefecture', 'genderLabel'];

    public function adviser()
    {
        return $this->belongsTo('App\Adviser', 'adviser_id');
    }

    public function getPrefectureAttribute()
    {
        return Prefecture::getDescription($this->prefecture_id);
    }

    public function getGenderLabelAttribute()
    {
        $label = '';
        if ($this->gender == 1) {
            $label = '男性';
        } else {
            $label = '女性';
        }
        return $label;
    }
}
