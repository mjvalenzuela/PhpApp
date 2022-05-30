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

        <a href="{{ url('cliente/create') }}" class="btn btn-primary">Agregar nuevo Cliente</a>
        <br>
        <br>

        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Nombre del Cliente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->NombreCliente }}</td>

                        <td>

                            <a href="{{ url('/cliente/' . $cliente->id . '/edit') }}" class="btn btn-warning">
                                Editar
                            </a>
                            <form action="{{ url('/cliente/' . $cliente->id) }}" method="POST" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('Está seguro de borrar el cliente?')"
                                    value="borrar" class="btn btn-danger">
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {!!$clientes->links()!!}
    </div>
@endsection
