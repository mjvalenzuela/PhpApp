@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilo.css"> --}}
    </head>

    <body>

        <div class="container">
            <h1>Administrar Categorías</h1>
            <hr>
          </div>

        <div class="container">
                <div class="card-columns">
                    <div class="card" style="width: 23rem;">
                        <a href="{{route('aplicacion.index')}}"><img class="card-img-top img-fluid" src="{{url('/images/aplicacion.png')}}"></a>
                        <div class="card-block">
                            {{-- <h5 class="card-title"><b>Aplicaciones</b></h5> --}}
                            <p class="card-text">Cada Activo debe estar asociado a una única aplicación para que sea de fácil búsqueda de la solución requerida.</p>
                            {{-- <a href="{{route('aplicacion.index')}}" class="btn btn-primary btn-block">Administrar</a> --}}
                        </div>
                    </div>

                    <div class="card" style="width: 23rem;">
                        <img class="card-img-top img-fluid" src="{{url('/images/prioridad.png')}}" alt="Card image cap">
                        <div class="card-block">
                            {{-- <h5 class="card-title"><b>Prioridades</b></h5> --}}
                            <p class="card-text">Las Prioridades permiten identificar si el Activo aplica a una solución de alta, medio o baja prioridad.</p>
                            {{-- <a href="#" class="btn btn-primary btn-block">Administrar</a> --}}
                        </div>
                    </div>

                    {{-- <div class="card" style="width: 23rem;">
                        <img class="card-img-top img-fluid" src="{{url('/images/conocimiento.png')}}" alt="Card image cap">
                        <div class="card-block">
                        </div>
                    </div> --}}

                    <div class="card" style="width: 23rem;">
                        <a href="{{route('solucion.index')}}"><img class="card-img-top img-fluid" src="{{url('/images/solucion.png')}}" alt="Card image cap"></a>
                        <div class="card-block">
                            {{-- <h5 class="card-title"><b>Tipos de Solución</b></h5> --}}
                            <p class="card-text">Para cada Activo creado existe un tipo de solución que permite identificar fácilmente su ejecución.</p>
                            {{-- <a href="#" class="btn btn-primary btn-block">Administrar</a> --}}
                        </div>
                    </div>

                                        {{-- <div class="card" style="width: 23rem;">
                        <img class="card-img-top img-fluid" src="{{url('/images/conocimiento.png')}}" alt="Card image cap">
                        <div class="card-block">
                        </div>
                    </div> --}}

                    <div class="card" style="width: 23rem;">
                        <img class="card-img-top img-fluid" src="{{url('/images/impacto.png')}}" alt="Card image cap">
                        <div class="card-block">
                            {{-- <h5 class="card-title"><b>Impactos</b></h5> --}}
                            <p class="card-text">Los Activos aplican para dar soluciones a problemas con alto, medio o bajo Impacto.</p>
                            {{-- <a href="#" class="btn btn-primary btn-block">Administrar</a> --}}
                        </div>
                    </div>



                    <div class="card" style="width: 23rem;">
                        <a href="{{route('cliente.index')}}"><img class="card-img-top img-fluid" src="{{url('/images/cliente.png')}}"></a>
                        <div class="card-block">
                            {{-- <h5 class="card-title"><b>Clientes</b></h5> --}}
                            <p class="card-text">Administre los Clientes que estan asociados a cada Activo para conocer las soluciones más comunes a cada uno.</p>
                            {{-- <a href="{{route('cliente.index')}}" class="btn btn-primary btn-block">Administrar</a> --}}
                        </div>
                    </div>
                </div>
        </div>
        <script src="app.js" charset="utf-8"></script>
    </body>
    </html>
@endsection
