<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Enums\Traits\GetPrefectureTrait;

class Adviser extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use GetPrefectureTrait;

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
}
