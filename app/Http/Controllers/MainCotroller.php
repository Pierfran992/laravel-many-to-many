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

    // create
    public function create() {
        $typologies = Typology :: all();
        $categories = Category :: all();

        return view('pages.createProduct', compact('typologies', 'categories'));
    }

    public function store(Request $request) {
        
        $data = $request -> validate([
            'name' => 'required|string|max:32',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'typology_id' => 'required|integer',
            'categories' => 'required|array'
        ]);

        $product = New Product();

        $code = rand(10000, 99999);
        $product -> code = $data['code'] = $code;

        $product -> name = $data ['name'];
        $product -> description = $data ['description'];
        $product -> price = $data ['price'];
        $product -> weight = $data ['weight'];
        $product -> typology_id = $data ['typology_id'];
        $product -> categories = $data ['categories'];

        $product -> make();
        dd($product);

    }
}
