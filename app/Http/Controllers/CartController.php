<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CarritoProductos;
use App\ProductosTienda;
use App\TodosProductos;
use Illuminate\Support\Facades\Auth;
use App\Recomendados;
use App\Http\Requests\StoreDirection;
use Stripe;
use App\DireccionesUsuario;
use App\DireccionesEnvio;


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
        \Stripe\Stripe::setApiKey('sk_test_51HWep7BQhjFyWJ1M2jUFVKFG6rbzJJjLftB49oYsYt8Wc6SZjU9zLnNo2qWzxolaxyIsUSaJiirolAdQayfbQADh00p9zcXU5o');

        $address = $value = session('address', '');
        if ($address =="") {
            return redirect("/informacion-de-envio");
        }

        $addressFac = session('addressFac', '0');
        $addFacEncod = $addressFac;
        if ($addressFac != '0') { $addressFac = json_encode($addressFac); }

        $subtotal = session('subtotal', 0);
        $count = session('count', 0);
        $cart = session('cart', "");
        $costo_envio = session('costo_envio',0);
        if($cart == "" || $subtotal < 1 || $count < 1 )
            return redirect ("/tienda");
        $cart = json_encode( $cart, true );
        $total = round((($subtotal + $costo_envio) * 100),0);

        $productos = session('prods_instance', "");
        
        $intent = \Stripe\PaymentIntent::create([
            'amount' => $total,
            'currency' => 'mxn',
            'description' => 'Compra de productos en el sitio CasaMartinez.mx',
            'shipping' => [
                'address' => [ 
                    'line1' => $address['calle'], 
                    'line2' => $address['apartamento'], 
                    'city'  => $address['colonia'],
                    'state' => $address['estado'],
                    'postal_code' => $address['codigo_postal'],
                ],
                'name'  => $address['nombre'].' '.$address['apellidos'],
                'phone' => $address['telefono']
            ],
            
            'metadata' => [
                'integration_check' => 'accept_a_payment',
                'products'          => $cart,
                'no_exterior'       => $address['no_exterior'],
                'municipio'         => $address['municipio'],
                'email_custom'      => $address['email'],
                'costo_envio'       => $costo_envio,
                'addressFac'        => $addressFac,
            ]
        ]);
        
        return view('pay')->with([
            'productos' => $productos, 
            'intent' => $intent, 
            'direccion' => $address,
            'direccionFacturacion' => $addFacEncod,
            'carrito' => $cart,
            'subtotal' => $subtotal,
            'count'  => $count,
            'total' => round($total/100, 2),
            'costo_envio' => $costo_envio,
        ]);
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
        $request->session()->put('count', $dataValidated['count']);
        $request->session()->put('subtotal', $dataValidated['subtotal']);
        $request->session()->put('costo_envio', $dataValidated['costo_envio']);
        $request->session()->put('prods_instance', $productos);
        
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
       

        return redirect('checkout');
    }

    public function addInfoEnvio(){
        $productos = ProductosTienda::all();
        $direccion = null;
        $prod = null;
        if( Auth::check() ){
            $user = $user = auth()->user();
            $carrito = $user->carrito;
            $prod = CarritoProductos::select('presentacion_producto_id','cantidad')->where('carrito_compras_id', $carrito->id)->get();
            $direccion = $user->direcciones();
            /*return view('checkout')
                    ->with(['productos'=>$productos, 'inCart' => $prod]);*/
        }
        
        return view('checkoutWithData')->with(["productos" => $productos, "direccion" => $direccion, "inCart" => $prod]);
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
        return response()->json([
                'message' => 'Datos actualizados'], 200);
        /*$redirect = $request->input('redirect');
        if($redirect == 'cartView'){
            return redirect('/carrito-de-compras');
        }*/
        /*return redirect('/informacion-de-envio');*/
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
        $productos = TodosProductos::all();//where('estado_presentacion', 1);
        $productosCart = array();
        $key_array = array();
        $valid_array = array();
        $subtotal = 0;
        $count = 0;
        $errores = array();
        $botellas_250 = 0;
        $botellas_750 = 0;
        //$idAndCantidad = array();
                
        //$productos = ProductosTienda::all();
        //$user = auth()->user();
        //$i = 0;
        
        foreach($cart as $item) {
            $cantidad = $this->validateCantidad($item['cantidad']);
            if (!in_array($item['presentacion_producto_id'], $key_array) &&
                $cantidad > 0) {
                $presentacion = $productos->find($item['presentacion_producto_id']);
                if($presentacion != null){
                    //$key_array[$i] = $item['presentacion_producto_id'];
                    array_push($key_array,$item['presentacion_producto_id']);
                    if ($cantidad > $presentacion['stock']) {
                        $cantidad = $presentacion['stock'];
                        $errores[$presentacion['id_presentacion']] = 1;
                        //$item['cantidad'] = $cantidad;
                    }
                    if($presentacion->presentacion == '750 ml')
                        $botellas_750 += $cantidad;
                    else
                        $botellas_250 += $cantidad;
                    //$valid_array[$i] = $item;
                    //$valid_array[$item['presentacion_producto_id']] = $cantidad;
                    $valid_array[$item['presentacion_producto_id']] = [ 
                        'cantidad' => $cantidad, 
                        'precio_unitario' => $presentacion['precio_consumidor']
                    ];
                    $newP = $presentacion->toArray();
                    $newP['cantidad'] = $cantidad;
                    //$productosCart[$i] = $presentacion;
                    //$productosCart[$i] = $newP 
                    array_push($productosCart, $newP);
                    //$productosCart[$i]['cantidad'] = $cantidad;
                    $count += $cantidad;
                    $subtotal += $cantidad * $presentacion['precio_consumidor'];
                    //$idAndCantidad[$presentacion->id] = array('cantidad' => $item['cantidad']);
                    //$i++;
                }
            }
        }
        $costo_envio = $this->costoBotella250($botellas_250) 
        + $this->costoBotella750($botellas_750);


        return ['cart' => $valid_array, 'prods' => $productosCart, 
                'subtotal' => $subtotal, 'count' => $count, 'costo_envio' => $costo_envio];

    }

    public function costoBotella250($cantidad){
        if( $cantidad == 1 )
            return 272.28;
        if( $cantidad == 2 )
            return 129.59;
        if( $cantidad > 2 && $cantidad < 6 )
            return 82.03;
        if( $cantidad > 5 && $cantidad < 12 )
            return  34.47;
        if( $cantidad > 11 && $cantidad < 24 )
            return 10.69;

        return 0;

    }
    public function costoBotella750($cantidad){
        if( $cantidad == 1 )
            return 209.21;
        if( $cantidad == 2 )
            return 66.52;
        if( $cantidad == 3 )
            return 18.96;
        
        return 0;

    }
}
