<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['activos']=Activo::paginate(5);
        return view('activo.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('activo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validarCampos = [
            'TitleActive'=>'required|string|max:50',
            'DescriptionActive'=>'required|string|max:250',
            'CauseActive'=>'required|string|max:250',
            'SolutionActive'=>'required|string|max:250',
            'Adjunto'=>'required'
        ];
        $mensaje=[
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request,$validarCampos,$mensaje);


        //$datosActivo = request()-> all();
        $datosActivo = request()-> except('_token');
        if($request->hasFile('Adjunto')){
            $datosActivo['Adjunto']=$request->file('Adjunto')->store('uploads','public');
        }
        Activo::insert($datosActivo);
        //return response()->json($datosActivo);
        return redirect('activo')->with('mensaje','Activo agregado exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function show(Activo $activo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $activo=Activo::findOrFail($id);
        return view('activo.edit', compact('activo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validarCampos = [
            'TitleActive'=>'required|string|max:50',
            'DescriptionActive'=>'required|string|max:250',
            'CauseActive'=>'required|string|max:250',
            'SolutionActive'=>'required|string|max:250',

        ];
        $mensaje=[
            'required' => 'El :attribute es requerido'
        ];

        if($request->hasFile('Adjunto')){
            //$validarCampos = [ 'Adjunto'=>'required|mimes:jpg,png'];
            $mensaje=['Adjunto.required' => 'El :attribute es requerido'
            ];
        }

        $this->validate($request,$validarCampos,$mensaje);

        $datosActivo = request()-> except(['_token','_method']);

        if($request->hasFile('Adjunto')){
            $activo=Activo::findOrFail($id);
            Storage::delete('public/'.$activo->Adjunto);
            $datosActivo['Adjunto']=$request->file('Adjunto')->store('uploads','public');
        }

        Activo::where('id','=',$id)->update($datosActivo);
        $activo=Activo::findOrFail($id);
        //return view('activo.edit', compact('activo'));

        return redirect('activo')->with('mensaje','Activo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
            $activo=Activo::findOrFail($id);

            if(Storage::delete('public/'.$activo->Adjunto)){
                Activo::destroy($id);
            }
        return redirect('activo')->with('mensaje','Activo eliminado exitosamente');
    }
}
