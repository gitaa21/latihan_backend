<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $brands = Brand::all();
        return response()->json($brands);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'name.string' => 'Nama produk hanya boleh berupa teks.',
            'name.max' => 'Nama produk tidak boleh lebih dari 50 karakter.',
        ]);
        
        Brand::create($validatedData);
        return response()->json(['message' => 'Brand berhasil disimpan'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        return response()->json($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'name.string' => 'Nama produk hanya boleh berupa teks.',
            'name.max' => 'Nama produk tidak boleh lebih dari 50 karakter.',
        ]);
        
        $brand = Brand::findOrFail($id);
        $brand->update($validatedData);
        return response()->json(['message' => 'Brand berhasil diupdate'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return response()->json(['message' => 'Brand berhasil dihapus'], 200);
    }
}
