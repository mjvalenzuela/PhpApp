<?php

namespace App\Http\Controllers;

use App\Models\solucion;
use Illuminate\Http\Request;

class SolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['solucions']=Solucion::paginate(5);
        return view('solucion.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('solucion.create');
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
            'NombreSolucion'=>'required|string|max:50'
        ];
        $mensaje=[
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request,$validarCampos,$mensaje);


        $datosSolucion = request()-> except('_token');

        Solucion::insert($datosSolucion);

        return redirect('solucion')->with('mensaje','Solución agregada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\solucion  $solucion
     * @return \Illuminate\Http\Response
     */
    public function show(solucion $solucion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\solucion  $solucion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $solucion=Solucion::findOrFail($id);
        return view('solucion.edit', compact('solucion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\solucion  $solucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validarCampos = [
            'NombreSolucion'=>'required|string|max:50'
        ];
        $mensaje=[
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request,$validarCampos,$mensaje);

        $datosSolucion = request()-> except(['_token','_method']);

        Solucion::where('id','=',$id)->update($datosSolucion);

        return redirect('solucion')->with('mensaje','Solucion actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\solucion  $solucion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Solucion::destroy($id);

        return redirect('solucion')->with('mensaje','Solucion eliminada exitosamente');
    }
}
