<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CarritoProductos;
use App\ProductosTienda;
use Illuminate\Support\Facades\Auth;
use App\Recomendados;
use App\Http\Requests\StoreDirection;

class CartController extends Controller
{
    public function index(){
        $user = auth()->user();
        //$recomendados = Recomendados::all();
        $productos = ProductosTienda::all();
        if (!is_null($user)){
            $carrito = $user->carrito;
            $prod = CarritoProductos::select('presentacion_producto_id','cantidad')->where('carrito_compras_id', $carrito->id)->get();
            $ids = array();
            foreach ($prod as $item) {
                array_push($ids, $item['presentacion_producto_id']);
            }
            $productos = $productos->find($ids)->values();
            
            return view('viewCarrito')
                    ->with(['productos'=>$productos, 'inCart' => $prod]);
        }
        return view('viewCarrito')->with(['productos'=> $productos]);
    }

    public function pagar(){
        $productos = ProductosTienda::all();
        return view('pay')->with('productos',$productos);
    }

    public function checkout(StoreDirection $request){
        $validated = $request->validated();
        $cart = $request->input('cart');
        $cart = json_decode($cart,true);
        $dataValidated = $this->validateItems($cart);
        $cartValidated = $dataValidated['cart'];
        $productos  = $dataValidated['prods'];
        $request->session()->put('cart', $cartValidated);
        $address = array();
        $address = $validated;
        $request->session()->put('address', $address);

        if(!$request->input('misma_direccion')){
            $array_validaciones = [
            'nombre_facturacion'        => ['required', 'min:1', 'max:190'],
            'apellidos_facturacion'     => ['required', 'min:1', 'max:190'],
            'email_facturacion'         => ['required', 'email', 'min:1', 'max:190'],
            'telefono_facturacion'      => ['required', 'size:10'],
            'calle_facturacion'         => ['required', 'min:1', 'max:190'],
            'no_exterior_facturacion'   => ['required', 'min:1', 'max:190'],
            'no_interior_facturacion'   => ['nullable', 'min:1', 'max:190'],
            'apartamento_facturacion'   => ['nullable','min:1', 'max:190'],
            'codigo_postal_facturacion' => ['required', 'min:1', 'max:5'],
            'colonia_facturacion'       => ['required', 'min:1', 'max:190'],
            'municipio_facturacion'     => ['required', 'min:1', 'max:190'],
            'estado_facturacion'        => ['required', 'min:1', 'max:190'],
        ];
            $validSecondData = $request->validate($array_validaciones);
            $request->session()->put('addressFac', $validSecondData);
        }

        if($request->input('registrarse') && $request->input("password") != null){

            $validatedData = $request->validate([
                'email' => 'unique:App\users,email',
            ]);
            $user = User::create([
                'name' => $validated['nombre'],
                'last_name' => $validated['apellidos'],
                'email' => $validated['email'],
                'password' => Hash::make($data['password']),
            ]);
            $carrito = Carrito::create(['user_id' => $user->id]);
        }

        //return redirect()->

        //$value2 = $request->session()->get('cart');
        //$value = $request->all();
       

        return $value2;
    }

    public function envio(){
        $productos = ProductosTienda::all();
        $user = $user = auth()->user();
            $carrito = $user->carrito;
            /*$prod = CarritoProductos::where('carrito_compras_id', $carrito->id)->get();*/
            $prod = CarritoProductos::select('presentacion_producto_id','cantidad')->where('carrito_compras_id', $carrito->id)->get();
            return view('checkout')
                    ->with(['productos'=>$productos, 'inCart' => $prod]);
        /*if( Auth::check() ){
            $user = auth()->user();
            $direccion = $user->direcciones();
            if ($direccion ) {
                return view('checkoutWithData')->with("productos",$productos);
                return $direccion;
            }
        }*/
        return view('checkout')->with("productos",$productos);
        return view('checkout')->with("productos",$productos);
    }
    public function push(Request $request, $idPresentacion){
        $user = auth()->user();
    	if (is_null($user)){
    		return response()->json([
    			'message' => 'Usuario no autenticado.'], 404);
    	}
    	$cantidad = $request->input('cantidad');
    	if(is_null($cantidad)) $cantidad = 1;
        $carrito = $user->carrito;

        if ($cantidad == 0) {
            $carrito->productos()->detach([$idPresentacion]);
            return response()->json([
                'message' => 'Producto eliminado'], 200);
        }
    	if($cantidad < 0 || $cantidad > 13 ){
    		return response()->json([
    			'message' => 'Cantidad no permitida.'], 404);
    	}
    	try{
    		$carrito->productos()->attach($idPresentacion, ['cantidad' => $cantidad]);
    	}catch(\Illuminate\Database\QueryException $e){
    		/*$cantidad_actual = $carrito->productos()->where('presentaciones_producto.id', $idPresentacion)->get();
    		$cantidad_nueva = $cantidad_actual[0]['pivot']['cantidad'] + $cantidad;

    		if($cantidad_nueva > 12 || $cantidad_nueva < 1) $cantidad_nueva = 12;*/
    		$carrito->productos()
    				->updateExistingPivot($idPresentacion, ['cantidad'=>$cantidad]);
    		//$carrito->refresh();
    	}
    	$prod = CarritoProductos::select('presentacion_producto_id','cantidad')->where('carrito_compras_id', $carrito->id)->get();
    	
    	return response()->json($prod, 200);
    }

