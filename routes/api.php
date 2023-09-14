<?php

use App\Http\Controllers\API\PacienteController;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!f
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('pacientes', [PacienteController::class, 'index']);
Route::post('pacientes', [PacienteController::class, 'store']);

//Obtener paciente especifico
Route::get('pacientes/{paciente}',[PacienteController::class, 'show']);

//Actualizar paciente
Route::put('/pacientes/{paciente}', [PacienteController::class, 'update']);

//Eliminar paciente
Route::delete('/pacientes/{paciente}',[PacienteController::class, 'destroy']);