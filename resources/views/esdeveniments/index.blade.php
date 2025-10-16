@extends('layouts.master')

@section('title','Llistat Esdeveniments')

@section('content')

<h1>Llistat d'Esdeveniments per Categoria</h1>  

@foreach($categories as $categoria)
    <h2>{{ $categoria->name }}</h2>

    <div class="row">
        @foreach($categoria->esdeveniments as $esdeveniment)
            @php
                $reserves = $esdeveniment->usuaris()->count();
            @endphp

            @if ($reserves < $esdeveniment->num_max_assistents)
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <a href="{{ route('esdeveniments.show', ['id' => $esdeveniment->id]) }}">
                        <img src="{{ $esdeveniment->imatge }}" style="height:200px " />
                        <h4 style="min-height:45px;margin:5px 0 10px 0">
                            {{ $esdeveniment->nom }} <br>  
                            {{ $esdeveniment->data }} <br> 
                            {{ $esdeveniment->hora }}
                        </h4>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
@endforeach

@stop
