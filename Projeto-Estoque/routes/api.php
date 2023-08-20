<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
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

Route::group(['middleware'=> ['auth:sanctum']], function () {
    
    Route::post('/marca', [MarcaController::class, 'store']);
    Route::get('/marca', [MarcaController::class, 'index']);
    Route::put('/marca/{id}', [MarcaController::class, 'update']);
    Route::get('/marca/{id}', [MarcaController::class, 'show']);
    Route::delete('/marca/{id}', [MarcaController::class, 'destroy']);
    
    Route::post('/produto', [ProdutoController::class, 'store']);
    Route::get('/produto', [ProdutoController::class, 'index']);
    Route::put('/produto/{id}', [ProdutoController::class, 'update']);
    Route::get('/produto/{id}', [ProdutoController::class, 'show']);
    Route::delete('/produto/{id}', [ProdutoController::class, 'destroy']);
    
    Route::apiResource('fornecedores', FornecedorController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
});
    
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

