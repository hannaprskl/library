<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-right: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        .profile-header h4 {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .list-group-item {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
        }
        .list-group-item:hover {
            background-color: #e9ecef;
        }
        .container {
            margin-top: 50px;
        }
        .btn-logout {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
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
    <div class="container">
        <div class="card shadow-lg">
            <div class="card-header">
                <h3>Data Pribadi</h3>
            </div>
            <div class="card-body">
                <div class="profile-header">
                    <img src="{{ asset('build/assets/img/profil.png') }}" alt="logo" class="profile-img">
                    <div>
                        <h4 class="mb-4">Selamat datang, <strong>{{ $dataDiri['nama'] }}</strong>!</h4>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-3"><strong>Nama:</strong></div>
                    <div class="col-md-9"><p>{{ $dataDiri['nama'] }}</p></div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-3"><strong>Kelas:</strong></div>
                    <div class="col-md-9"><p>{{ $dataDiri['kelas'] }}</p></div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-3"><strong>Mata Kuliah:</strong></div>
                    <div class="col-md-9">
                        <p>{{ $dataDiri['mata_kuliah'] }}</p>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
