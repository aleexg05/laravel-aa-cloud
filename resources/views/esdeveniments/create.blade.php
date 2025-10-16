@extends('layouts.master')

@section('title','Afegir esdeveniments')
@section('content')
  @if(auth()->check() && auth()->user()->rol === 'admin')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2 class="text-center my-4">Alta d'esdeveniments</h2>

        <form action="{{ route('esdeveniments.store') }}" method="POST">  
        @csrf
        @method('POST')
        <div>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" class="form-control" required>
        </div>
      <label for="categorie_id">Categoria:</label>
        <select id="categorie_id" name="categorie_id" class="form-control" required>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
            @endforeach
        </select>
        <div>
            <label for="descripcio">Descripció:</label> 
            <input type="text" id="descripcio" name="descripcio" class="form-control" required>
        </div>
        <div>
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" class="form-control" required>
        </div>
        <div>
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" class="form-control" required>
        </div>
      
        <div>
            <label for="num_max_assistents">Numero màxim assistents::</label>
            <input type="text" id="num_max_assistents" name="num_max_assistents" class="form-control" required>
        </div>
        <div>
            <label for="edat_minima">Edat mínima::</label>
            <input type="text" id="edat_minima" name="edat_minima" class="form-control" required></input>
        </div>
        <div>
            <label for="imatge">Imatge:</label>
            <input type="text" id="imatge" name="imatge" class="form-control" required></input>
        </div>
     
        
        
        <br>
        <button type="submit">Afegir esdeveniment</button>

        </form>
    </div>
</div>
@else

        <h3>Accés denegat</h3>
        <p>Només l’administrador pot accedir a aquesta pàgina.</p>
   
@endif
@stop
