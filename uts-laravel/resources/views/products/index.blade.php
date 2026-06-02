<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - UTS Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">UTS LARAVEL</a>
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('categories.index') }}">Data Kategori</a>
            <a class="nav-link active" href="{{ route('products.index') }}">Data Produk</a>
        </div>
    </div>
</nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 class="text-center my-4">DATA PRODUK (MODEL 2)</h3>
                        <hr>

                        <form action="{{ route('products.index') }}" method="GET" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari nama atau deskripsi produk..." value="{{ $search }}">
                                <button class="btn btn-primary" type="submit">Cari</button>
                                @if($search)
                                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Reset</a>
                                @endif
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th style="width: 15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $index => $product)
                                        <tr>
                                            <td>{{ $products->firstItem() + $index }}</td>
                                            <td><strong>{{ $product->name }}</strong></td>
                                            <td><span class="badge bg-info text-dark">{{ $product->category->name ?? 'Tanpa Kategori' }}</span></td>
                                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                            <td>{{ $product->stock }} pcs</td>
                                            <td>
                                                <button class="btn btn-sm btn-info disabled">Show</button>
                                                <button class="btn btn-sm btn-warning disabled">Edit</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-danger">Data Produk belum tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3 d-flex justify-content-center">
                            {{ $products->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>