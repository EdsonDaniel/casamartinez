<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCar(Request $request)
    {
        $presentacion = $request->input('id_presentacion');
        $cantidad = $request->input('cantidad');
            
        if (Auth::check()) {
            $user = Auth::user();
            $carrito = $user->carrito;
            $productos = $carrito->productos;
            $productos = $carrito->productos()->where('carrito_productos.id_pres_prod',$presentacion)->get();

            //return $productos;
            if($productos->isEmpty()){
                $carrito->productos()->attach($presentacion, ['cantidad' => $cantidad]);
            }
            else{
                $carrito->productos()->updateExistingPivot($presentacion, ['cantidad' => $cantidad]);
                return $cantidad;
            }
            return $productos;
            
        }
        return response()->json("hola y adios");
    }
}
