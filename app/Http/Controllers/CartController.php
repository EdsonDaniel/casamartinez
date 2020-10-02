<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function push(Request $request, $idPresentacion){
    	if (!Auth::check()){
    		return response()->json([
    			'message' => 'Usuario no autenticado.'], 404);
    	}
    	$cantidad = $request->input('cantidad');
    	if(is_null($cantidad)) $cantidad = 1;
    	else if($cantidad < 1 || $cantidad > 13 ){
    		return response()->json([
    			'message' => 'Cantidad no permitida.'], 404);
    	}
    	
    	$user = auth()->user();
    	$carrito = $user->carrito;
    	try{
    		$carrito->productos()->attach($idPresentacion, ['cantidad' => $cantidad]);
    	}catch(\Illuminate\Database\QueryException $e){
    		$cantidad_actual = $carrito->productos()->where('presentaciones_producto.id', $idPresentacion)->get();
    		$cantidad_nueva = $cantidad_actual[0]['pivot']['cantidad'] + $cantidad;
    		if($cantidad_nueva > 12 || $cantidad_nueva < 1) $cantidad_nueva = 12;

    		$carrito->productos()
    				->updateExistingPivot($idPresentacion, ['cantidad'=>$cantidad_nueva]);
    		//$carrito->refresh();
    	}
    	
    	return response()->json([
    			'message' => 'Producto agregado al carrito.'], 200);
    }
}
