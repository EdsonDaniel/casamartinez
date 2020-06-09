<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creación de permisos por defecto

        //Permisos sobre usuarios
        //Ver usuarios
        Permission::create([
        	'name' 			=> 'users.list',
        	'description' 	=> 'Listar todos los usuarios del sistema'
        ]);
        //Editar usuario
        Permission::create([
        	'name' 			=> 'users.edit',
        	'description' 	=> 'Editar datos seleccionados del usuario'
        ]);
        //Dar de baja un usuario
        Permission::create([
        	'name' 			=> 'users.unsubscribe',
        	'description' 	=> 'Dar de baja un usuario del sistema'
        ]);

        //**************************************************************************************************


        //Permisos para roles de usuarios
        //Crear roles
        Permission::create([
        	'name' 			=> 'roles.create',
        	'description' 	=> 'Crear un nuevo rol al sistema'
        ]);
        //Ver roles
        Permission::create([

        	'name' 			=> 'roles.list',
        	'description' 	=> 'Listar todos los roles del sistema'
        ]);
        //Editar rol
        Permission::create([
        	'name' 			=> 'roles.edit',
        	'description' 	=> 'Editar datos seleccionados de un rol'
        ]);
        //Dar de baja un rol
        Permission::create([
        	'name' 			=> 'roles.unsubscribe',
        	'description' 	=> 'Dar de baja un rol del sistema'
        ]);
        //Eliminar un rol
        Permission::create([

        	'name' 			=> 'roles.delete',
        	'description' 	=> 'Eliminar un rol del sistema'
        ]);
//***************************************************************************************


         //Permisos para PRODUCTOS
        //Crear PRODUCTOS
        Permission::create([
            'name'          => 'products.create',
            'description'   => 'Crear un nuevo producto al sistema'
        ]);
        //Ver productos
        Permission::create([

            'name'          => 'products.list',
            'description'   => 'Listar todos los roles del sistema'
        ]);
        //Editar producto
        Permission::create([
            'name'          => 'products.edit',
            'description'   => 'Editar datos seleccionados de un producto'
        ]);
        //Dar de baja un producto
        Permission::create([
            'name'          => 'products.unsubscribe',
            'description'   => 'Dar de baja un producto del sistema'
        ]);
        //Eliminar un producto
        Permission::create([

            'name'          => 'products.delete',
            'description'   => 'Eliminar un producto del sistema'
        ]);


        //********************************************************************************

         //Permisos para CATEGORIAS
        //Crear CATEGORIAS
        Permission::create([
            'name'          => 'categories.create',
            'description'   => 'Crear una nueva categoria de productos al sistema'
        ]);
        //Ver categorias
        Permission::create([
            'name'          => 'categories.list',
            'description'   => 'Listar todas las categorias de productos'
        ]);
        //Editar categoria
        Permission::create([
            'name'          => 'categories.edit',
            'description'   => 'Editar datos seleccionados de una categoria'
        ]);
        //Dar de baja un categoria
        Permission::create([
            'name'          => 'categories.unsubscribe',
            'description'   => 'Dar de baja una categoria del sistema'
        ]);
        //Eliminar un categoria
        Permission::create([
            'name'          => 'categories.delete',
            'description'   => 'Eliminar una categoria del sistema'
        ]);


        //********************************************************************************

         //Permisos Especiales
        //Ver precio a distribuidor
        Permission::create([
            'name'          => 'products.list.price2',
            'description'   => 'Ver el precio del producto para distribuidores'
        ]);
        //Ver precio a restaurant
        Permission::create([
            'name'          => 'products.list.price3',
            'description'   => 'Ver el precio del producto para restaurant'
        ]);

         //Ver costo de adquisicion
        Permission::create([
            'name'          => 'products.list.cost',
            'description'   => 'Ver el precio de adquisición del producto'
        ]);

        //********************************************************************************
        //Creación de roles por defecto
        //Rol administrador

        $role = Role::create([
        	'name' 			=> 'admin',
        ]);

        $role->givePermissionTo(Permission::all());
        $user = User::create([
            'name' => 'Edson Perez',
            'email' => 'edson@gmail.com',
            'password' => '12345678',
        ]);
        $user->assignRole('admin');
    }
}
