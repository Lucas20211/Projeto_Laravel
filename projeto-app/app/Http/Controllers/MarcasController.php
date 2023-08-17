<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Marca::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Marca::create($request->all())){
            return response()->json([
                'message' => 'Marca cadastrado com successo!'
            ],201);
        }
        return response()->json([
            'message' => 'Marca não cadastrado'
        ],404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $marca) // Alterado de %id para marca, por usar apiResource
    {
        $marcaShow = Marca::find($marca);
        if($marcaShow){
            return $marcaShow;
        }
        return response()->json([
            'message' => 'Erro ao pesquisar o marca.'
        ],404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $marca)
    {
        $marca = marca::find($marca);
        if($marca){
            $marca->update($request->all());

            return $marca;
        }
        return response()->json([
            'message' => 'Erro ao atualizar o marca.'
        ],404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $marca)
    {
        if(Marca::destroy($marca)){
            return response()->json([
                'message' => 'Marca excluido com successo!'
            ],201);
        }
        return response()->json([
            'message' => 'Erro ao excluir o marca.'
        ],404);
    }
}
