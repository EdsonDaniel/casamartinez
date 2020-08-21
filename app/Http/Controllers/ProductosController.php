<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OtrasCaracteristicas;
use App\ProductosCaracteristicas;
use App\Productos;
use App\PresentacionesProducto;
use App\TodosProductos;
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
       
        $validated = $request->validated();
        //$unidad = $request->input('products');

        $producto = new Productos;
        $producto->nombre = $validated['nombre_producto'];
        $producto->marca = $validated['marca'];
        $producto->descripcion = $validated['descripcion_producto'];
        $producto->save();
        $producto->refresh();
        
        $presentaciones = $validated['products'];
        $presentacion;

        for($i=0; $i<$validated['numPresentaciones']; $i++){
            $presentacion = $presentaciones['presentacion'.($i+1)];
            $presentacion = PresentacionesProducto::create([
                'contenido' => $presentacion['contenido'], 
                'unidad_c' => $presentacion['unidad_c'], 
                'precio_consumidor' => $presentacion['pre_consu'], 
                'precio_distribuidor' => $presentacion['pre_distri'],
                'precio_restaurant' => $presentacion['pre_rest'], 
                'precio_promocion' => $presentacion['pre_promo'],
                'costo_adquisicion' => $presentacion['costo'], 
                'estado' => $presentacion['estado'], 
                'stock' => $presentacion['stock'], 
                'stock_min' => $presentacion['stock_min'], 
                'peso' => $presentacion['peso'], 
                'alto' => $presentacion['alto'], 
                'ancho' => $presentacion['ancho'], 
                'id_product' => $producto->id_product
            ]);
        }

        //return $presentacion;

        $num_c = $request->input('numCaracteristicas');
        //return $carac;
        for($i = 0; $i<$num_c; $i++){
            if($request->input("caracteristicas.caracteristica".($i+1).".id") >0){
                $prod_caract = new ProductosCaracteristicas;
                $prod_caract->id_product = $producto->id_product;
                $prod_caract->id_caract  = $request->input("caracteristicas.caracteristica".($i+1).".id");
                $prod_caract->valor = $request->input("caracteristicas.caracteristica".($i+1).".value");
                try{
                    $prod_caract->save();
                } catch(Exception $e){}
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
        $producto = Productos::where('id_product',$id)->take(1)->first();
        $presentaciones = PresentacionesProducto::where('id_product',$id)->get();
        $caracteristicas = Productos::find($id)->caracteristicas()->orderBy('nombre')->get();
        $all_caract = OtrasCaracteristicas::all();
             return view('admin.detalle_producto',
            ['producto' => $producto, 'presentaciones' => $presentaciones, 'carac' => $caracteristicas, 'all_caract' => $all_caract]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id)
    {
        $producto = Productos::find($id);
        $producto->nombre = $request->input('nombre_producto');
        $producto->marca = $request->input('marca');
        $producto->descripcion = $request->input('descripcion_producto');
        $producto->save();

        return redirect('/admin/productos/detalles/'.$id);
    }

    public function updateCaractProduct(Request $request, $id)
    {
        //$validated = $request->validated();
        $producto = Productos::find($id);

        $caracteristicas = $request->input();
        return $caracteristicas;
        $carac = [];
        foreach ($caracteristicas as $caracteristica) {
            $carac[$caracteristica["id"]] = ['valor' => $caracteristica["value"]];
        }
        $producto->caracteristicas()->sync($carac);

    }

    public function updatePresentation(StoreProduct $request, $id)
    {
        $producto = Productos::find($id);
        $producto->nombre = $request->input('nombre');
        $producto->marca = $request->input('marca');
        $producto->descripcion = $request->input('descripcion_producto');
        $producto->save();
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

    public function getDataAjax()
    {
        $productos = TodosProductos::all();
        return response()->json($productos);
    }
}
