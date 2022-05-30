@extends('layouts.app')

@section('content')
    <div class="container">

        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <a href="{{ url('solucion/create') }}" class="btn btn-primary">Agregar nueva Solución</a>
        <br>
        <br>

        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Nombre de la Solucion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solucions as $solucion)
                    <tr>
                        <td>{{ $solucion->id }}</td>
                        <td>{{ $solucion->NombreSolucion }}</td>

                        <td>

                            <a href="{{ url('/solucion/' . $solucion->id . '/edit') }}" class="btn btn-warning">
                                Editar
                            </a>
                            <form action="{{ url('/solucion/' . $solucion->id) }}" method="POST" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('Está seguro de borrar la solucion?')"
                                    value="borrar" class="btn btn-danger">
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {!!$solucions->links()!!}
    </div>
@endsection
