@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ url('/solucion/' . $solucion->id) }}" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            @include('solucion.form', ['modo' => 'Editar']);
        </form>
    </div>
@endsection
