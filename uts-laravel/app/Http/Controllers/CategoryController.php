<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil keyword pencarian nama 'search'
        $search = $request->input('search');

        // 2. Mulai Query dasar Model Category
        $query = Category::query();

        // 3. Jika user mengetik sesuatu di kolom pencarian, lakukan filter
        if ($search) {
            $query->where('name', 'like', "%" . $search . "%")
                  ->orWhere('description', 'like', "%" . $search . "%");
        }

        // 4. Urutkan dari yang terbaru dan batasi 5 data per halaman
        $categories = $query->latest()->paginate(5)->withQueryString();

        // 5. Lempar data ke halaman view index menggunakan array
        return view('categories.index', [
            'categories' => $categories,
            'search'     => $search
        ]);
    }
}