<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OtrasCaracteristicas;

class CaracteristicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
    public function create()
    {
        //
    }*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Create a new otras_caracteristicas instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $caracteristica = new OtrasCaracteristicas;
        $caracteristica->nombre = $request->input('nombre_caracteristica');
        $caracteristica->descripcion = $request->input('descripcion_caracteristica');
        $caracteristica->save();

        //return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get all items from storage.
     * @return \Illuminate\Http\Response
     */
    public function get_data_ajax()
    {
        $caracteristicas = OtrasCaracteristicas::all();
        return response()->json($caracteristicas);
    }
}
