<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
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
                'message' => 'Marca cadastrada com sucesso.'
            ], 201);
        }
        return response()->json([
            'message' => 'Erro ao cadastrar marca.'
        ], 404);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $marca = Marca::find($id);
        if($marca){
            $response = [
                'marca' => $marca,
                'produtos' => $marca->produtos
            ];
            return $response;
        }
        return response()->json([
            'message' => 'Erro ao pesquisar marca.'
        ], 404);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $marca = Marca::find($id);
        if($marca){
        $marca->update($request->all());
        return $marca;
        }
        return response()->json([
            'message' => 'Erro ao atualizar marca.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Marca::destroy($id)){
            return response()->json([
                'message' => 'Marca excluida com sucesso.'
            ], 201);
        }
        return response()->json([
            'message' => 'Erro ao excluir marca.'
        ], 404);
    }
}
