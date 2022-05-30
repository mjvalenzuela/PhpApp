<h1>{{ $modo }} Cliente</h1>

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
        <label for="NombreCliente">Nombre Cliente</label>
        <input type="text" class="form-control" name="NombreCliente"
            value="{{ isset($cliente->NombreCliente) ? $cliente->NombreCliente : old('NombreCliente') }}" id="NombreCliente">
    </div>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('cliente/') }}">Regresar</a>
