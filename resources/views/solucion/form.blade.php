<h1>{{ $modo }} Solución</h1>

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
        <label for="NombreSolucion">Nombre Solucion</label>
        <input type="text" class="form-control" name="NombreSolucion"
            value="{{ isset($solucion->NombreSolucion) ? $solucion->NombreSolucion : old('NombreSolucion') }}" id="NombreSolucion">
    </div>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('solucion/') }}">Regresar</a>
