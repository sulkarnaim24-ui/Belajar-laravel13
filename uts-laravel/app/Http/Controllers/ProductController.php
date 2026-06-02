<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Commit 7: Read dengan Search, Pagination, dan Filter Kategori
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category_id = $request->input('category_id');

        // Mengambil data produk beserta relasi kategorinya
        $query = Product::with('category');

        // Fitur Pencarian
        if ($search) {
            $query->where('name', 'like', "%" . $search . "%")
                  ->orWhere('description', 'like', "%" . $search . "%");
        }

        // Fitur Filter Kategori
        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        $products = $query->latest()->paginate(5)->withQueryString();
        $categories = Category::all(); // Untuk isi dropdown filter

        return view('products.index', compact('products', 'categories', 'search', 'category_id'));
    }

    // Commit 8: Form Tambah Data
    public function create()
    {
        $categories = Category::all(); // Dropdown pilihan kategori induk
        return view('products.create', compact('categories'));
    }

    // Prosedur Simpan Data
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Product::create([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'price'       => $request->price,
            'stock'       => $request->stock,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Commit 11: Halaman Detail (Show)
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Commit 9: Form Edit Data
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Prosedur Update Data
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'price'       => $request->price,
            'stock'       => $request->stock,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Commit 10: Fungsi Delete
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}