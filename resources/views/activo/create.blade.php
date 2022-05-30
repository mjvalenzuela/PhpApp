@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ url('/activo') }}" method="POST" enctype="multipart/form-data">

            @csrf
            @include('activo.form', ['modo' => 'Crear']);

        </form>
    </div>
@endsection
