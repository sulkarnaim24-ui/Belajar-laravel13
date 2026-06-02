<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil keyword pencarian nama 'search'
        $search = $request->input('search');

        // 2. Mulai Query dasar Model Product dengan merelasikan tabel Category (eager loading)
        $query = Product::with('category');

        // 3. Jika user mengetik sesuatu di kolom pencarian produk
        if ($search) {
            $query->where('name', 'like', "%" . $search . "%")
                  ->orWhere('description', 'like', "%" . $search . "%");
        }

        // 4. Urutkan dari yang terbaru dan batasi 5 data per halaman
        $products = $query->latest()->paginate(5)->withQueryString();

        // 5. Lempar data ke halaman view index milik folder products
        return view('products.index', [
            'products' => $products,
            'search'   => $search
        ]);
    }
}