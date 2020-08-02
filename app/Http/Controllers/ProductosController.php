<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OtrasCaracteristicas;
use App\ProductosCaracteristicas;
use App\Productos;
use App\PresentacionesProducto;
use App\Http\Requests\StoreProduct;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caracteristicas = OtrasCaracteristicas::all();
        return view('admin.productos')->with('caracteristicas', $caracteristicas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        
        /*$array_validaciones= $this::create_validation($request);
        $validatedData = $request->validate($array_validaciones);*/

        /*$array_validaciones = [
            'nombre_producto'       =>'required|unique:productos,nombre|max:255',
            'marca'                 =>'required|max:255',
            'descripcion_producto'  =>'required|max:700'
        ];

        $carac = $request->input('numCaracteristicas');
        if($carac>0){
            $array_validaciones['select_caracteristicas.*'] = 'required|exists:App\OtrasCaracteristicas,id_caract';
            $array_validaciones['input_val_caract.*'] = 'required|max:255';
        }

        $validatedData = $request->validate($array_validaciones);*/

        $validated = $request->validated();

        $unidad = $request->input('products');
        //$unidad = $unidad[0];

        return $unidad;

        $producto = new Productos;
        $producto->nombre = $request->input('nombre_producto');
        $producto->marca = $request->input('marca');
        $producto->descripcion = $request->input('descripcion_producto');
        $producto->save();
        $producto->refresh();

        $num_c = $request->input('numCaracteristicas');
        if($num_c>0){
            for($i = 0; $i<$num_c; $i++){
                $prod_caract = new ProductosCaracteristicas;
                $prod_caract->id_product = $producto->id_product;
                $prod_caract->id_caract  = $request->input("select_caracteristicas.".$i);
                $prod_caract->valor_Caract = $request->input("input_val_caract.".$i);
                $prod_caract->save();
            }
            
        }

        return redirect('home');


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

    static function create_validation(Request $request){

        $array_validaciones = [
            'nombre_producto'       =>'required|unique:productos,nombre|max:255',
            'marca'                 =>'required|max:255',
            'descripcion_producto'  =>'required|max:700'
        ];

        $carac = $request->input('numCaracteristicas');
        if($carac>0){
            $array_validaciones['select_caracteristicas.*'] = 'required|exists:App\OtrasCaracteristicas,id_caract';
            $array_validaciones['input_val_caract.*'] = 'required|max:255';
        }

        return $array_validaciones;

        /*$validatedData = $request->validate([
            'numPresentaciones' => 'required|max:10|min:1',
            'numCaracteristicas' => 'required|max:20|min:0',
            'select_caracteristicas' => 'exists:states,abbreviation'
        ]);*/
    }

}
