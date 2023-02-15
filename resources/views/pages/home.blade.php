@extends('layouts.main-layout')

@section('content')
    <h1 class="text-danger mb-3">List Products</h1>

    {{-- creo un bottone per indirizzare l'utente in una pagina dove sono presenti tutti i prodotti --}}
    <a href="{{ route('products') }}" class="btn btn-danger">
        <i class="fa-solid fa-rectangle-list"></i>
        All Products
    </a>

    {{-- creo un bottone per indirizzare l'utente in una pagina dove può creare un nuovo prodotto --}}
    <a href="{{ route('create.product') }}" class="btn btn-danger">
        <i class="fa-solid fa-square-plus"></i>
        New Product
    </a>

    {{-- Creo la card contenente la categori con l'elenco di tutti i prodotti appartenenti ad essa --}}
    @foreach ($categories as $category)

    <div class="card text-center my-5">

        <div class="card-header">
            <h3><strong>Category:</strong> {{ $category -> name }}</h3>
        </div>

        {{-- container contenente tutti i prodotti che appartengono alla categoria --}}
        <div class="card-body d-flex flex-wrap gap-3">

            {{-- card del prodotto --}}
            @foreach ($category -> products as $product)
                <div class="card" style="width: 18rem;">
                    <div class="card-body text-start">
                        <h5 class="card-title">{{ $product -> name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">CODE: {{ $product -> code }}</h6>
                        <p class="card-text">DESCRIPTION: {{ $product -> description ? $product -> description : 'Description not available'}}</p>
                        <span>Weight: {{ $product -> weight }}</span>
                        <br>
                        <span>Price: {{ $product -> price }}</span>
                    </div>
                </div>   
            @endforeach

        </div>

        <div class="card-footer text-muted text-start">
            <h6><strong>Info Category:</strong></h6>
            <span><strong>CODE:</strong> {{ $category -> code }}</span>
            <p><strong>DESCRIPTION:</strong> {{ $category -> description ? $category -> description : 'Description not available'}}</p>
        </div>

    </div>
    @endforeach

@endsection