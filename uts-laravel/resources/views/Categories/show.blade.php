<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori - UTS Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                
                <div class="card border-0 shadow-sm rounded mb-4">
                    <div class="card-header bg-info text-white fw-bold">ℹ️ DETAIL KATEGORI</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 30%">Nama Kategori</th>
                                <td><strong>{{ $category->name }}</strong></td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td><span class="badge bg-secondary">{{ $category->slug }}</span></td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $category->description ?? 'Tidak ada deskripsi.' }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary shadow-sm">Kembali ke Daftar Kategori</a>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header bg-dark text-white fw-bold">📦 DAFTAR PRODUK DALAM KATEGORI INI</div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($category->products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                        <td>{{ $product->stock }} pcs</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Belum ada produk yang terdaftar di kategori ini.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>