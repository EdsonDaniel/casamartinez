<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OtrasCaracteristicas;
use App\ProductosCaracteristicas;
use App\Productos;
use App\User;
use App\PresentacionesProducto;
use App\TodosProductos;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\StorePresentacion;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = auth()->user();
        /*$permissions = $user->getPermissionsViaRoles()
                            ->where('name', 'users.list')
                            ->first();
        */
        //$tiene_permiso = $user->can('users.list');
        //return $tiene_permiso;
        return view('admin.listaProductos');//->with('user',$user->can('users.list'));
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

        $producto = new Productos;
        $producto->nombre = $validated['nombre_producto'];
        $producto->marca = $validated['marca'];
        $producto->descripcion = $validated['descripcion_producto'];
        if ($request->hasFile('imagen')) {
            $producto->foto_url = $request->imagen->store('/img/fotos-productos','public');
        }else $producto->foto_url = "img/logo-casa-martinez.jpg";
        $producto->save();
        $producto->refresh();

        $caracteristicas = $request->input('caracteristicas');//'caracteristicas');
        //return $caracteristicas;
        if(!is_null($caracteristicas))
            foreach ($caracteristicas as $carac) {
                if($carac["id"] != '0' && !is_null($carac["value"])){
                    $prod_caract = new ProductosCaracteristicas;
                    //return $carac;
                    $prod_caract->prod_id  = $producto->id;
                    $prod_caract->carac_id = $carac["id"];
                    $prod_caract->valor    = $carac["value"];
                    try{
                        $prod_caract->save();
                        } catch(\Illuminate\Database\QueryException $e){}
                }
            }

        $presentaciones = $validated['products'];

        foreach ($presentaciones as $presentacion) {
            $url_foto;
            if ($presentacion['img']) {
                $url_foto = $presentacion['img']->store('/img/fotos-productos','public');
            }
            try{
                $presentacion = PresentacionesProducto::create([
                    'contenido' => $presentacion['contenido'], 
                    'unidad_c' => $presentacion['unidad_c'], 
                    'precio_consumidor' => $presentacion['pre_consu'], 
                    'precio_distribuidor' => $presentacion['pre_distri'],
                    'precio_restaurant' => $presentacion['pre_rest'], 
                    //'precio_promocion' => $presentacion['pre_promo'],
                    'costo_adquisicion' => $presentacion['costo'], 
                    'estado' => $presentacion['estado'], 
                    'stock' => $presentacion['stock'], 
                    'stock_min' => $presentacion['stock_min'], 
                    'peso' => $presentacion['peso'], 
                    'alto' => $presentacion['alto'], 
                    'ancho' => $presentacion['ancho'], 
                    'largo' => $presentacion['largo'],
                    'foto_url' => $url_foto,
                    'producto_id' => $producto->id
                ]);
            }
            catch(\Illuminate\Database\QueryException $e){
                $validator->errors()->add('contenido',
                 'Se intentó agregar una presentación duplicada. (Presentación '
                 .$presentacion['contenido'].' '
                 .$presentacion['unidad_c']. ') para el producto ('.$producto->nombre.')');
                return redirect('/admin/productos/detalles/'.$producto->id)
                        ->withErrors($validator)
                        ->withInput();
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
        $producto = Productos::find($id);
        $presentaciones = PresentacionesProducto::where('producto_id',$id)->get();
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
        $producto = Productos::findOrFail($id);
        $nombre = $request->input('nombre_producto');

        $validate = $request->validate([
            'descripcion_producto' => ['required','max:255'],
            'marca'                => ['required'],
            'nombre'               => ['required']
        ]);
        
        if($nombre != $producto->nombre){
            $request->validate([
                'nombre_producto'=>['unique:productos,nombre','max:200'], 
            ]);
            $producto->nombre = $nombre;
        }
        
        $producto->save();

        return redirect('/admin/productos/detalles/'.$id);
    }

    public function updateCaractProduct(Request $request, $id)
    {
        //$validated = $request->validated();
        $producto = Productos::findOrFail($id);
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
        $presentacion = PresentacionesProducto::findOrFail($id_pres);
        $validator = Validator::make($request->all(), [
            'costo'      =>['nullable', 'numeric'],
            'contenido'  =>['required', 'numeric', 'min:1'],
            'pre_consu'  =>['required', 'numeric', 'min:0'],
            'pre_distri' =>['required', 'numeric', 'min:0'],
            'pre_rest'   =>['required', 'numeric', 'min:0'],
            'stock'      =>['required', 'integer', 'min:0'],
            'stock_min'  =>['required', 'integer', 'min:0'],
            'alto'       =>['nullable', 'numeric', 'min:0'],
            'ancho'      =>['nullable', 'numeric', 'min:0'],
            'largo'      =>['nullable', 'numeric', 'min:0'],
            'peso'       =>['nullable', 'numeric', 'min:0'],
            'unidad_c'   =>['required', Rule::in(['ml', 'g','l','kg'])],
            'estado'     =>['required', 'integer','min:-1', 'max:3'],
        ]);

        if ($validator->fails()) {
            return redirect('/admin/productos/detalles/'.$producto->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $producto = $presentacion->producto;

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
        
        try{
            $presentacion->save();
        }catch(\Illuminate\Database\QueryException $e){
            $validator->errors()->add('contenido',
             'Ya existe la presentación ('.$presentacion->contenido.' '
                 .$presentacion->unidad_c. ') para el producto ('.$producto->nombre.')');
            return redirect('/admin/productos/detalles/'.$producto->id)
                        ->withErrors($validator)
                        ->withInput();

        }
        return redirect('/admin/productos/detalles/'.$producto->id);

    }

    public function addPresentaciones(StorePresentacion $request, $id){
        $producto = Productos::find($id);
        
        $validated = $request->validated();
        $presentaciones = $validated['new_pres'];
        $validator = $request->getValidatorInstance();

        foreach ($presentaciones as $presentacion) {
            $url_foto;
            if ($presentacion['img']) {
                $url_foto = $presentacion['img']->store('/img/fotos-productos','public');
            }
            try{
                $presentacion = PresentacionesProducto::create([
                    'contenido' => $presentacion['contenido'], 
                    'unidad_c' => $presentacion['unidad_c'], 
                    'precio_consumidor' => $presentacion['pre_consu'], 
                    'precio_distribuidor' => $presentacion['pre_distri'],
                    'precio_restaurant' => $presentacion['pre_rest'], 
                    //'precio_promocion' => $presentacion['pre_promo'],
                    'costo_adquisicion' => $presentacion['costo'], 
                    'estado' => $presentacion['estado'], 
                    'stock' => $presentacion['stock'], 
                    'stock_min' => $presentacion['stock_min'], 
                    'peso' => $presentacion['peso'], 
                    'alto' => $presentacion['alto'], 
                    'ancho' => $presentacion['ancho'], 
                    'largo' => $presentacion['largo'],
                    'foto_url' => $url_foto,
                    'producto_id' => $producto->id
                ]);
            }
            catch(\Illuminate\Database\QueryException $e){
                $validator->errors()->add('contenido',
                 'Ya existe la presentación ('.$presentacion['contenido'].' '
                 .$presentacion['unidad_c']. ') para el producto ('.$producto->nombre.')');
                return redirect('/admin/productos/detalles/'.$producto->id)
                        ->withErrors($validator)
                        ->withInput();
            }
            
        }

        return redirect('/admin/productos/detalles/'.$producto->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPresentacion($id)
    {
        $presentacion = PresentacionesProducto::findOrFail($id);
        //$presentacion->delete();-
        //Código de estado para baja de presentaciones
        $presentacion->estado = -1;
        $presentacion->save();
        //return redirect('/admin/productos/');

    }

    public function uploadPresentacion($id)
    {
        $presentacion = PresentacionesProducto::findOrFail($id);
        $producto = Productos::findOrFail($presentacion->producto_id);
        if($producto->estado == -1){
            $producto->estado = 1;
            $producto->save();
        }
        //$presentacion->delete();-
        //Código de estado para baja de presentaciones
        $presentacion->estado = 1;
        $presentacion->save();
        //return redirect('/admin/productos/');

    }

    public function destroyProducto($id)
    {
        $producto = Productos::findOrFail($id);
        $presentaciones = $producto->presentaciones;
        foreach ($presentaciones as $presentacion) {
            if($presentacion->stock > 0){
                $presentacion->estado = -1;
                $presentacion->save();
            }
        }
        //$presentacion->delete();
        //Código de estado para baja de presentaciones
        $producto->estado = -1;
        $producto->save();

    }

    public function restoreProducto($id)
    {
        $producto = Productos::findOrFail($id);
        $presentaciones = $producto->presentaciones;
        foreach ($presentaciones as $presentacion) {
            if($presentacion->stock > 0){
                $presentacion->estado = 1;
                $presentacion->save();
            }
        }
        //$presentacion->delete();
        //Código de estado para baja de presentaciones
        $producto->estado = 1;
        $producto->save();

    }

    public function getDataAjax()
    {
        $productos = TodosProductos::where('estado_presentacion','>',0)->get();
        return response()->json($productos);
    }
    public function getDataAjaxBaja()
    {
        $productos = TodosProductos::where('estado_presentacion', '<', 1)->get();
        return response()->json($productos);
    }
}
