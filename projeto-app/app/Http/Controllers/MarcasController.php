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
        return Marca::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $marca) // Alterado de %id para marca, por usar apiResource
    {
        return Marca::findOrFail($marca);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $marca)
    {
        $marca = Marca::findOrFail($marca);
        $marca->update($request->all());
        return $marca;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $marca)
    {
        return Marca::destroy($marca);
    }
}
