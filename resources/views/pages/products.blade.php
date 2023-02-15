@extends('layouts.main-layout')

@section('content')
    <h1 class="text-danger">All Products</h1>

    {{-- creo un bottone per far tornare l'utente alla home page --}}
    <a href="{{ route('home') }}" class="btn btn-danger my-3">HOME</a>

    {{-- creo le card per stampare le info sui prodotti --}}
    <div class="d-flex flex-wrap gap-3">

        {{-- card del prodotto --}}
        @foreach ($products as $product)
            <div class="card" style="width: 18rem;">
                <div class="card-body text-start">
                    <h5 class="card-title">{{ $product -> name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">CODE: {{ $product -> code }}</h6>
                    <p class="card-text">DESCRIPTION: {{ $product -> description ? $product -> description : 'Description not available'}}</p>
                    <span>Weight: {{ $product -> weight }}</span>
                    <br>
                    <span>Typology: {{ $product -> typology -> name }}</span>
                    <br>
                    <span>Digital: {{ $product -> typology -> digital ? 'YES' : 'NO' }}</span>
                    <br>
                    <span>Price: {{ $product -> price }}</span>
                    <br>
                    {{-- link per eliminare e modificare il prodotto --}}
                    <a href="{{route('delete.product', $product)}}" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </div>
                {{-- <a href="{{route('edit.product', $product)}}" class="btn btn-danger">
                    Edit Project
                </a> --}}
            </div>   
        @endforeach

    </div>
@endsection