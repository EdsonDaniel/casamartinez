<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* sitio principal*/
Route::get('/', function () {
    return view('index');
});

Route::get('/filosofia', function () {
    return view('filosofia');
});

Route::get('/historia', function () {
    return view('historia');
});

Route::get('/campos-de-maguey', function () {
    return view('campos');
});

Route::get('/certificaciones', function () {
    return view('certificaciones');
});


Route::get('/productos', function () {
    return view('productos');
});


Route::get('/catalogo', function(){return view('catalogo');});
//Route::get('/tienda', function(){return view('tienda');});
Route::get('/tienda', 'TiendaController@index');
Route::get('/tienda/detalles-producto/', function(){return view('detalleProducto');});

Route::get('/carrito', function () {
    return view('carrito');
});


Route::post('/add-to-cart/{id}', 'CartController@push');
Route::post('/empty-cart', 'CartController@deleteAll');
Route::post('/update-cart', 'CartController@updateCart');
Route::post('/validate-cart', 'CartController@validateCart');

Route::get('/carrito-de-compras', 'CartController@index');
Route::get('/informacion-de-envio', 'CartController@addInfoEnvio');
Route::post('/checkout', 'CartController@checkout');
Route::get('/checkout', 'CartController@pagar');

Route::post('/checkout/end-point/stripe','TiendaController@webhookStripe');
Route::post('/checkout/end-point/mercado-pago','TiendaController@webhookMP');

Route::get('/mail-view', 'TiendaController@previewEmail');
Route::get('/pago-exitoso', 'TiendaController@pagoExitoso');
Route::get('/pago-rechazado', 'TiendaController@pagoRechazado');



/*****************Rutas con middleware ////////////////////////////////*/

Route::get('/mi-cuenta', 'UserController@micuenta')
->middleware('auth');
Route::post('/nueva-direccion', 'UserController@addDireccion')->middleware('auth');
Route::post('/update-user', 'UserController@updateUser')->middleware('auth');
Route::post('/delete-direccion/{id}', 'UserController@deleteDireccion')->middleware('auth');
Route::post('/update-direccion', 'UserController@updateDireccion')->middleware('auth');


