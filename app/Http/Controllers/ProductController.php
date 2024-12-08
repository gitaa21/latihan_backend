<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');  // Default to empty string if no keyword is provided
        $categoryName = $request->get('category_name');
        $brandName = $request->get('brand_name');

        $query = Product::query();

        if ($keyword) {
            $query = $query->where('name', 'like', "%{$keyword}%");
        }

        if ($categoryName) {
            $query->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->where('categories.name', 'like', "%{$categoryName}%");
        }

        if ($brandName) {
            $query->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.name as brand_name')
            ->where('brands.name', 'like', "%{$brandName}%");
        }
        $products = $query->orderBy('name')->paginate(10);
    
        // Fetch all brands and categories
        // $brands = Brand::all();
        // $categories = Category::all();
    
        // Return the response as JSON
        return response()->json([
            'products' => $products,
            // 'brands' => $brands,
            // 'categories' => $categories,
            'query' => $query->toSql(), // cara menampilkan query nya
        ]);
    }
    
        // $products = Product::all(); //bisa pake get juga
        //->where('name', 'like', '%'.$keyword.'%')
        //Product::where('name', 'like', '%'.$keyword.'%')->orderBy('name')->paginate(10); 
        // $brands = Brand::all();
        // $categories = Category::all();
        //$products = Product::where('name', 'like', '%'.$keyword.'%')->orderByDesc('name')->paginate(10); //Dsc
        // return response()->json(['products' => $products]);

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'price' => 'required|numeric', //numeric bisa integer dan string angka bisa desimal juga
            'stock' => 'required|integer|min:0', //cuma bisa angka aja
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'name.string' => 'Nama produk hanya boleh berupa teks.',
            'name.max' => 'Nama produk tidak boleh lebih dari 50 karakter.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'stock.required' => 'Stok produk wajib diisi.',
            'stock.integer' => 'Stok harus berupa bilangan bulat.',
            'stock.min' => 'Stok tidak boleh dibawah 0.'
        ]);

        Product::create($validatedData);
        return response()->json(['message' => 'Product berhasil disimpan'], 201);
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'price' => 'required|numeric',
        //     'stock' => 'required|integer',
        // ]);
        // $product = Product::create($validatedData);
        // if (!$product) {
        //     return response()->json(['message' => 'Product tidak ditemukan'], 404);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id); //findOrFail ga perlu kondisi jika error karna jika tidak ditemukan akan otomatis return error
        return response()->json($product);

        // $product = Product::find($id); //kalo make find perlu kondisi untuk return error

        // if($product) {
        //     return response()->json(['products' => $product]);
        // } else {
        //     return response()->json(['message' => 'Product tidak ditemukan'], 404);
        // }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'price' => 'required|numeric', //numeric bisa integer dan string angka
            'stock' => 'required|integer|min:0', //cuma bisa angka aja
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'name.required' => 'Nama produk hanya boleh berupa teks.',
            'name.max' => 'Nama produk tidak boleh lebih dari 50 karakter.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'stock.required' => 'Stok produk wajib diisi.',
            'stock.integer' => 'Stok harus berupa bilangan bulat.',
            'stock.min' => 'Stok tidak boleh dibawah 0.'
        ]);
        $product = Product::findOrFail($id);
        $product->update($validatedData);
        return response()->json(['message' => 'Product berhasil diupdate'], 200);

        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'price' => 'required|numeric',
        //     'stock' => 'required|integer',
        // ]);
        // $product = Product::find($id);
        // if (!$product) {
        //     return response()->json(['message' => 'Product tidak ditemukan'], 404);
        // }

        // $product->update($validatedData);
        // return response()->json(['message' => 'Product berhasil diupdate', 'product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Produk berhasil dihapus'], 200);
        // $product = Product::find($id);

        // if (!$product) {
        //     return response()->json(['message' => 'Product tidak ditemukan'], 404);
        // }

        // $product->delete();
        // return response()->json(['message' => 'Product berhasil dihapus']);
    }
}
