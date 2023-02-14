<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    use HasFactory;

    // creo la funzione per collegare la table typologies con quella product
    public function products() {
        return $this -> hasMany(Product :: class);
    }
}
