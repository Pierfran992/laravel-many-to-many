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

    // delete
    public function delete(Product $product) {
        $product -> categories() -> sync([]);
        $product -> delete();
        return redirect() -> route('products');
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
        $product -> code = $code;

        $product -> name = $data ['name'];
        $product -> description = $data ['description'];
        $product -> price = $data ['price'];
        $product -> weight = $data ['weight'];
        
        $typology = Typology :: find($data['typology_id']);
        $product -> typology() -> associate($typology);

        $product -> save();

        $categories = Category :: find($data['categories']);
        $product -> categories() -> attach($categories);

        return redirect() -> route('products');

    }

    // edit
    public function edit(Product $product) {
        $categories = Category :: all();
        $typologies = Typology :: all();

        return view('pages.editProduct', compact('product', 'categories', 'typologies'));
    }

    public function update(Request $request, Product $product) {
        $data = $request -> validate([
            'name' => 'required|string|max:32',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'typology_id' => 'required|integer',
            'categories' => 'required|array'
        ]);

        $product -> name = $data ['name'];
        $product -> description = $data ['description'];
        $product -> price = $data ['price'];
        $product -> weight = $data ['weight'];
        
        $typology = Typology :: find($data['typology_id']);
        $product -> typology() -> associate($typology);

        $product -> save();

        $categories = Category :: find($data['categories']);
        $product -> categories() -> sync($categories);

        return redirect() -> route('products');
    }
}
