<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - UTS Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header bg-primary text-white fw-bold">TAMBAH KATEGORI BARU</div>
                    <div class="card-body">
                        
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Kategori</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama kategori..." required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Deskripsi</label>
                                <textarea name="description" class="form-control" rows="4" placeholder="Masukkan deskripsi kategori (opsional)..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-success shadow-sm">Simpan Data</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary shadow-sm">Kembali</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>