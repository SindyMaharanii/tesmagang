<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
        $products = Product::with('user')
                    ->latest()
                    ->paginate(10);
                    
        return view('products.index', compact('products'));
    }
    public function create()
{
    return view('products.create');
}

    /**
     * Menampilkan daftar produk
     */
  public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:products|max:255',
        'description' => 'nullable',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
    ]);

     $price = str_replace('.', '', $request->price);

    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $price;
    $product->stock = $request->stock;
    $product->user_id = Auth::id();
    $product->save();

    return redirect()->route('products.index')
        ->with('success', 'Product created successfully!');
}

public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required|max:255|unique:products,name,'.$product->id,
        'description' => 'nullable',
        'price' => 'required',
        'stock' => 'required|integer|min:0',
    ]);

    // Hapus titik ribuan sebelum simpan
    $price = str_replace('.', '', $request->price);

    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $price;
    $product->stock = $request->stock;
    $product->save();

    return redirect()->route('products.index')
        ->with('success', 'Product updated successfully!!');
}

public function destroy(Product $product)
{
    $product->delete();
    return redirect()->route('products.index')
        ->with('success', 'Product was deleted!');
}

public function show(Product $product)
{
    return view('products.show', compact('product'));
}

public function edit(Product $product)
{
    return view('products.edit', compact('product'));
}

}