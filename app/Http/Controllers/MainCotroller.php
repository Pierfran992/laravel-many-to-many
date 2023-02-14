<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// richiamo tutti i model
use App\Models\Category;
use App\Models\Typology;
use App\Models\Product;

class MainCotroller extends Controller
{
    // index
    public function home() {
        $categories = Category::all();
        return view('pages.home', compact('categories'));
    }

    public function products() {
        $products = Product::all();
        return view('pages.products', compact('products'));
    }
}
