<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntradasController extends Controller
{
    public function index()
    {
        return view('admin.listaEntradas');
    }
    public function create()
    {
        return view('admin.addEntrada');
    }
    public function store(Request $request)
    {
        
    }
    public function show($id)
    {
        $entrada = Productos::find($id);
        $presentaciones = PresentacionesProducto::where('producto_id',$id)->get();
        $caracteristicas = Productos::find($id)->caracteristicas()->orderBy('nombre')->get();
        $all_caract = OtrasCaracteristicas::all();
             return view('admin.detalle_producto',
            ['producto' => $producto, 'presentaciones' => $presentaciones, 'carac' => $caracteristicas, 'all_caract' => $all_caract]);
    }
    public function edit($id)
    {
        
    }

    public function updateProduct(Request $request, $id)
    {
        $entrada = Productos::findOrFail($id);

        $validate = $request->validate([
            'descripcion_producto' => ['required','max:255'],
            'marca'                => ['required'],
            'nombre_producto'      => ['required']
        ]);

        $nombre = $request->input('nombre_producto');
        
        if($nombre != $producto->nombre){
            $request->validate([
                'nombre_producto'=>['unique:productos,nombre','max:200'], 
            ]);
            $producto->nombre = $nombre;
        }
        
        $producto->save();

        return redirect('/admin/productos/detalles/'.$id);
    }
    public function destroyPresentacion($id)
    {
        $presentacion = PresentacionesProducto::findOrFail($id);
        //$presentacion->delete();-
        //Código de estado para baja de presentaciones
        $presentacion->estado = -1;
        $presentacion->save();
        return redirect('/admin/productos/detalles/'.$id);

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
