<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function esdeveniments(){
        return $this->hasMany((Esdeveniment::class)); 
    }
    protected $fillable = [
        'name'
    ];
}
