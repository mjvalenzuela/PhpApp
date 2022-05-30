@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">

        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <a href="{{ url('aplicacion/create') }}" class="btn btn-primary">Agregar nueva Aplicación</a>
        <br>
        <br>

        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Nombre Aplicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aplicacions as $aplica)
                    <tr>
                        <td>{{ $aplica->id }}</td>
                        <td>{{ $aplica->NombreAplicacion }}</td>

                        <td>

                            <a href="{{ url('/aplicacion/' . $aplica->id . '/edit') }}" class="btn btn-warning">
                                Editar
                            </a>
                            <form action="{{ url('/aplicacion/' . $aplica->id) }}" method="POST" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('Está seguro de borrar la aplicación?')"
                                    value="borrar" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {!!$aplicacions->links()!!}
    </div>
</body>
</html>

@endsection
