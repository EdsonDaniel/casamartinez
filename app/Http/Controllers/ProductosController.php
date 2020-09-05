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
        return view('admin.listaProductos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caracteristicas = OtrasCaracteristicas::all();
        return view('admin.addProductos')->with('caracteristicas', $caracteristicas);
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
        if ($request->hasFile('imagen')) {
            $producto->foto_url = $request->imagen->store('/img/fotos-productos','public');
        }else $producto->foto_url = "img/logo-casa-martinez.jpg";
        $producto->save();
        $producto->refresh();

        //return $producto;
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
                'largo' => $presentacion['largo'],
                'foto_url' => $presentacion['img'],
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
        return redirect('/admin/productos');
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
        $carac_actuales= $producto->caracteristicas();

        $caracteristicas = $request->input('carac_iniciales');//'caracteristicas');
        if(!is_null($caracteristicas))
        foreach ($caracteristicas as $carac) {
            try{
                if(!is_null($carac["value"]))
                    $carac_actuales->updateExistingPivot($carac["id"], ['valor' => $carac["value"]] );
                else $producto->caracteristicas()->detach($carac["id"]);
            }catch(\Illuminate\Database\QueryException $e){}
        }
        $producto->refresh();

        $caracteristicas = $request->input('caracteristicas');
        $carac_nuevas = $producto->caracteristicas();
        if(!is_null($caracteristicas))
        foreach ($caracteristicas as $carac) {
            try{
                if(!is_null($carac["value"]))
                    $carac_nuevas->attach($carac["id"], ['valor' => $carac["value"]] );
            }catch(\Illuminate\Database\QueryException $e){;}
        }
        //return $producto->caracteriticas;
        //$caract_existentes = $carrito->productos()->where('carrito_productos.id_pres_prod',$presentacion)->get();
        /* codigo opcional pero no eficiciente
        $carac = [];
        foreach ($caracteristicas as $caracteristica) {
            $carac[$caracteristica["id"]] = ['valor' => $caracteristica["value"]];
        }
        $producto->caracteristicas()->sync($carac);
        */

    }

    public function deleteCaractProduct(Request $request, $id)
    {
        $producto = Productos::find($id);
        $producto->caracteristicas()->detach();
    }

    public function updatePresentacion(Request $request, $id_pres)
    {
        $presentacion = PresentacionesProducto::find($id_pres);

        $presentacion->contenido = $request->input('contenido');
        $presentacion->unidad_c = $request->input('unidad_c');
        $presentacion->precio_consumidor = $request->input('pre_consu');
        $presentacion->precio_distribuidor = $request->input('pre_distri');
        $presentacion->precio_restaurant = $request->input('pre_rest');
        $presentacion->costo_adquisicion = $request->input('costo_adquisicion');
        $presentacion->estado = $request->input('estado');
        $presentacion->stock = $request->input('stock');
        $presentacion->stock_min = $request->input('stock_min');
        $presentacion->peso = $request->input('peso');
        $presentacion->alto = $request->input('alto');
        $presentacion->ancho = $request->input('ancho');
        $presentacion->largo = $request->input('largo');
        if ($request->hasFile('img_presentacion')) {
            $presentacion->foto_url = $request->img_presentacion->store('/img/fotos-productos','public');
        }
        $presentacion->save();

    }

    public function addPresentaciones(Request $request, $id){
        $producto = Productos::find($id);
        
        $presentaciones = $request->input('new_pres');
        return $presentaciones;
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
                'largo' => $presentacion['largo'],
                'foto_url' => $presentacion['img'],
                'id_product' => $producto->id_product
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPresentacion($id)
    {
        $presentacion = PresentacionesProducto::find($id);
        //$presentacion->delete();
        //Código de estado para baja de presentaciones
        $presentacion->estado = -1;
        $presentacion->save();
        //return redirect('/admin/productos/');

    }

    public function destroyProducto($id)
    {
        $producto = Productos::find($id);
        //$presentacion->delete();
        //Código de estado para baja de presentaciones
        $producto->estado = -1;
        $producto->save();

    }

    public function getDataAjax()
    {
        $productos = TodosProductos::all();
        return response()->json($productos);
    }
}
