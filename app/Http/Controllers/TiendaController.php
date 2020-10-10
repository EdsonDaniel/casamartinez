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
use App\Recomendados;
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
            /*$prod = CarritoProductos::where('carrito_compras_id', $carrito->id)->get();*/
            $prod = CarritoProductos::select('presentacion_producto_id','cantidad')->where('carrito_compras_id', $carrito->id)->get();
            return view('tienda')
                    ->with(['productos'=>$products, 'inCart' => $prod]);
        }
       
        return view('tienda')->with('productos',$products);
    }

    public function indexCarrito(){
        $recomendados = Recomendados::all();
        //return view 
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

    
    public function webhookStripe(Request $request){
        \Stripe\Stripe::setApiKey('sk_test_51HWep7BQhjFyWJ1M2jUFVKFG6rbzJJjLftB49oYsYt8Wc6SZjU9zLnNo2qWzxolaxyIsUSaJiirolAdQayfbQADh00p9zcXU5o');

        $payload = @file_get_contents('php://input');
        $event = null;

        try {
            $event = \Stripe\Event::constructFrom(
                json_decode($payload, true)
            );
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        }
        // Handle the event
        switch ($event->type) {
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object; // contains a StripePaymentIntent
                handlePaymentIntentSucceeded($paymentIntent);
                break;
            case 'payment_method.attached':
                $paymentMethod = $event->data->object; // contains a StripePaymentMethod
                handlePaymentMethodAttached($paymentMethod);
                break;
            // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        http_response_code(200);
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
