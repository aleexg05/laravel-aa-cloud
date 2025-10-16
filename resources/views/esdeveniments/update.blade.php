@extends('layouts.master')

@section('title', 'update')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center my-4">Modificar Esdeveniment</h2>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nom:</strong> {{ $input['nom'] }}</li>
                 <li class="list-group-item"><strong>Id Categoria:</strong> {{ $input['categorie_id'] }}</li>
                    <li class="list-group-item"><strong>Descripció:</strong> {{ $input['descripcio'] }}</li>
                <li class="list-group-item"><strong>Data:</strong> {{ $input['data'] }}</li>
                <li class="list-group-item"><strong>Hora:</strong> {{ $input['hora'] }}</li>
                <li class="list-group-item"><strong>Numero màxim assistents:</strong>{{ $input['num_max_assistents'] }}</li>
                <li class="list-group-item"><strong>Edat mínima:</strong> {{ $input['edat_minima'] }}</li>
                <li class="list-group-item"><strong>Imatge:</strong> <img src="{{ $input['imatge'] }}" alt="Imatge" class="img-fluid"></li>
               
            </ul>    
        </div>
    </div>
@endsection
