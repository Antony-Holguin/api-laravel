<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarUsuarioRequest;
use App\Http\Requests\GuardarPacienteRequest;
use App\Http\Resources\PacienteResource;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Paciente::all();
        return  PacienteResource::collection(Paciente::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardarPacienteRequest $request)
    {
        Paciente::create($request->all());
        // return response()->json([
        //     'res' => true,
        //     'message' => 'El paciente pudo ser registrado exitosamente'
        // ]);
        return new PacienteResource(Paciente::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        // return response()->json([
        //     'res'=>true,
        //     'paciente' => $paciente
        // ]);
        //return PacienteResource::collection(Paciente::find)
        return new PacienteResource($paciente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActualizarUsuarioRequest $request, Paciente $paciente)
    {
        $paciente->update($request->all());
        // return response()->json([
        //     'res' => true,
        //     'mensaje' => 'El usuario fue actualizado correctamente'
        // ],200);
        return new PacienteResource($paciente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return new PacienteResource($paciente);
        // return response()->json([
        //     'res' => true,
        //     'message' => 'El paciente fue eliminado correctamente'
        // ],200);
    }
}
