<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'prenom', 'sexe', 'dat_naiss','residence', 'contact', 'pole_id',
        'debut_fonction', 'contrat', 'photo','email', 'password', 'salaire'
    ];

    public function getSexeAttribute($attributes){
        return  $this->getSexeOptions()[$attributes];
   }
    public function getSexeOptions(){
        return [
            '0'=>'homme',
            '1'=>'femme',
        ];
   }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this ->belongsToMany('App\Role');
    }
    public function pole(){
        return $this ->belongsTo('App\Pole');
    }

    public function isAdmin(){
        return $this ->roles()->where('name', 'admin')->first();
        //cette ligne revoyera vrai sino faut si la persone n'est pas admin
    }
}
