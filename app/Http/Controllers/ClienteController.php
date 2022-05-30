<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['clientes']=Cliente::paginate(5);
        return view('cliente.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cliente.create');

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
            'NombreCliente'=>'required|string|max:50'
        ];
        $mensaje=[
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request,$validarCampos,$mensaje);


        $datosCliente = request()-> except('_token');

        Cliente::insert($datosCliente);

        return redirect('cliente')->with('mensaje','Cliente agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente=Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validarCampos = [
            'NombreCliente'=>'required|string|max:50'
        ];
        $mensaje=[
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request,$validarCampos,$mensaje);

        $datosCliente = request()-> except(['_token','_method']);

        Cliente::where('id','=',$id)->update($datosCliente);

        return redirect('cliente')->with('mensaje','Cliente actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cliente::destroy($id);

        return redirect('cliente')->with('mensaje','Cliente eliminada exitosamente');
    }
}
