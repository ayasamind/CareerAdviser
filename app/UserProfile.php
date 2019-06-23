<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Prefecture;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'photo_url',
        'gender',
        'university',
        'graduate_year',
        'birthday',
        'informal_decision',
        'situation',
        'axis',
        'industry',
        'job_type',
        'place',
        'company_type'
    ];

    protected $dates = ['birthday'];

    protected $appends = ['prefecture', 'genderLabel'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
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
