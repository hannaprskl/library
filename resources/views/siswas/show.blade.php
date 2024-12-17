<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Detail Siswa</h1>
        <div class="card shadow">
            <div class="card-body">
                <p><strong>No Pendaftaran:</strong> {{ $siswa->no_pendaftaran }}</p>
                <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
                <p><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
                <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') }}</p>
                <p><strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin }}</p>
                <a href="{{ route('siswas.index') }}" class="btn btn-primary">Kembali ke Daftar Siswa</a>
            </div>
        </div>
    </div>
</body>
</html>
