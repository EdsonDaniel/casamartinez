<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUser;
use App\User;
use App\Pedido;
use App\DireccionesUsuario;
use App\Http\Requests\StoreDirection;
use MercadoPago;



class UserController extends Controller
{

    public function micuenta(Request $request){
        $user = Auth::user();
        $pedidos = Pedido::where('user_id', $user->id)->get();
        $direcciones = DireccionesUsuario::where('user_id', $user->id)->get();
        return view('micuenta')->with([
            'pedidos'=>$pedidos,
            'direcciones' =>$direcciones,
            'user' => $user
        ]);
    }

    public function addDireccion(StoreDirection $request){
        if (!Auth::check()) return redirect('/');
        $user = Auth::user();

        $direccion = $request->validated();
        $new_dir = DireccionesUsuario::create([
            'calle'           => $direccion['calle'],
            'numero'          => $direccion['no_exterior'],
            'numero_interior' => $direccion['no_interior'],
            'apartamento'     => $direccion['apartamento'],
            'colonia'         => $direccion['colonia'],
            'municipio'       => $direccion['municipio'],
            'estado'          => $direccion['estado'],
            'codigo_postal'   => $direccion['codigo_postal'],
            'telefono'        => $direccion['telefono'],
            'nombre_residente' => $direccion['nombre'].' '.$direccion['apellidos'],
            'user_id'         => $user->id
        ]);
        return redirect('/mi-cuenta')->with('status', 
            ['msg' => 'Datos actualizados correctamente', 'value' => true]);
    }

    public function updateDireccion(Request $request){
        if (!Auth::check()) return redirect('/');
        $array_validaciones = [
            'nombre'        => ['required', 'min:1', 'max:190'],
            'email'         => ['required', 'email', 'min:1', 'max:190'],
            'telefono'      => ['required', 'size:10'],
            'calle'         => ['required', 'min:1', 'max:190'],
            'no_exterior'   => ['required', 'min:1', 'max:190'],
            'no_interior'   => ['nullable', 'min:1', 'max:190'],
            'apartamento'   => ['nullable','min:1', 'max:190'],
            'codigo_postal' => ['required', 'min:1', 'max:5'],
            'colonia'       => ['required', 'min:1', 'max:190'],
            'municipio'     => ['required', 'min:1', 'max:190'],
            'estado'        => ['required', 'min:1', 'max:190'],
            'direccion_id'  => ['required']
        ];

        $direccion = $request->validate($array_validaciones);
        $user = Auth::user();

        $old_dir = DireccionesUsuario::findOrFail($direccion['direccion_id']);
        if ($old_dir->user_id != $user->id) {
            return redirect('/');
        }
        
        $old_dir->calle           = $direccion['calle'];
        $old_dir->numero          = $direccion['no_exterior'];
        $old_dir->numero_interior = $direccion['no_interior'];
        $old_dir->apartamento     = $direccion['apartamento'];
        $old_dir->colonia         = $direccion['colonia'];
        $old_dir->municipio       = $direccion['municipio'];
        $old_dir->estado          = $direccion['estado'];
        $old_dir->codigo_postal   = $direccion['codigo_postal'];
        $old_dir->telefono        = $direccion['telefono'];
        $old_dir->nombre_residente = $direccion['nombre'];

        $old_dir->save();
        //$request->session()->flash('status', true);
        return redirect('/mi-cuenta')->with('status', 
            ['msg' => 'Datos actualizados correctamente', 'value' => true]);
    }

    public function updateUser(Request $request){
        if (!Auth::check()) return redirect('/');
        $user = Auth::user();
        if($request->input('name')){
            $request->validate(['name' => ['required', 'min:1', 'max:190']]);
            $user->name = $request->input('name');
        }
        if($request->input('last_name')){
            $request->validate(['last_name' => ['required', 'min:1', 'max:190']]);
            $user->last_name = $request->input('last_name');
        }
        if($request->input('email') && $request->input('email') != $user->email){
            $request->validate(['email'=>['unique:users,email','max:100']]);
            $user->email = $request->input('email');
        }
        if($request->input('nueva_contraseña')){
            if(!$request->input('password'))
                return redirect('/mi-cuenta')->with('status', 
                    ['msg' => 'Por seguridad debe ingresar su contraseña actual antes de actualizarla.', 'value' => false]);

            if (Hash::check($request->input('password'), $user->password)) { 
                $request->validate(['password' => ['required', 'min:1', 'max:190']]);
                $user->password = Hash::make($request->input('nueva_contraseña'));
            }
            else{
                return redirect('/mi-cuenta')->with('status', 
                    ['msg' => 'Contraseña incorrecta.', 'value' => false]);
            }
        }
        else{
            $user->save();
            return redirect('/mi-cuenta')->with('status', 
            ['msg' => 'Datos actualizados correctamente', 'value' => true]);
        }
        $user->save();
        return redirect('/mi-cuenta')->with('status', 
            ['msg' => 'Datos actualizados correctamente', 'value' => true]);
        
    }

    public function deleteDireccion(Request $request, $id){
        if (!Auth::check()) return redirect('/');
        $user = Auth::user();
        $direccion = DireccionesUsuario::findOrFail($id);

        if($direccion->user_id == $user->id){
            $direccion->delete();
            return redirect('/mi-cuenta')->with('status', 
            ['msg' => 'Datos actualizados correctamente', 'value' => true]);
        }
        else
            return redirect('/mi-cuenta')->with('status', 
            ['msg' => 'Ocurrió un error al actualizar los datos.', 'value' => false]);


    }

    public function index()
    {
        return view('admin.listaUsuarios');
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
        $user = User::find($id);
        $editable = $request->query('editar', 'disabled');
        $icon;
        $color;
        switch ($user->tipo_usuario) {
            case 1:
                $icon = "fas fa-user-tag text-primary";
                $color = "color:blue;";
                break;
            case 2:
                $icon = "fas fa-user-plus";
                $color = "color:darkblue;";
                break;
            case 3:
                $icon = "fas fa-dolly";
                $color = "color:darkgreen;";
                break;
            case 4:
                $icon = "fas fa-user-cog";
                $color = "color:purple;";
                break;
            case 5:
                $icon = "fas fa-user-shield";
                $color = "color:darkred;";
                break;
        }
        return view('admin.detalleUsuario',
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
