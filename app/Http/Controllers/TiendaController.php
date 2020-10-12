<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Productos;
use App\User;
use App\Carrito;
use App\CarritoProductos;
use App\PresentacionesProducto;
use App\TodosProductos;
use App\Recomendados;
use App\ProductosTienda;
use App\Pedido;
use App\Notifications\ConfirmacionCompra;
use App\DireccionesUsuario;
use App\DireccionesEnvio;

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
                $paymentIntent = $event->data->object;
                $pedidoId = $this->createPedido($paymentIntent);
                //handlePaymentIntentSucceeded($paymentIntent);
                break;
            /*case 'payment_method.attached':
                $paymentMethod = $event->data->object; // contains a StripePaymentMethod
                handlePaymentMethodAttached($paymentMethod);
                break;
            // ... handle other event types*/
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        http_response_code(200);
    }

    public function createPedido($data){
        $metadata = $data['metadata'];
        $costo_envio = $metadata['costo_envio'];
        $user = $metadata['id'];
        //$extra_address_info = $metadata['extra_data'];

        $direccion_envio = DireccionesEnvio::create([
            'calle'           => $data['shipping']['address']['line1'],
            'numero'          => $metadata['no_exterior'],
            'numero_interior' => $metadata['no_interior'],
            'apartamento'     => $data['shipping']['address']['line2'],
            'colonia'         => $data['shipping']['address']['city'],
            'municipio'       => $metadata['municipio'],
            'estado'          => $data['shipping']['address']['state'],
            'codigo_postal'   => $data['shipping']['address']['postal_code'],
            'telefono'        => $data['shipping']['phone'],
            'nombre_residente' => $data['shipping']['name']
        ]);

        $direccion_facturacion = $metadata['addressFac'];
        if($direccion_facturacion == '0') $direccion_facturacion = $direccion_envio->id;
        else $direccion_facturacion = null;//$this->createDireccionEnvio($direccion_facturacion);       

        $pedido = Pedido::create([
            'metodo_pago' => 'Tarjeta con Stripe',
            'monto_total' => $data['amount'],
            'costo_envio' => $costo_envio,
            'user_id'    => $user,
            'direccion_envio_id' => $direccion_envio->id,
            'direccion_facturacion_id' => $direccion_facturacion,
            'id_pago'     => $data['id'],
            'email'       => $metadata['email_custom']
        ]);

        $pedido->notify(new ConfirmacionCompra());

        return $pedido->id;


    }

    public function createDireccionEnvio($data){
        $objectData = json_decode($data);

        $direccion_facturacion = DireccionesEnvio::create([
            'calle'           => $objectData['calle_facturacion'],
            'numero'          => $objectData['no_exterior_facturacion'],
            'numero_interior' => $objectData['no_interior_facturacion'],
            'apartamento'     => $objectData['apartamento_facturacion'],
            'colonia'         => $objectData['colonia_facturacion'],
            'municipio'       => $objectData['municipio_facturacion'],
            'estado'          => $objectData['estado_facturacion'],
            'codigo_postal'   => $objectData['codigo_postal_facturacion'],
            'telefono'        => $objectData['telefono_facturacion'],
            'nombre_residente' => $objectData['nombre_facturacion'].' '.$objectData['apellidos_facturacion'],
        ]);

        return $direccion_facturacion->id;
    }

    public function createProductosComprados($data){

    }

}
