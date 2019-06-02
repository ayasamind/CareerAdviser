<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdviserCareer extends Model
{
    protected $fillable = [
        'year', 'career',
    ];

    public function Adviser()
    {
        return $this->belongsTo('App\Adviser', 'adviser_id');
    }
}
