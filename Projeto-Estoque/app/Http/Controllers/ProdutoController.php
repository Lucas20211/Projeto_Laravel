<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
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
                'message' => 'Cadastro do produto efetuado com sucesso.'
            ]);
            return response()->json([
                'message' => 'Erro ao cadastrar produto.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $produto = Produto::find($id);
        if($produto){
            return $produto;
        }
        return response()->json([
            'message' => 'Erro ao pesquisar produto.'
        ], 404);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $path = $request->imagem->store('imagem_produto', 'public');
       
        $produto = Produto::find($id);
        if($produto){
            $produto->imagem = $path;
            if($produto->save()){
                return $produto;
            }
            return response()->json([
                'message' => 'Erro ao atualizar produto.'
            ], 404);
        }
        return response()->json([
            'message' => 'Erro ao atualizar produto.'
        ], 404);
            

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Produto::destroy($id)){
            return response()->json([
                'message' => 'Marca excluida com sucesso.'
            ], 201);
        }
        return response()->json([
            'message' => 'Erro ao excluir marca.'
        ], 404);
    }
}
