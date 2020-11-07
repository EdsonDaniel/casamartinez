<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
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
use App\ProductosComprados;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;



class TiendaController extends Controller
{
   
   public function index(Request $request)
    {
        
        $request->session()->forget('subtotal');
        $request->session()->forget('count');
        $request->session()->forget('cart');
        $products = ProductosTienda::all();
        if( Auth::check() ){
            $user = $user = auth()->user();
            $carrito = $user->carrito;
            /*$prod = CarritoProductos::where('carrito_compras_id', $carrito->id)->get();*/
            $prod = CarritoProductos::select('id','cantidad')->where('carrito_compras_id', $carrito->id)->get();
            return view('tienda')
                    ->with(['productos'=>$products, 'inCart' => $prod]);
        }
       
        return view('tienda')->with('productos',$products);
    }

    public function indexCarrito(){
        $recomendados = Recomendados::all();
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
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        http_response_code(200);
    }

    public function webhookMP(Request $request){
        $payload = @file_get_contents('php://input');
        $eventJson = json_decode($input, true);
        $direccion_envio = DireccionesEnvio::create([
            'calle'           => 'pagoexitoso',
            'numero'          => 4,
            'numero_interior' => 3,
            'apartamento'     => null,
            'colonia'         => 'city',
            'municipio'       => 'municipio',
            'estado'          => 'state',
            'codigo_postal'   => '60000',
            'telefono'        => '9513230110',
            'nombre_residente' => 'name'
        ]);
        http_response_code(200);
    }

    public function createPedido($data){
        $metadata = $data['metadata'];
        $costo_envio = $metadata['costo_envio'];
        $user = $metadata['user_id'];
        if($user == -1) $user = null;
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
        $total = $data['amount']/100;  
        //$user_id = null;
        //if($data['id'] == -1 || $data['id'] == "-1") $data['id'] = null;

        $pedido = Pedido::create([
            'metodo_pago' => 'Tarjeta con Stripe',
            'monto_total' => $total,
            'costo_envio' => $costo_envio,
            'user_id'    => $user,
            'direccion_envio_id' => $direccion_envio->id,
            'direccion_facturacion_id' => $direccion_facturacion,
            'id_pago'     => $data['id'],
            'email'       => $metadata['email_custom']
        ]);

        $productos_comprados = json_decode( $metadata['id'], true);

        $productos_comprados = $this-> createProductosComprados($productos_comprados, $pedido->id);
        //return $pedido->id;

        $user = User::find($user);
        $url;
        $nombre;
        if($user != null){
            $nombre = $user->name;
            $url = '/mi-cuenta/mis-pedidos/' . $pedido->id;
        }
        else {
            $nombre = $data['shipping']['name'];
            $url = '';
        } 
        $pedido->notify(
            new ConfirmacionCompra(
                $productos_comprados, 
                $nombre, 
                $url,
                $total,
                $costo_envio
            )
        );


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

    /*public function createProductosComprados($data, $idPedido){
        //$productos = json_decode($data);

        foreach ($data as $datos) {
            $comprado = ProductosComprados::create([
                'id' => $datos['id'],
                'cantidad'   => $datos['cantidad'],
                'precio_unitario' => $datos['precio_unitario'],
                'pedido_id' => $idPedido
            ]);
            $producto = PresentacionesProducto::find($datos['id']);
            $producto->stock = $producto->stock - $datos['cantidad'];
            $producto->save();
        }
    }*/

    public function createProductosComprados($data, $idPedido){
        //$productos = json_decode($data);
        $cart = array();
        foreach ($data as $key => $value) {
            $id = $key;
            $producto = PresentacionesProducto::find($id);
            $producto->stock = $producto->stock - $value;
            $producto->save();
            
            $comprado = ProductosComprados::create([
                'id'        => $id,
                'cantidad'  => $value,
                'precio_unitario' => $producto->precio_consumidor,
                'pedido_id' => $idPedido
            ]);

            $cart[$key] = array(
                'cantidad' => $value, 
                'precio_unitario' => $comprado->precio_unitario,
                'img_url' => $producto->foto_url,
                'id' => $producto->id,
                'name' => $producto->producto->nombre . ' ' . $producto->contenido.' ' .$producto->unidad_c
            );

        }

        return $cart;

    }


    public function previewEmail(){
        $productos = [ //'productos' => [
                                'uno' => [
                                    'url' => '/storage/img/fotos-productos/aA27tVRS9nTVJj8st48x4V7z8rthlQxdb5gsTy0y.jpeg',
                                    'nombre' => '2 x Mezcal Sinahi (Reposado)',
                                    'precio' => '$599.00'
                                ],
                                'dos' => [
                                    'url' => '/storage/img/fotos-productos/zSFYqLOhrO4igZL8199txYOLm680RPKJlwzAxZUM.jpeg',
                                    'nombre' => '1 x Mezcal Sinahi Reserva Especial',
                                    'precio' => '$488.99',
                                ]
                            //]
                        ];
        return ((new MailMessage)
                        ->greeting('¡Hola Edson!')
                        ->line('Comenzaremos a preparar tu pedido y te haremos saber en cuanto lo tengamos listo y lo hallamos enviado.')
                        ->line('También te compartiremos el número de rastreo de tu paquete para que puedas estar informado sobre su seguimiento.')

                        ->action('Ver pedido', url('/'))
                        ->line('¡Gracias por comprar en Casa Martínez!')
                        ->markdown('mail.compras.compraExitosa', ['productos' => $productos])
                    );
    }

    public function detalleProducto(Request $request){
        $ids = $request->query('product', '-1');
        $ids = explode("_", $ids);
        $producto = Productos::findOrFail($ids[0]);
        $presentacion = PresentacionesProducto::findOrFail($ids[1]);
        $recomendados = Recomendados::all();
        return view('detalleProducto')
                    ->with([
                        'producto' => $producto, 
                        'presentacion' => $presentacion,
                        'recomendados' => $recomendados
                    ]);
    }

    public function pagoExitoso(){
        return view('pagoexitoso');
    }
    public function pagoRechazado(){
        return view('pagorechazado');
    }

}
