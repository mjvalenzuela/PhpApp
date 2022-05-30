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



        <a href="{{ url('activo/create') }}" class="btn btn-primary">Agregar nuevo activo</a>
        <br>
        <br>


        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Causa</th>
                    {{-- <th>Solución</th> --}}

                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activos as $activo)
                    <tr>
                        <td>{{ $activo->id }}</td>
                        <td>{{ $activo->TitleActive }}</td>
                        <td>{{ $activo->DescriptionActive }}</td>
                        <td>{{ $activo->CauseActive }}</td>
                        {{-- <td>{{ $activo->SolutionActive }}</td> --}}

                        <td>

                            <a href="{{ url('/activo/' . $activo->id . '/edit') }}" class="btn btn-warning">
                                Editar
                            </a>
                            <form action="{{ url('/activo/' . $activo->id) }}" method="POST" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('Está seguro de borrar el activo?')"
                                    value="borrar" class="btn btn-danger">
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {!!$activos->links()!!}
    </div>
@endsection
