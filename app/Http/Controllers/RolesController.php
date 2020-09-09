<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Routing\ResponseFactory;

class RolesController extends Controller
{
    public function index()
    {
        return view('admin.listaRoles');
    }
    public function create()
    {
    	$permisos = Permission::all();
        return view('admin.addRol',["permisos" => $permisos]);
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
        $usuario = User::find($id);

    }

    public function destroy(Request $request, $id){
    	$rol = Role::find($id);
    	if($rol->name == 'admin'){
    		return response('-El usuario administrador no puede ser eliminado.', 422);
    	}
    	$rol->delete();
    }

    public function getDataAjax()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    public function getDataById(Request $request, $id)
    {
        $rol = Role::find($id);
        return response()->json($rol);
    }
}
