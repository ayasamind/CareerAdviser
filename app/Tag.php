<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Enums\Prefecture;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function Adviser()
    {
        return $this->hasOne('App\Adviser');
    }
}
