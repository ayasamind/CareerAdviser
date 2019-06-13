<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdviserCareer extends Model
{
    protected $fillable = [
        'adviser_id', 'schedule',
    ];

    public function Adviser()
    {
        return $this->belongsTo('App\Adviser', 'adviser_id');
    }

    public function getTimes()
    {
        return $value = [

        ];
    }
}
