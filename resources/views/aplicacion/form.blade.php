<h1>{{ $modo }} Aplicación</h1>

@if (count($errors) > 0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group form-group-lg">
    <div class="col-xs-4">
        <label for="NombreAplicacion">Nombre Aplicación</label>
        <input type="text" class="form-control" name="NombreAplicacion" style="width: 60%"
            value="{{ isset($aplicacion->NombreAplicacion) ? $aplicacion->NombreAplicacion : old('NombreAplicacion') }}" id="NombreAplicacion">
            <br>
    </div>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('aplicacion/') }}">Regresar</a>
