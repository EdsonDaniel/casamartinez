<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\Http\Requests\StoreRol;
use App\User;


class RolesController extends Controller
{
    public function index()
    {
        return view('admin.listaRoles');
    }
    public function indexPermisos()
    {
        $permisos = Permission::all();
        $categorias_permisos = array();
        foreach ($permisos as $permiso) {
            $nombre_permiso = explode(".", $permiso['name']);
            $categoria      = $nombre_permiso[0];
            //$accion         = $nombre_permiso[1];
            if(!isset($categorias_permisos[$categoria])) {
                $categorias_permisos[$categoria] = array();
            }
            $categorias_permisos[$categoria][] = $permiso->toArray();
        }

        return view('admin.listaPermisos',["categorias_permisos" => $categorias_permisos]);
    }
    public function create()
    {
        $permisos = Permission::all();
        $categorias_permisos = array();
        foreach ($permisos as $permiso) {
            $nombre_permiso = explode(".", $permiso['name']);
            $categoria      = $nombre_permiso[0];
            //$accion         = $nombre_permiso[1];
            if(!isset($categorias_permisos[$categoria])) {
                $categorias_permisos[$categoria] = array();
            }
            $categorias_permisos[$categoria][] = $permiso->toArray();
        }

        return view('admin.addRol',["categorias_permisos" => $categorias_permisos]);
    }
    public function store(StoreRol $request)
    {
        $validatedData = $request->validated();
        $permisos = $request->input('permisos');
        $rol = Role::create([
            'name'         => $validatedData['name'],
            'description'  => $validatedData['description'],
        ]);
        foreach ($permisos as $id => $estado) {
            $permiso = Permission::findOrFail($id);
            $rol->givePermissionTo($permiso);
        }
        
        return redirect('/admin/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $rol = Role::find($id);
        $permisos = $rol->permissions;
        $categorias_permisos = array();
        foreach ($permisos as $permiso) {
            $nombre_permiso = explode(".", $permiso['name']);
            $categoria      = $nombre_permiso[0];
            if(!isset($categorias_permisos[$categoria])) {
                $categorias_permisos[$categoria] = array();
            }
            $categorias_permisos[$categoria][] = $permiso->toArray();
        }
        return view('admin.detalleRol',[ 
            'rol'=>$rol, 
            'categorias_permisos' => $categorias_permisos, 
            'count_permisos' => count($permisos)
        ]);
    }
    public function update(StoreRol $request, $id)
    {
        $rol = Role::find($id);
        if ($rol->name == "admin") {
            return response('-El rol admin no puede ser editado.', 422);
        }

        if ($request->input("name") != null && $request->input("name") != $rol->name ){
            $rol->name = $request->input("name");
        }

        if ($request->input("description") != null 
            && $request->input("description") != $rol->description ){
            $rol->name = $request->input("description");
        }
        $rol->save();
    }

    public function destroy(Request $request, $id){
    	$rol = Role::findOrFail($id);
    	if($rol->name == 'admin'){
    		//return response('-El rol admin no puede ser eliminado.', 422);
            return back()->with('error', '-El rol admin no puede ser eliminado.');
    	}
        $rol->permissions()->detach();
        $rol->users()->detach();
        
    	$rol->delete();
        return redirect('/admin/roles');
    }
    public function add_users(Request $request, $id){
        $rol = Role::findOrFail($id);
        $seleccionados = $request->input('usuarios');
        $empleados = User::where('tipo_usuario', '>', 3)->get();

        if ($rol->name == 'admin') {
            $empleados = $empleados->except(1);
        }
        if ($seleccionados != null) {
            $autorizados = $empleados->find($seleccionados);
            $removidos = $empleados->diff($autorizados);

            if ($autorizados == null) {
                return response('-Error al actualizar los datos.' 
                    + '\nNo se encontró al usuario seleccionado.'
                    , 422);
            }

            foreach ($autorizados as $usuario) {
                if (!$usuario->hasRole($rol)) {
                    $usuario->assignRole($rol);
                }
            }
            foreach ($removidos as $usuario) {
                if ($usuario->hasRole($rol)) {
                    $usuario->removeRole($rol);
                }
            }
            return response('-Usuarios actualizados.', 200);
        }
        else
        {
            foreach ($empleados as $usuario) {
                if ($usuario->hasRole($rol)) {
                    $usuario->removeRole($rol);
                }
            }
            return response('-Usuarios actualizados.', 200);
        }

    }
    public function delete_users(Request $request, $idRol, $idUsuario){
        if($idRol == 1 && $idUsusario == 1){
            return response('-El usuario admin principal no puede ser elimidado de este rol', 422);
        }
        $rol = Role::findOrFail($idRol);
        $user = User::findOrFail($idUsuario);

        if ($user->hasRole($rol)) {
            $user->removeRole($rol);
        }

    }
    public function getDataAjax()
    {
        $roles = Role::all();
        return response()->json($roles);
    }
    public function getDataById(Request $request, $id)
    {
        $rol = Role::find($id);
        $users = $rol->users;
        return response()->json($users);
    }
}
