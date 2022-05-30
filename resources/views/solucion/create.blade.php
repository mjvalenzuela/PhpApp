@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ url('/solucion') }}" method="POST">

            @csrf
            @include('solucion.form', ['modo' => 'Crear']);

        </form>
    </div>
@endsection
