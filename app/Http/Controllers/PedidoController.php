<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUser;
use App\Pedido;
use App\VentasMes;
use App\MasVendidos;
use MercadoPago;


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

    
    public function create()
    {
        return view('admin.addUsuario');
    }
    
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->tipo_usuario = $request->input('tipo_usuario');
        $user->save();

        return redirect('/admin/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $pedido = User::findOrFail($id);
        return view('admin.detallePedido',
            ['usuario'=>$user, 'editable'=>$editable, 'icon_class'=>$icon, 'color'=>$color]);
    }
   
   
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
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
    public function getVendidosAjax(){
        $data = MasVendidos::all();
        return response()->json($data);
    }

}
