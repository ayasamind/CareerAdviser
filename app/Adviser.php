<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\Prefecture;

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

    public function adviserProfile()
    {
        return $this->hasOne('App\AdviserProfile', 'adviser_id');
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
