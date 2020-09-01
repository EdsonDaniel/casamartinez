<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use MercadoPago;

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
    public function mercadopago(){
        //require __DIR__ .  '\vendor\autoload.php';
        // Agrega credenciales
MercadoPago\SDK::setAccessToken('APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181');
//MercadoPago\SDK::setPublicKey('APP_USR-d81f7be9-ee11-4ff0-bf4e-20c36981d7bf');
MercadoPago\SDK::setIntegratorId('dev_24c65fb163bf11ea96500242ac130004');
// Crea un objeto de preferencia
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Mi producto';
        $item->quantity = 1;
        $item->unit_price = 75.56;
        $preference->items = array($item);
        $preference->save();
        return view('catalogo')->with('preference', $preference);

    }
}
