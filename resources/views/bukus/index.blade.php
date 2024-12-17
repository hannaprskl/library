<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            margin-bottom: 30px;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            font-size: 1.1rem;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 15px;
        }

        .table th,
        .table td {
            vertical-align: middle;
            padding: 12px;
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-success,
        .btn-primary {
            font-size: 1rem;
            font-weight: bold;
            padding: 10px 20px;
        }

        .btn-logout {
            background-color: #dc3545;
            color: white;
            font-size: 1rem;
            font-weight: bold;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Home</a>
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('siswas.index') }}">Daftar Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bukus.index') }}">Daftar Buku</a>
                </li>
            </ul>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-logout ms-3" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ route('bukus.create') }}" class="btn btn-success">Tambah Buku</a>
                <a href="{{ route('peminjaman_buku.index') }}" class="btn btn-primary ms-2">Peminjaman Buku</a>
            </div>
        </div>
        <div class="card shadow-lg">
            <div class="card-header text-center">
                Daftar Buku
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tahun Terbit</th>
                            <th>Penerbit</th>
                            <th>ISBN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bukus as $index => $buku)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $buku->judul }}</td>
                                <td>{{ $buku->penulis }}</td>
                                <td>{{ $buku->tahun_terbit }}</td>
                                <td>{{ $buku->penerbit }}</td>
                                <td>{{ $buku->isbn }}</td>
                                <td class="text-center">
                                    <form action="{{ route('bukus.destroy', $buku->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-4">
                    {{ $bukus->links() }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
