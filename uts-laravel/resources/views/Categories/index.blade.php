<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori - UTS Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 class="text-center my-4">DATA KATEGORI (MODEL 1)</h3>
                        <hr>

                        <form action="{{ route('categories.index') }}" method="GET" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari nama atau deskripsi kategori..." value="{{ $search }}">
                                <button class="btn btn-primary" type="submit">Cari</button>
                                @if($search)
                                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Reset</a>
                                @endif
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Nama Kategori</th>
                                        <th>Slug</th>
                                        <th>Deskripsi</th>
                                        <th style="width: 15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $index => $category)
                                        <tr>
                                            <td>{{ $categories->firstItem() + $index }}</td>
                                            <td><strong>{{ $category->name }}</strong></td>
                                            <td><span class="badge bg-secondary">{{ $category->slug }}</span></td>
                                            <td>{{ $category->description ?? '-' }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info disabled">Show</button>
                                                <button class="btn btn-sm btn-warning disabled">Edit</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-danger">Data Kategori belum tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3 d-flex justify-content-center">
                            {{ $categories->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>