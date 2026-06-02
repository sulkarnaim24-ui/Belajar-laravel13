<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - UTS Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded mb-5">
                    <div class="card-header bg-success text-white fw-bold">🛒 TAMBAH PRODUK BARU</div>
                    <div class="card-body p-4">
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pilih Kategori Induk</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Produk</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukkan nama produk..." required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Harga</label>
                                    <input type="number" name="price" class="form-control" placeholder="Contoh: 15000" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Stok</label>
                                    <input type="number" name="stock" class="form-control" placeholder="Contoh: 50" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Deskripsi Produk</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi produk..."></textarea>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success fw-bold px-4 shadow-sm">Simpan Produk</button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary shadow-sm px-4">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>