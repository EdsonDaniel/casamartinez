<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\OtrasCaracteristicas;
use App\ProductosCaracteristicas;
use App\Productos;
use App\User;
use App\Carrito;
use App\CarritoProductos;
use App\PresentacionesProducto;
use App\TodosProductos;
use App\ProductosTienda;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class TiendaController extends Controller
{
   
   public function index()
    {
        //$user = auth()->user();
        /*$permissions = $user->getPermissionsViaRoles()
                            ->where('name', 'users.list')
                            ->first();
        */
        //$tiene_permiso = $user->can('users.list');
        //return $tiene_permiso;
        $products = ProductosTienda::all();
        if( Auth::check() ){
            $user = $user = auth()->user();
            $carrito = $user->carrito;
            $prod = CarritoProductos::where('carrito_compras_id', $carrito->id)->get();
            return view('tienda')->with(['productos'=>$products, 'inCart' => $prod]);
        }
       
        return view('tienda')->with('productos',$products);
    }

    
    public function create()
    {
        $caracteristicas = OtrasCaracteristicas::all();
        return view('admin.addProductos')->with('caracteristicas', $caracteristicas);
    }

    public function store(StoreProduct $request)
    {
        
    }

    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        
    }

    
    public function updateProduct(Request $request, $id)
    {
        
    }

    public function updateCaractProduct(Request $request, $id)
    {
        

    }

    public function deleteCaractProduct(Request $request, $id)
    {

    }

    public function updatePresentacion(Request $request, $id_pres)
    {
        

    }

    public function addPresentaciones(StorePresentacion $request, $id){
        
    }


    public function destroyPresentacion($id)
    {
       

    }

    public function uploadPresentacion($id)
    {
        
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
