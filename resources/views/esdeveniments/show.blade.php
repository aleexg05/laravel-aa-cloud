@extends('layouts.master')

@section('title', 'Vista detall Esdeveniment')

@section('content')

@php
    $reserves = $esdeveniment->usuaris()->count();
@endphp

<div class="row">
    <div class="col-sm-4">
        <img src="{{ $esdeveniment->imatge }}" alt="Imatge">
    </div>

    <div class="col-sm-8">
        <h1>Títol: {{ $esdeveniment->nom }}</h1>
        <br>
        <h2>Data: {{ $esdeveniment->data }}</h2>
        <br>
        <h2>Hora: {{ $esdeveniment->hora }}</h2>
        <br>
        <p>Descripció: {{ $esdeveniment->descripcio }}</p>
        <br>
        <p>Categoria: {{ $esdeveniment->categorie->name }}</p>
        <p>Edat mínima: {{ $esdeveniment->edat_minima }}</p>
        <br>

        <p>Places disponibles: {{ $esdeveniment->num_max_assistents - $reserves }}</p>

        @if ($reserves < $esdeveniment->num_max_assistents)
            @if (
                auth()->check() &&
                auth()->user()->data_naixement &&
                (new DateTime(auth()->user()->data_naixement))->diff(new DateTime())->y >= $esdeveniment->edat_minima
            )
                <form action="{{ route('esdeveniments.reserva', ['id' => $esdeveniment->id]) }}" method="get" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-success">Reserva plaça</button>
                </form>
            @else
                <div>
                    No pots reservar aquest esdeveniment.
                </div>
            @endif
        @else
            <button class="btn btn-secondary" disabled>No disponible</button>
        @endif

        @if(auth()->check() && auth()->user()->rol === 'admin')
            <form action="{{ route('esdeveniments.edit', ['id' => $esdeveniment->id]) }}" method="GET" style="display: inline;">
                <button type="submit" class="btn btn-warning">Editar esdeveniment</button>
            </form>
            <form action="{{ route('esdeveniments.destroy', ['id' => $esdeveniment->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        @endif

        <br>
        <a href="{{ route('esdeveniments.index') }}" class="btn btn-default" style="margin-top: 10px">Tornar al llistat</a>
    </div>
</div>

<style>
    img {
        width: 100%;
        height: 100%;
    }
    .btn-warning {
        color: white;
    }
    .btn-default {
        border: solid 1px grey;
        color: black;
    }
</style>

@stop
