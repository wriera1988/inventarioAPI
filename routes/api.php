<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Bodegas;
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
