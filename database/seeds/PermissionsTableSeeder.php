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
        	'name' 			=> 'usuarios.list',
        	'description' 	=> 'Ver todos los usuarios del sistema.'
        ]);
        //Crear nuevos usuarios
        Permission::create([
            'name'          => 'usuarios.create',
            'description'   => 'Crear nuevos usuarios del sistema.'
        ]);
        //Editar usuario
        Permission::create([
        	'name' 			=> 'usuarios.edit',
        	'description' 	=> 'Editar datos seleccionados de usuarios.'
        ]);
        //Dar de baja un usuario
        Permission::create([
        	'name' 			=> 'usuarios.unsubscribe',
        	'description' 	=> 'Dar de baja usuarios del sistema.'
        ]);

        //**************************************************************************************************


        //Permisos para roles de usuarios
        //Crear roles
        Permission::create([
        	'name' 			=> 'roles.create',
        	'description' 	=> 'Crear nuevos roles de usuario.'
        ]);
        //Ver roles
        Permission::create([

        	'name' 			=> 'roles.list',
        	'description' 	=> 'Ver todos los roles del sistema.'
        ]);
        //Editar rol
        Permission::create([
        	'name' 			=> 'roles.edit',
        	'description' 	=> 'Editar datos seleccionados de roles.'
        ]);
        //Eliminar un rol
        Permission::create([

        	'name' 			=> 'roles.delete',
        	'description' 	=> 'Eliminar roles del sistema.'
        ]);
//***************************************************************************************

        //Permisos para PRODUCTOS
        //Crear PRODUCTOS
        Permission::create([
            'name'          => 'productos.create',
            'description'   => 'Crear nuevos productos en el sistema.'
        ]);
        //Ver productos
        Permission::create([
            'name'          => 'productos.list',
            'description'   => 'Ver todos los productos creados en el sistema.'
        ]);
        //Editar producto
        Permission::create([
            'name'          => 'productos.edit',
            'description'   => 'Editar datos seleccionados de productos.'
        ]);
        //Dar de baja un producto
        Permission::create([
            'name'          => 'productos.unsubscribe',
            'description'   => 'Dar productos de baja del sistema.'
        ]);
        //Eliminar un producto
        Permission::create([

            'name'          => 'productos.delete',
            'description'   => 'Eliminar productos del sistema.'
        ]);


        //********************************************************************************

        //***************************************************************************************

        //Permisos para otras caracteristicas
        //Crear caracteristicas
        Permission::create([
            'name'          => 'caracteristicas.create',
            'description'   => 'Crear características adicionales para productos.'
        ]);
        //Ver caracteristicas
        Permission::create([
            'name'          => 'caracteristicas.list',
            'description'   => 'Ver todas las características que pueden ser agregadas a productos.'
        ]);
        //Editar caracteristicas
        Permission::create([
            'name'          => 'caracteristicas.edit',
            'description'   => 'Editar características adicionales para productos.'
        ]);
        //Eliminar caracteristicas
        Permission::create([

            'name'          => 'caracteristicas.delete',
            'description'   => 'Eliminar características adicionales para productos.'
        ]);


        //********************************************************************************

         //****************************************************************************************

        //Permisos para pedidos
        //Crear pedidos
        Permission::create([
            'name'          => 'pedidos.create',
            'description'   => 'Crear nuevos pedidos.'
        ]);
        
        //Ver pedidos
        Permission::create([
            'name'          => 'pedidos.list',
            'description'   => 'Ver todos los pedidos que se han generado.'
        ]);
        //Editar pedidos
        Permission::create([
            'name'          => 'pedidos.edit',
            'description'   => 'Editar datos seleccionados de pedidos.'
        ]);
        /*Eliminar pedidos
        Permission::create([

            'name'          => 'pedidos.delete',
           + 'description'   => 'Eliminar pedidos para un producto.'
        ]);*/
        //Cancelar pedidos
        Permission::create([
            'name'          => 'pedidos.cancel',
            'description'   => 'Cancelar pedidos.'
        ]);


        //********************************************************************************

        //***************************************************************************************

        //Permisos para estadisticas y reportes
        //ver estadisticas
        Permission::create([
            'name'          => 'estadisticas.list',
            'description'   => 'Ver estadísticas sobre ventas.'
        ]);
        
        //Ver reportes
        Permission::create([
            'name'          => 'reportes.list',
            'description'   => 'Ver, generar y descargar reportes.'
        ]);
        //ver modulo crm
        Permission::create([
            'name'          => 'crm.list',
            'description'   => 'Ver datos y estadísticas del módulo CRM.'
        ]);
        
        //********************************************************************************
         //Permisos para CATEGORIAS
        //Crear CATEGORIAS
    /*
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
    */

        //********************************************************************************

        //Permisos Especiales
        //Ver precio a distribuidor
        Permission::create([
            'name'          => 'precios.list',
            'description'   => 'Ver todos los precios para productos.'
        ]);
        //Ver precio a restaurant
        Permission::create([
            'name'          => 'precios.edit',
            'description'   => 'Editar todos los precios para productos.'
        ]);

        //Ver costo de adquisicion
        /*Permission::create([
            'name'          => 'products.list.cost',
            'description'   => 'Ver el precio de adquisición del producto'
        ]);
        */
        //********************************************************************************
        //Creación de roles por defecto
        //Rol administrador

        $role = Role::create([
        	'name' 			=> 'admin',
        ]);

        $role->givePermissionTo(Permission::all());
        
        $user = new User;
        $user->name = "Edson";
        $user->last_name = "Perez Robledo";
        $user->email = "admin@casamartinez.mx";
        $user->password = Hash::make("12345678");
        $user->tipo_usuario = 5;
        $user->save();
        
        $user->assignRole('admin');
    }
}
