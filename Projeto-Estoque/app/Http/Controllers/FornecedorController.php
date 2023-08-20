<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Fornecedor::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Fornecedor::create($request->all()); 
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $fornecedores)
    {
        return Fornecedor::findOrFail($fornecedores);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $fornecedores)
    {
        $fornecedor = Fornecedor::findOrFail($fornecedores);

        $fornecedor->update($request->all());

        return $fornecedor;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $fornecedores)
    {
        if(Fornecedor::destroy($fornecedores)){
            response()->json([
                'message' => 'Fornecedor excluida com sucesso.'
            ], 201);
        }
        return response()->json([
            'message' => 'Erro ao excluir fornecedor.'
        ], 404);
    }
}
