<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUser;
use App\Pedido;
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
        //$validated = $request->validated();

        $usuario = User::find($id);

        /*

        if( $validated['name'] != null && $validated['name'] != $usuario->name ){
            $usuario->name  = $validated['name'];
        }
        if( $validated['last_name'] != null && $validated['last_name'] != $usuario->last_name ){
            $usuario->last_name = $validated['last_name'];
        }
        if( $validated['email'] != null && $validated['email'] != $usuario->email ){
            $usuario->email = $validated['email'];
        }
        if( $validated['tipo_usuario'] != null && $validated['tipo_usuario'] != $usuario->tipo_usuario ){
            $usuario->tipo_usuario  = $validated['tipo_usuario'];
        }
        if( $request->input("password") != null && $request->input("password") != "" ){
            $usuario->password = $request->input('password');
        }
        */

        if( $request->input('name') != null && $request->input('name') != $usuario->name ){
            $usuario->name  = $request->input('name');
        }
        if( $request->input('last_name') != null && $request->input('last_name') != $usuario->last_name ){
            $usuario->last_name = $request->input('last_name');
        }
        if( $request->input('tipo_usuario') != null && $request->input('tipo_usuario') != $usuario->tipo_usuario ){
            $usuario->tipo_usuario  = $request->input('tipo_usuario');
        }
        if( $request->input('email') != null && $request->input('email') != $usuario->email ){
            $request->validate([
                'email'=>['unique:users,email','max:100'], 
            ]);
            $usuario->email = $request->input('email');
        }
        if( $request->input("password") != null && $request->input("password") != "" ){
            $usuario->password = $request->input('password');
        }
        
        $usuario->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function baja($id)
    {
        $user = User::find($id);
        $user->active = 0;
        $user->save();
    }

    public function alta($id)
    {
        $user = User::find($id);
        $user->active = 1;
        $user->save();
    }

    public function getDataAjaxActive()
    {
        $usuarios = User::where('active', 1)->get();
        return response()->json($usuarios);
    }
    public function getDataAjaxInactive()
    {
        $usuarios = User::where('active', 0)->get();
        return response()->json($usuarios);
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

}