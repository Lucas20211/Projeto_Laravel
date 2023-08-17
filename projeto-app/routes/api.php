<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\MarcasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::get('/teste',);
// Route::get('/produto', [ProdutosController::class, 'index']);
// Route::get('/produto/{id}', [ProdutosController::class, 'show']);
// Route::put('/produto/{id}', [ProdutosController::class, 'update']);
// Route::post('/produto', [ProdutosController::class, 'store']);
// Route::delete('/produto/{id}', [ProdutosController::class, 'destroy']);

// Route::get('/marca', [MarcasController::class, 'index']);
// Route::get('/marca/{id}', [MarcasController::class, 'show']);
// Route::put('/marca/{id}', [MarcasController::class, 'update']);
// Route::post('/marca', [MarcasController::class, 'store']);
// Route::delete('/marca/{id}', [MarcasController::class, 'destroy']);

// Route::apiResource('marca', MarcasController::class); // para simplificar o codigo - precisa alterar no controller o $id

Route::apiResources([
    'marca'=> MarcasController::class,
    'produto'=> ProdutosController::class
]);

Route::post('/register', [AuthController::class, 'register']); // cria o usuário
Route::post('/login', [AuthController::class, 'login']); // cria o login

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

