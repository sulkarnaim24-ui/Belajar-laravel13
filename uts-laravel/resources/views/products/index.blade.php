<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - UTS Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">UTS LARAVEL</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-white-50" href="{{ route('categories.index') }}">📦 Data Kategori</a>
                <a class="nav-link active fw-bold text-white" href="{{ route('products.index') }}">🛒 Data Produk</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded">
            <div class="card-body p-4">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold text-dark m-0">DATA PRODUK (MODEL 2)</h3>
                    <a href="{{ route('products.create') }}" class="btn btn-success fw-bold px-4 shadow-sm">+ Tambah Produk Baru</a>
                </div>
                <hr>

                <form action="{{ route('products.index') }}" method="GET" class="row g-3 mb-4">
                    <div class="col-md-4">
                        <select name="category_id" class="form-select shadow-sm">
                            <option value="">-- Semua Kategori --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ isset($category_id) && $category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control shadow-sm" placeholder="Cari nama atau deskripsi produk..." value="{{ $search ?? '' }}">
                    </div>
                    <div class="col-md-2 d-flex gap-2">
                        <button class="btn btn-primary w-100 fw-bold shadow-sm" type="submit">Cari</button>
                        @if((isset($search) && $search) || (isset($category_id) && $category_id))
                            <a href="{{ route('products.index') }}" class="btn btn-secondary shadow-sm">Reset</a>
                        @endif
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th style="width: 12%">Stok</th>
                                <th style="width: 22%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $index => $product)
                                <tr>
                                    <td>{{ $products->firstItem() + $index }}</td>
                                    <td><strong>{{ $product->name }}</strong></td>
                                    <td><span class="badge bg-info text-dark fw-bold">{{ $product->category->name }}</span></td>
                                    <td class="text-success fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>{{ $product->stock }} pcs</td>
                                    <td class="text-center">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info text-white fw-bold shadow-sm me-1">Show</a>
                                        
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning text-white fw-bold shadow-sm me-1">Edit</a>
                                        
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger fw-bold shadow-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Data Produk belum tersedia. Silakan klik tombol di atas untuk menambah data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex justify-content-center">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>