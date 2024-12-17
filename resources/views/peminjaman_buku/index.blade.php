<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h1 {
            color: #343a40;
            font-weight: bold;
        }

        .table th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .btn-primary,
        .btn-secondary {
            font-size: 0.9rem;
            font-weight: bold;
        }

        .btn-sm {
            font-size: 0.8rem;
            font-weight: bold;
        }

        .pagination {
            justify-content: center;
        }

        .empty-message {
            font-style: italic;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Peminjaman Buku</h1>
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('peminjaman_buku.create') }}" class="btn btn-success">Tambah Peminjaman</a>
            <a href="{{ route('laporan-peminjaman') }}" class="btn btn-primary ms-3">Lihat Laporan Peminjaman</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Buku</th>
                            <th>Pengguna</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjamanBukus as $peminjaman)
                        <tr>
                            <td>{{ $peminjaman->buku->judul ?? 'Data Buku Tidak Ada' }}</td>
                            <td>{{ $peminjaman->user->name ?? 'Data User Tidak Ada' }}</td>
                            <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                            <td>{{ $peminjaman->tanggal_pengembalian ?? 'Belum Dikembalikan' }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    @if (is_null($peminjaman->tanggal_pengembalian))
                                    <a href="{{ route('peminjaman_buku.returnBook', $peminjaman->id) }}" class="btn btn-warning btn-sm">Kembalikan</a>
                                    @else
                                    <span class="text-success">Sudah Dikembalikan</span>
                                    @endif
                                    <form action="{{ route('peminjaman_buku.destroy', $peminjaman->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data peminjaman ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center empty-message">Belum ada data peminjaman.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $peminjamanBukus->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
