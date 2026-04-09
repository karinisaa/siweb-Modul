<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mengambil semua kategori untuk dropdown form input produk
        $categories = category::all();

        // mengambil semua produk beserta kategori terkait
        $products = product::with('category')->get();

        // mengirimkan data produk ke view
        return view('products.index', compact('categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tidak digunakan saat ini karena form tambah produk sudah berada di modal pada halaman produk
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,category_id',
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_stock' => 'required|integer',
        ]);

        product::create([
            'category_id' => $validated['category_id'],
            'product_name' => $validated['product_name'],
            'product_price' => $validated['product_price'],
            'product_stock' => $validated['product_stock'],
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
