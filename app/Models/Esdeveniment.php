<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Esdeveniment extends Model
{
   

    protected $fillable = [
    'nom',
    'categorie_id',
    'descripcio',
    'data',
    'hora',
    'num_max_assistents',
    'edat_minima',
    'imatge'
];


    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    public function usuaris() {
    return $this->belongsToMany(User::class, 'esdeveniment_user', 'esdeveniment_id', 'user_id');
}

}
