@extends('layouts.main-layout')

@section('content')

    <h1 class="text-danger">EDIT SELECTED PRODUCT</h1>

    {{-- creo un bottone per far tornare l'utente alla pagina dei prodotti --}}
    <a href="{{ route('products') }}" class="btn btn-danger my-3">
        <i class="fa-solid fa-clipboard-list"></i>
        List Products
    </a>

    {{-- messaggi di errore --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- creo il form con cui andar a creare il nuovo elemento da inviare al database --}}
    <form method="POST" action="{{route('update.product', $product)}}" class="p-3">
        
        @csrf

        <div class="input-group my-2">
            <label for="name" class="input-group-text" id="basic-addon1">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $product -> name }}">
        </div>

        <div class="input-group my-2">
            <label for="description" class="input-group-text" id="basic-addon1">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $product -> description ? $product -> description : 'Description not available' }}">
        </div>

        <div class="input-group my-2">
            <label for="price" class="input-group-text" id="basic-addon1">Price</label>
            <input type="number" class="form-control" name="price" value="{{ $product -> price }}">
        </div>

        <div class="input-group my-2">
            <label for="weight" class="input-group-text" id="basic-addon1">Weight</label>
            <input type="number" class="form-control" name="weight" value="{{ $product -> weight }}">
        </div>

        <select name="typology_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Select Typology</option>
            @foreach ($typologies as $typology)
                <option value="{{$typology -> id}}"
                    @if ($product -> typology -> id == $typology -> id)
                        selected
                    @endif
                    >{{$typology -> name}}</option>
            @endforeach
        </select>

        <div class="card text-center my-5">
            <div class="card-header">
                <h4>Select Category</h4>
            </div>
            <div class="card-body d-flex flex-wrap gap-3">
                @foreach ($categories as $category)
                <div class="form-check">
                    <input name="categories[]" class="form-check-input" type="checkbox" value="{{ $category -> id }}" id="flexCheckIndeterminate"
                        @foreach ($product -> categories as $productCategory)
                            @if ($productCategory -> id == $category -> id)
                                checked
                            @endif
                        @endforeach
                    >
                    <label class="form-check-label" for="categories">
                        {{ $category -> name }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>

        <button class="btn btn-danger my-2" type="submit">
            <i class="fa-regular fa-pen-to-square"></i>
            Edit
        </button>
        
    </form>
    
@endsection