Route::get('/dash', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Grupo de rutas protegidas por un moddleware
/*Route::middleware(['auth'])->group(function () {
   
/*Route::post('products/store', 'ProductController@store')->name('products.store')
                                                        ->middleware('permission:products.create');
    Route::get('products', 'ProductController@index')->name('products.index')
                                                        ->middleware('permission:products.index');
    Route::get('products/create', 'ProductController@create')->name('products.create')
                                                        ->middleware('permission:products.create');
    Route::put('products/{role}', 'ProductController@update')->name('products.update')
                                                        ->middleware('permission:products.edit');
    Route::get('products/{role}', 'ProductController@show')->name('products.show')
                                                        ->middleware('permission:products.show');
    Route::delete('products/{role}', 'ProductController@destroy')->name('products.destroy')
                                                        ->middleware('permission:products.destroy'); *
    Route::get('products/', 'HomeController@index2')->name('users.edit')
    	->middleware('permission:users.edit');
});*/


//Rutas para el dashboard de administrador

Route::get('/admin', function(){
    return view('admin/ventas');
})->name('admin');


Route::get('/admin/users', function(){
    return view('admin/usuarios');
})->name('usuarios');


Route::post('/agregar-al-carrito','UserController@addToCar');



//*****************************************rutasd Crud productos***************************/
Route::get('/admin/productos', 'ProductosController@index'); 
Route::get('/admin/productos/agregar', 'ProductosController@create');
Route::post('/admin/productos/guardar','ProductosController@store');

Route::get('/admin/productos/detalles/{id}','ProductosController@show');

Route::post('/admin/productos/update/{id}','ProductosController@updateProduct');
Route::post('/admin/productos/update_caracteristicas/{id}','ProductosController@updateCaractProduct');
Route::post('/admin/productos/update_presentacion/{id_pres}','ProductosController@updatePresentacion');
Route::post('/admin/productos/add_presentaciones/{id}','ProductosController@addPresentaciones');

Route::post('/admin/productos/delete/{id}','ProductosController@destroyProducto');
Route::post('/admin/productos/delete_caracteristicas/{id}','ProductosController@deleteCaractProduct');
Route::post('/admin/productos/delete_presentacion/{id_pres}','ProductosController@destroyPresentacion');
Route::post('/admin/productos/upload_presentacion/{id_pres}','ProductosController@uploadPresentacion');
Route::post('/admin/productos/restore/{id}','ProductosController@restoreProducto');


Route::get('/admin/productos/ajax', 'ProductosController@getDataAjax');
Route::get('/admin/productos/baja/ajax', 'ProductosController@getDataAjaxBaja');
/****************************************** CRUD PRODUCTOS ***************************************/



//*****************************************rutasd Crud caracteristicas***************************/
Route::get('/admin/caracteristicas', 'CaracteristicasController@index'); 

//rutas para agregar caracteristicas adicionales a un producto
Route::post('/admin/caracteristicas/', 'CaracteristicasController@store');
//ruta para actualizar una caracteristica especifica
Route::post('/admin/caracteristicas/update/{id}', 'CaracteristicasController@update');
//ruta para eliminar una caracteristica especifica
Route::post('/admin/caracteristicas/delete/{id}', 'CaracteristicasController@destroy');

//rutas obtener datos de caracteristicas mediante AJAX
Route::get('/admin/caracteristicas/ajax', 'CaracteristicasController@getDataAjax');
Route::get('/admin/caracteristicas/ajax/{id_caract}', 'CaracteristicasController@getDataById');

//*****************************************rutasd Crud caracteristicas***************************/




//*****************************************rutasd Crud usuarios***************************/
//lista de usuarios
Route::get('/admin/usuarios', 'UserController@index'); 
//Detalles de un usuario
Route::get('/admin/usuarios/detalles/{id}', 'UserController@show'); 
//ruta para crear un usuario ****
Route::get('/admin/usuarios/agregar', 'UserController@create'); 
Route::post('/admin/usuarios/store', 'UserController@store');
//rutas para actualizar una usuario especifica
//Route::get('/admin/usuarios/update/{id}', 'UserController@update');
Route::post('/admin/usuarios/update/{id}', 'UserController@update');

//ruta para baja de un usuario
//Route::post('/admin/usuarios/delete/{id}', 'UserController@destroy');
Route::post('/admin/usuarios/baja/{id}', 'UserController@baja');
//ruta para alta de un usuario
Route::post('/admin/usuarios/alta/{id}', 'UserController@alta');

//rutas obtener datos de usuario mediante AJAX
Route::get('/admin/usuarios/activos/ajax', 'UserController@getDataAjaxActive');
Route::get('/admin/usuarios/inactivos/ajax', 'UserController@getDataAjaxInactive');
Route::get('/admin/usuarios/ajax/{id}', 'UserController@getDataById');
Route::get('/admin/usuarios/empleados/ajax', 'UserController@getUsersEmpleados');

//*****************************************rutasd Crud usuarios***************************/




//*****************************************rutasd Crud roles***************************/
//lista de roles
Route::get('/admin/roles', 'RolesController@index'); 
//Detalles de un rol
Route::get('/admin/roles/detalles/{id}', 'RolesController@show'); 
//ruta para crear un rol ****
Route::get('/admin/roles/agregar', 'RolesController@create'); 
Route::post('/admin/roles/store', 'RolesController@store');
Route::post('/admin/roles/{id}/add_usuarios', 'RolesController@add_users');
Route::post('/admin/roles/{idRol}/delete_usuarios/{idUsuario}', 'RolesController@delete_users');
//rutas para actualizar un rol especifica
//Route::get('/admin/usuarios/update/{id}', 'UserController@update');
Route::post('/admin/roles/update/{id}', 'RolesController@update');

//ruta para eliminar un rol
Route::post('/admin/roles/delete/{id}', 'RolesController@destroy');
//Route::post('/admin/roles/baja/{id}', 'RolesController@baja');
//ruta para alta de roles usuario
//Route::post('/admin/roles/alta/{id}', 'RolesController@alta');

//rutas obtener datos de roles mediante AJAX
Route::get('/admin/roles/ajax', 'RolesController@getDataAjax');
Route::get('/admin/roles/ajax/{id}', 'RolesController@getDataById');
//Route::get('/admin/roles/ajax/{id}', 'RolesController@getDataById');

//*****************************************rutasd Crud roles***************************/

/**************************************rutas permisos ////////////////////////////////*/
//lista de permisos
Route::get('/admin/permisos', 'RolesController@indexPermisos'); 
/***************************************************************************************/

//*****************************************rutasd Crud entradas***************************/
//lista de entradas
Route::get('/admin/entradas', 'EntradasController@index'); 
//Detalles de una entrada
Route::get('/admin/entradas/detalles/{id}', 'EntradasController@show'); 
//ruta para crear un entrada ****
Route::get('/admin/entradas/agregar', 'EntradasController@create'); 
Route::post('/admin/entradas/store', 'EntradasController@store');

//rutas para actualizar un entrada especifica
Route::post('/admin/entradas/update/{id}', 'EntradasController@update');

//ruta para eliminar un entrada
Route::post('/admin/entradas/delete/{id}', 'EntradasController@destroy');

//rutas obtener datos de entradas mediante AJAX
Route::get('/admin/entradas/ajax', 'EntradasController@getDataAjax');
Route::get('/admin/entradas/ajax/{id}', 'EntradasController@getDataById');


//*****************************************rutasd Crud entradas***************************/

Route::get('/admin/preview', function (){ return view('admin.usuarios');}); 

//*****************************************rutasd Crud pedidos***************************/
//lista de pedidos
Route::get('/admin/pedidos', 'PedidoController@index'); 
//Detalles de un pedido
Route::get('/admin/pedidos/detalles/{id}', 'PedidoController@show'); 
//ruta para crear un pedido ****
Route::get('/admin/pedidos/agregar', 'PedidoController@create'); 
Route::post('/admin/pedidos/enviar/{id}', 'PedidoController@enviar');
Route::post('/admin/pedidos/entregado/{id}', 'PedidoController@entregado');
Route::post('/admin/pedidos/cancelado/{id}', 'PedidoController@cancelado');

//rutas para actualizar una pedido especifica
//Route::get('/admin/pedidos/update/{id}', 'PedidoController@update');
Route::post('/admin/pedidos/update/{id}', 'PedidoController@update');

//ruta para baja de un pedido
//Route::post('/admin/pedidos/delete/{id}', 'PedidoController@destroy');
Route::post('/admin/pedidos/baja/{id}', 'PedidoController@baja');
//ruta para alta de un pedido
Route::post('/admin/pedidos/alta/{id}', 'PedidoController@alta');

//rutas obtener datos de pedido mediante AJAX
Route::get('/admin/pedidos/activos/ajax', 'PedidoController@getDataAjaxActive');
Route::get('/admin/pedidos/inactivos/ajax', 'PedidoController@getDataAjaxInactive');
Route::get('/admin/pedidos/ajax/{id}', 'PedidoController@getDataById');
Route::get('/admin/pedidos/ajax/', 'PedidoController@getDataAjax');
Route::get('/admin/pedidos/empleados/ajax', 'PedidoController@getUsersEmpleados');

//*****************************************rutasd Crud pedidos***************************/


/***********************rutas estadisticas *///////////////////////////
Route::get('/admin/ventas/ajax', 'PedidoController@getVentasAjax');
Route::get('/admin/ventas-anio/ajax', 'PedidoController@getVentasAnioAjax');
Route::get('/admin/mas-vendidos/ajax', 'PedidoController@getVendidosAjax');

