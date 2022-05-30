<?php

namespace App\Http\Controllers;

use App\Models\Aplicacion;
use Illuminate\Http\Request;

class AplicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['aplicacions']=Aplicacion::paginate(5);
        return view('aplicacion.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('aplicacion.create');
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
            'NombreAplicacion'=>'required|string|max:50'
        ];
        $mensaje=[
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request,$validarCampos,$mensaje);


        $datosAplicacion = request()-> except('_token');

        Aplicacion::insert($datosAplicacion);

        return redirect('aplicacion')->with('mensaje','Aplicación agregada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function show(Aplicacion $aplicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $aplicacion=Aplicacion::findOrFail($id);
        return view('aplicacion.edit', compact('aplicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validarCampos = [
            'NombreAplicacion'=>'required|string|max:50'
        ];
        $mensaje=[
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request,$validarCampos,$mensaje);

        $datosAplicacion = request()-> except(['_token','_method']);

        Aplicacion::where('id','=',$id)->update($datosAplicacion);


        return redirect('aplicacion')->with('mensaje','Aplicacion actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Aplicacion::destroy($id);

        return redirect('aplicacion')->with('mensaje','Aplicacion eliminada exitosamente');
    }
}
