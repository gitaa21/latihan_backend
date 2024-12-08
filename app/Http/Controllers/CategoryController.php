<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        return response()->json($categories);
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
        
        Category::create($validatedData);
        return response()->json(['message' => 'Category berhasil disimpan'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
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
        
        $category = Category::findOrFail($id);
        $category->update($validatedData);
        return response()->json(['message' => 'Category berhasil diupdate'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Category berhasil dihapus'], 200);
    }
}
