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


Route::get('/catalogo', function () {
    return view('catalogo');
});

Route::get('/carrito', function () {
    return view('carrito');
});






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

Route::get('/admin/products', 'ProductosController@index');
//})->name('productos');



//rutas para agregar caracteristicas adicionales a un producto

Route::post('/admin/caracteristicas/', 'CaracteristicasController@store');

//rutas obtener datos de caracteristicas mediante AJAX
Route::get('/admin/caracteristicas/ajax', 'CaracteristicasController@get_data_ajax');