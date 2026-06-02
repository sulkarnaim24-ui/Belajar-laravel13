<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // 1. Fitur MENAMPILKAN DATA (Read)
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Category::query();

        if ($search) {
            $query->where('name', 'like', "%" . $search . "%")
                  ->orWhere('description', 'like', "%" . $search . "%");
        }

        $categories = $query->latest()->paginate(5)->withQueryString();

        return view('categories.index', [
            'categories' => $categories,
            'search'     => $search
        ]);
    }

    // 2. Fitur HALAMAN FORM TAMBAH (Create)
    public function create()
    {
        return view('categories.create');
    }

    // 3. Fitur PROSES SIMPAN DATA (Store)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name), 
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    // 4. Fitur HALAMAN FORM UBAH (Edit) -> Pastikan ini tertulis dengan benar
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // 5. Fitur PROSES PERBARUI DATA (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }
}