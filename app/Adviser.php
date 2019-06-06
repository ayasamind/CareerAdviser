<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\Prefecture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Adviser extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function AdviserProfile()
    {
        return $this->hasOne('App\AdviserProfile', 'adviser_id');
    }

    public function AdviserCareer()
    {
        return $this->hasMany('App\AdviserCareer', 'adviser_id');
    }

    public function Tag()
    {
        return $this->belongsToMany('App\Tag');
    }

    public static function getPrefectureList()
    {
        $keys = Prefecture::getKeys();
        $values = Prefecture::getValues();

        $list = [
            null => '選択してください'
        ];
        foreach ($values as $index => $value) {
            $list[$value] = Prefecture::getDescription($value);
        }

        return $list;
    }
}
