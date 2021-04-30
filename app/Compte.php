<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $fillable = [
        'user_id',
        'bilan_id',
        'date_ouverture',
        'solde_ouverture',
        'date_fermeture',
        'solde_fermeture',
        'total_recette',
        'total_deepense',
        'solde_theorique',
        'solde_physique',
        'ecart',
        'statut'
    ];

    public function bilan(){
        return $this->belongsTo('App\Bilan');
    }  
    public function depenses(){
        return $this->hasMany('App\Depense');
    }   
    public function recettes(){
        return $this->hasMany('App\Recette');
    }   

    public function users(){
        return $this->hasMany('App\User');
    }   
}