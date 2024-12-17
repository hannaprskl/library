<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
            padding: 20px;
        }

        .table th, .table td {
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
        .btn-secondary {
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

        .alert {
            margin-bottom: 30px;
        }

        .pagination {
            justify-content: center;
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
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-4 d-flex gap-3">
    <a href="{{ route('siswas.create') }}" class="btn btn-success btn-lg px-5">Tambah Siswa</a>
    <a href="{{ route('laporan-siswa') }}" class="btn btn-primary btn-lg px-5">Lihat Laporan Siswa</a>
</div>
        <div class="card shadow-lg">
            <div class="card-header">
                <h3>Daftar Siswa</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No Pendaftaran</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                        <tr>
                            <td>{{ $siswa->no_pendaftaran }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->alamat }}</td>
                            <td>{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') }}</td>
                            <td>{{ $siswa->jenis_kelamin }}</td>
                            <td>
                                <form action="{{ route('siswas.destroy', $siswa->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
                    {{ $siswas->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
