<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUser;
use App\Pedido;
use App\Productos;
use App\VentasMes;
use App\VentasAnio;
use App\MasVendidos;
use App\DireccionesEnvio;


class PedidoController extends Controller
{

    public function index()
    {
        return view('admin.listaPedidos');
    }

    public function enviar(Request $request, $id){
        $pedido = Pedido::findOrFail($id);
        if ($pedido == null) {
            return response('-Error al actualizar los datos.' 
                    + '\nNo se encontró el pedido seleccionado.'
                    , 422);
        }
        $pedido->id_rastreo = $request->input('id_rastreo');
        $pedido->paqueteria = $request->input('paqueteria');
        $pedido->estado     = 1;

        $pedido->save();

        return response('Datos actualizados correctamente.', 200);
    }

    public function entregado(Request $request, $id){
        $pedido = Pedido::findOrFail($id);
        if ($pedido == null) {
            return response('-Error al actualizar los datos.' 
                    + '\nNo se encontró el pedido seleccionado.'
                    , 422);
        }
        $pedido->estado = 2;
        $pedido->fecha_entrega = now();
        $pedido->save();
        return response('Datos actualizados correctamente.', 200);
    }
    public function cancelado(Request $request, $id){
        $pedido = Pedido::findOrFail($id);
        if ($pedido == null) {
            return response('-Error al actualizar los datos.' 
                    + '\nNo se encontró el pedido seleccionado.'
                    , 422);
        }
        $pedido->estado = -1;
        $pedido->save();
        return response('Datos actualizados correctamente.', 200);
    }

    
    public function show(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $productos = $pedido->productos;
        //return $productos;
        $direccion = DireccionesEnvio::findOrFail($pedido->direccion_envio_id);
        return view('admin.detallePedido',
            ['pedido'=>$pedido, 'productos'=>$productos, 'direccion'=>$direccion]);
    }
       
    public function getDataAjax()
    {
        $pedidos = Pedido::all();
        return response()->json($pedidos);
    }
    public function getDataById(Request $request, $id)
    {
        $usuario = User::find($id);
        return response()->json($usuario);
    }
    public function getUsersEmpleados(){
        $users = User::where('tipo_usuario', '>', 3)->get();
        return $users;
    }

    public function getVentasAjax(){
        $data = VentasMes::all();
        return response()->json($data);
    }
    public function getVentasAnioAjax(){
        $data = VentasAnio::all();
        return response()->json($data);
    }
    public function getVendidosAjax(){
        $data = MasVendidos::all();
        return response()->json($data);
    }

}
