<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeRecette extends Model
{
    protected $fillable = [
        'code',
        'appro',
    ];   
    
    public function recette(){
        return $this->hasMany('App\Recette');
    }   
}
