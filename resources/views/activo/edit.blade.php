@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ url('/activo/' . $activo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('activo.form', ['modo' => 'Editar']);


        </form>
    </div>
@endsection
