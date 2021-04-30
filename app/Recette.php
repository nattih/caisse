<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    protected $fillable = [
        'user_id',
        'compte_id',
        'type_recette_id',
        'libelle',
        'date_recette',
        'montant',
        'nouveau_solde',
        'source',
    ];  
    
    public function typeRecette(){
        return $this->belongsTo('App\TypeRecette');
    }    

    public function getSourceAttribute($attributes){
        return  $this->getSourceOptions()[$attributes];
   }
    public function getSourceOptions(){
        return [
            '0'=>'Banque',
            '1'=>'Remboursement',
        ];
   }

   public function compte(){
        return $this->belongsTo('App\Compte');
    }  
    public function user(){
        return $this->belongsTo('App\User');
    }    
}
