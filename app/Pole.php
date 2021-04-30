<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pole extends Model
{
    protected $fillable = [
        'code',
        'nom',
    ];

    public function users(){
        return $this ->hasMany('App\User');
    }
}
