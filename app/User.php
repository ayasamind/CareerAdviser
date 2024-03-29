<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\EmailVerificationJa;
use App\Enums\Traits\GetPrefectureTrait;
use App\Desire;
use App\Notifications\PasswordResetNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use GetPrefectureTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'twitter_id', 'facebook_id'
    ];

    protected $appends = [
        'desire_axis',
        'desire_industry',
        'desire_prefecture',
        'desire_job',
        'desire_company_type',
        'gender_label'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerificationJa);
    }

    public function UserProfile()
    {
        return $this->hasOne('App\UserProfile', 'user_id');
    }

    public function Desire()
    {
        return $this->belongsToMany('App\Desire');
    }

    private function returnDesireLabel($type)
    {
        $label = "";
        $first = true;
        foreach ($this->Desire as $desire) {
            if ($desire->type == $type && $first) {
                $first = false;
                $label = $label . $desire->name;
            } elseif ($desire->type == $type) {
                $label = $label . ', ' . $desire->name;
            }
        }
        return $label;
    }

    public function getDesireAxisAttribute()
    {
        return $this->returnDesireLabel(Desire::DESIRE_TYPE_AXIS);
    }

    public function getDesireIndustryAttribute()
    {
        return $this->returnDesireLabel(Desire::DESIRE_TYPE_INDUSTRY);
    }

    public function getDesirePrefectureAttribute()
    {
        return $this->returnDesireLabel(Desire::DESIRE_TYPE_PREFECTURE);
    }

    public function getDesireJobAttribute()
    {
        return $this->returnDesireLabel(Desire::DESIRE_TYPE_JOB);
    }

    public function getDesireCompanyTypeAttribute()
    {
        return $this->returnDesireLabel(Desire::DESIRE_TYPE_COMPANY_TYPE);
    }

    public function sendPasswordResetNotification($token)
    {
      $this->notify(new PasswordResetNotification($token));
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
