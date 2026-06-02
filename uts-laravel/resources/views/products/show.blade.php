<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - UTS Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header bg-info text-white fw-bold">ℹ️ DETAIL PRODUK</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 30%">Nama Produk</th>
                                <td><strong>{{ $product->name }}</strong></td>
                            </tr>
                            <tr>
                                <th>Kategori Induk</th>
                                <td><span class="badge bg-primary">{{ $product->category->name }}</span></td>
                            </tr>
                            <tr>
                                <th>Harga Barang</th>
                                <td><span class="text-success fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span></td>
                            </tr>
                            <tr>
                                <th>Jumlah Stok</th>
                                <td>{{ $product->stock }} pcs</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $product->description ?? 'Tidak ada keterangan deskripsi.' }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary shadow-sm">Kembali ke Daftar Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>