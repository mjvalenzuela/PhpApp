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

            <form action="{{ url('/aplicacion/' . $aplicacion->id) }}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
                @include('aplicacion.form', ['modo' => 'Editar']);
            </form>
        </div>
    </body>

    </html>
@endsection
