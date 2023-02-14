<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // creo le funzioni per collegare la table products con le table categories e typologies
    public function categories() {
        return $this -> belongsToMany(Category :: class);
    }

    public function typology() {
        return $this -> belongsTo(Typology :: class);
    }
}
