<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Registrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Data Registrasi</h2>

    {{-- Form Update --}}
@isset($data)
<form action="{{ route('register.update', $data->id) }}" method="POST" class="mb-5">
    @csrf
    @method('PUT')
    <!-- semua input disini -->
</form>
@else
<div class="alert alert-danger">Data tidak ditemukan.</div>
@endisset

    <div class="mb-3">
        <label class="form-label">Nama:</label>
        <input type="text" name="name" value="{{ $data->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Email:</label>
        <input type="email" name="email" value="{{ $data->email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Telepon:</label>
        <input type="text" name="phone" value="{{ $data->telepon }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Bisnis:</label>
        <input type="text" name="business" value="{{ $data->name_bisnis }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Alamat:</label>
        <textarea name="address" class="form-control">{{ $data->address }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

    {{-- Tabel Data --}}
    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Nama Bisnis</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allData as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ $item->name_bisnis }}</td>
                    <td>{{ $item->address }}</td>
                    <td class="text-center">
                        <a href="{{ route('register.edit', ['id' => $item->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('register.delete', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
