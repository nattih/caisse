<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bilan extends Model
{
    protected $table = 'bilans';
    
    protected $fillable = [
        'solde', 'etat'
    ];

    public function comptes(){
        return $this->hasMany('App\Compte');
    }   
}
