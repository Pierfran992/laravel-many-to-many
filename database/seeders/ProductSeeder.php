<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// richiamo tutti i model che servono per la creazione dei dati dei prodotti
use App\Models\Category;
use App\Models\Typology;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creo 100 prodotti con make in modo tale che una volta creati non vengano inseriti automaticamente nel db
        Product :: factory() -> count(100) -> make() -> each(function($p){

            // assegno ad ogni prodotto creato una tipologia
            $typology = Typology :: inRandomOrder() -> first();
            $p -> typology() -> associate($typology);

            // ora che gli ho assegnato una tipologia lo salvo nel db così da potergli assegnare le categorie
            $p -> save();

            // assegno al prodotto appena salvato le categorie
            $categories = Category :: inRandomOrder() -> limit(rand(1, 5)) -> get();
            // utilizzo attach per assegnare al prodotto le categorie selezionate
            $p -> categories() -> attach($categories);
        });
    }
}
