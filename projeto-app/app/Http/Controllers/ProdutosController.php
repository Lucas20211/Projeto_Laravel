<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Produto::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Produto::create($request->all())){
            return response()->json([
                'message' => 'Produto cadastrado com successo!'
            ],201);
        }
        return response()->json([
            'message' => 'Produto não cadastrado'
        ],404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $produto)
    {
        $produtoShow = Produto::find($produto);
        if($produtoShow){
            return $produtoShow;
        }
        return response()->json([
            'message' => 'Erro ao pesquisar o produto.'
        ],404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $produto)
    {
        $produto = Produto::find($produto);
        if($produto){
            $produto->update($request->all());

            return $produto;
        }
        return response()->json([
            'message' => 'Erro ao atualizar o produto.'
        ],404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $produto)
    {
        if(Produto::destroy($produto)){
            return response()->json([
                'message' => 'Produto excluido com successo!'
            ],201);
        }
        return response()->json([
            'message' => 'Erro ao excluir o produto.'
        ],404);
    }
}
