<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Bodegas;
use App\Models\Productos;
use App\Models\Movimientos;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// obtener todas las bodegas
Route::get('bodegas', function() {
    return Bodegas::all();
});
 
// obtener bodega por id
Route::get('bodega/{id}', function($id) {
    return Bodegas::find($id);
});

// crear bodega
Route::post('bodega', function(Request $request) {
    $data = $request->all();
    return Bodegas::create([
        'nombre' => $data['nombre'],
        'descripcion' => $data['descripcion'],
        'direccion' => $data['direccion']
    ]);
});

// obtener todos los productos
Route::get('productos', function() {
    return Productos::all();
});

// crear producto
Route::post('producto', function(Request $request) {
    $data = $request->all();
    return Productos::create([
        'nombre' => $data['nombre'],
        'descripcion' => $data['descripcion'],
        'codigo' => $data['codigo'],
        'foto' => $data['foto']
    ]);
});

// obtener todos los movimientos
Route::get('movimientos', function() {
    return Movimientos::all();
});

// obtener todos los movimientos por tipo INGRESO / EGRESO
Route::get('movimientos/{tipo}', function($tipo) {
     return Movimientos::where('tipo', $tipo)->get() ;
});


// crear Movimiento
Route::post('movimiento', function(Request $request) {
    $data = $request->all();
    return Movimientos::create([
        'id_bodega' => $data['id_bodega'],
        'id_producto' => $data['id_producto'],
        'tipo' => $data['tipo'],
        'cantidad' => $data['cantidad'],
        'detalle' => $data['detalle']
    ]);
});