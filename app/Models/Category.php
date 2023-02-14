<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // creo la funzione per collegare la table categories con la table products
    public function products() {
        return $this -> belongsToMany(Product::class);
    }
}
