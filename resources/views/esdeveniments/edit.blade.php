@extends('layouts.master')

@section('title','Modificar esdeveniment')
@section('content')
  @if(auth()->check() && auth()->user()->rol === 'admin')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2 class="text-center my-4">Modificar esdeveniment</h2>

       <form action="{{ route('esdeveniments.update', ['id' => $esdeveniment->id]) }}" method="POST">
    @csrf
    @method('PUT')
        <div>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ $esdeveniment->nom }}" required>
        </div>
      <label for="categorie_id">Categoria:</label>
        <select id="categorie_id" name="categorie_id" class="form-control" required>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}" {{ $esdeveniment->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}</option>
            @endforeach
        </select>
        <div>
            <label for="descripcio">Descripció:</label> 
            <input type="text" id="descripcio" name="descripcio" class="form-control"  value="{{ $esdeveniment->descripcio }}"  required>
        </div>
        <div>
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" class="form-control" value="{{ $esdeveniment->data }}"  required>
        </div>
        <div>
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" class="form-control" value="{{ $esdeveniment->hora }}"  required>
        </div>
      
        <div>
            <label for="num_max_assistents">Numero màxim assistents::</label>
            <input type="text" id="num_max_assistents" name="num_max_assistents" class="form-control" value="{{ $esdeveniment->num_max_assistents }}"  required>
        </div>
        <div>
            <label for="edat_minima">Edat mínima::</label>
            <input type="text" id="edat_minima" name="edat_minima" class="form-control"  value="{{ $esdeveniment->edat_minima }}" required></input>
        </div>
        <div>
            <label for="imatge">Imatge:</label>
            <input type="text" id="imatge" name="imatge" class="form-control" value="{{ $esdeveniment->imatge }}"  required></input>
        </div>
        
        <br>
       <button type="submit" class="btn btn-primary">Modificar esdeveniment</button>

        </form>
    </div>
</div>
@else

        <h3>Accés denegat</h3>
        <p>Només l’administrador pot accedir a aquesta pàgina.</p>
   
@endif
@stop
