<h1>{{ $modo }} Activo</h1>

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
        <label for="Titulo">Título</label>
        <input type="text" class="form-control" name="TitleActive"
            value="{{ isset($activo->TitleActive) ? $activo->TitleActive : old('TitleActive') }}" id="TitleActive">
    </div>
</div>

<div class="form-group">
    <div class="col-xs-5">
        <label for="Descripcion">Descripción</label>

        <input type="text" class="form-control" name="DescriptionActive"
            value="{{ isset($activo->DescriptionActive) ? $activo->DescriptionActive : old('DescriptionActive') }}" id="DescriptionActive">
    </div>
</div>

<div class="form-group">
    <label for="Causa">Causa</label>
    <input type="text" class="form-control" name="CauseActive"
        value="{{ isset($activo->CauseActive) ? $activo->CauseActive : old('CauseActive') }}" id="CauseActive">
</div>

<div class="form-group">
    <label for="Solucion">Solución</label>
    <input type="text" class="form-control" name="SolutionActive"
        value="{{ isset($activo->SolutionActive) ? $activo->SolutionActive : old('SolutionActive') }}" id="SolutionActive">
</div>

<div class="form-group">
    <label for="Archivo">Adjunto</label>
    {{ isset($activo->Adjunto) ? $activo->Adjunto : '' }}
    <input type="file" class="form-control" name="Adjunto" value="" id="Adjunto"><br>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('activo/') }}">Regresar</a>