    public function deleteAll(){
        $user = auth()->user();
        if (is_null($user)){
            return response()->json([
                'message' => 'Usuario no autenticado.'], 404);
        }
        $carrito = $user->carrito;
        $carrito->productos()->detach();
        return response()->json([
                'message' => 'Carrito vaciado'], 200);
    }

    public function syncData(Request $request){
        $user = auth()->user();
        if (is_null($user)){
            return response()->json([
                'message' => 'Usuario no autenticado.'], 404);
        }
        $carrito = $user->carrito;
        $carrito->productos()->detach();
        $carrito_local = $request->input("cart");
        foreach ($carrito_local as $item) {
            if ($item["cantidad"] > 0 && $item["cantidad"] < 12) {
                try{
                    $carrito
                        ->productos()
                        ->attach($item['presentacion_producto_id'], 
                            ['cantidad' => $item["cantidad"]]);
                    }
                catch(\Illuminate\Database\QueryException $e){;}
            }
        }
        return response()->json([
                'message' => 'Datos actualizados.'], 200);
    }

    public function validateCart2(Request $request){
        $cart = $request->input('cart');
        $redirect = $request->input('redirect');
        $productosCart = array();
        $key_array = array();
        $valid_array = array();
        $idAndCantidad = array();
                
        $productos = ProductosTienda::all();
        $user = auth()->user();
        $i = 0;
        
        foreach($cart as $item) {
            if (!in_array($item['presentacion_producto_id'], $key_array) &&
                $this->validateCantidad($item['cantidad']) > 0) {
                $presentacion = $productos->find($item['presentacion_producto_id']);
                if($presentacion != null){
                    $key_array[$i] = $item['presentacion_producto_id'];
                    $valid_array[$i] = $item;
                    $productosCart[$i] = $presentacion;
                    $idAndCantidad[$presentacion->id] = array('cantidad' => $item['cantidad']);
                    $i++;
                }
            }
        }

        if($user != null){
            $carrito = $user->carrito;
            $carrito->productos()->sync($idAndCantidad);
        }
        if($redirect == 'cartView'){
            return view('viewCarrito')
                    ->with(['cart' => $valid_array, 'productos' => $productosCart]);
        }

        return view('checkout')
                    ->with(['cart' => $valid_array, 'productos' => $productosCart]);
    }
    public function validateCantidad($cantidad){
        if ($cantidad < 1) {
            return 0;
        }
        if ($cantidad > 12) {
            $cantidad = 12;
        }
        return $cantidad;
    }

    public function validateCart(Request $request){
        $user = auth()->user();
        $updates = $request->input('updates');
        if ($updates != null && $user != null) {
            $carrito = $user->carrito;
            foreach ($updates as $key => $value) {
                if ($value > 0 && $value < 12) {
                    try{
                        $carrito->productos()
                        ->updateExistingPivot($key, ['cantidad'=>$value]);
                    }catch(\Illuminate\Database\QueryException $e){
                        
                    }
                }
            }
        }
        if($redirect == 'cartView'){
            return redirect('/carrito-de-compras');
        }
        return redirect('/informacion-de-envio');
    }
    
    public function updateCart(Request $request){
        $user = auth()->user();
        if (is_null($user)){
            return response()->json([
                'message' => 'Usuario no autenticado.'], 404);
        }        
        $updates = $request->input('updates');
        if ($updates != null) {
            $carrito = $user->carrito;
            foreach ($updates as $key => $value) {
                if ($value > 0 && $value < 12) {
                    try{
                        $carrito->productos()
                        ->updateExistingPivot($key, ['cantidad'=>$value]);
                    }catch(\Illuminate\Database\QueryException $e){
                        
                    }
                }
            }
        }
        return response()->json([
                'message' => 'Datos actualizados'], 200);
    }

    public function validateItems($cart){
        $productos = ProductosTienda::all();
        $productosCart = array();
        $key_array = array();
        $valid_array = array();
        //$idAndCantidad = array();
                
        $productos = ProductosTienda::all();
        //$user = auth()->user();
        $i = 0;
        
        foreach($cart as $item) {
            if (!in_array($item['presentacion_producto_id'], $key_array) &&
                $this->validateCantidad($item['cantidad']) > 0) {
                $presentacion = $productos->find($item['presentacion_producto_id']);
                if($presentacion != null){
                    $key_array[$i] = $item['presentacion_producto_id'];
                    $valid_array[$i] = $item;
                    $productosCart[$i] = $presentacion;
                    //$idAndCantidad[$presentacion->id] = array('cantidad' => $item['cantidad']);
                    $i++;
                }
            }
        }


        return ['cart' => $valid_array, 'prods' => $productosCart];

    }
}
