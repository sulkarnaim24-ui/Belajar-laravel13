<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
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

    // Fungsi untuk menampilkan halaman formulir tambah data
    public function create()
    {
        return view('categories.create');
    }

    // Fungsi untuk memproses penyimpanan data dari formulir ke database
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
}