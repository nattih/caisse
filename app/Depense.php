<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $fillable = [
        'user_id',
        'compte_id',
        'type_depense_id',
        'agent',
        'date_depense',
        'montant',
        'nouveau_solde',
        'description',
        'fournisseur',
        'commentaire',
        'fichier',
        'statut',
    ];  
    public function typeDepense(){
        return $this->belongsTo('App\TypeDepense');
    }    
    public function compte(){
        return $this->belongsTo('App\Compte');
    }  
    public function user(){
        return $this->belongsTo('App\User');
    }    
}
