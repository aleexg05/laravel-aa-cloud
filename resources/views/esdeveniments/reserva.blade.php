    @extends('layouts.master')

    @section('title', 'Reserva esdeveniment')

    @section('content')
    <div class="col-sm-8">
        <h2 class="mb-4">Dades de la reserva</h2>

        <table class="table table-bordered">
            <tr>
                <th>Títol</th>
                <td>{{ $esdeveniment->nom }}</td>
            </tr>
            <tr>
                <th>Data</th>
                <td>{{ $esdeveniment->data }}</td>
            </tr>
            <tr>
                <th>Hora</th>
                <td>{{ $esdeveniment->hora }}</td>
            </tr>
        </table>

        <div class="mt-3">
            
    <form action="{{ route('esdeveniments.guardarReserva', ['id' => $esdeveniment->id]) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-success">Acceptar</button>
</form>

            <a href="{{ route('esdeveniments.show', ['id' => $esdeveniment->id]) }}" class="btn btn-default">Cancelar</a>

        </div>
    </div>
    @stop
