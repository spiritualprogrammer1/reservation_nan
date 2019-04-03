<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    protected $fillable = [
        'libelle', 'nbreHeure', 'autoriseAComposer','groupe','equipe'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
