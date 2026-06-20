```html
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Register SPK Pemilihan Kantin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    min-height:100vh;
    background:linear-gradient(
    135deg,
    #0f172a,
    #1e293b,
    #3b82f6
    );
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.card-register{
    width:600px;
    background:rgba(255,255,255,.12);
    backdrop-filter:blur(15px);
    padding:40px;
    border-radius:20px;
    color:white;
    box-shadow:0 8px 32px rgba(0,0,0,.3);
}

.logo{
    text-align:center;
    font-size:70px;
    margin-bottom:10px;
}

.judul{
    text-align:center;
    margin-bottom:25px;
}

.judul p{
    font-size:13px;
    color:#e2e8f0;
    line-height:1.6;
}

.form-control{
    background:rgba(255,255,255,.15);
    border:none;
    color:white;
}

.form-control::placeholder{
    color:#ddd;
}

.form-control:focus{
    background:rgba(255,255,255,.25);
    color:white;
    box-shadow:none;
}

.btn-register{
    background:#2563eb;
    border:none;
    padding:12px;
    font-weight:600;
}

.btn-register:hover{
    background:#1d4ed8;
}

a{
    text-decoration:none;
}

</style>

</head>
<body>

<div class="card-register">

    <div class="logo">
        <i class="bi bi-recycle"></i>
    </div>

    <div class="judul">

        <h4 class="fw-bold">
            SPK PEMILIHAN KANTIN
        </h4>

        <div class="mb-2">

            <span class="badge bg-success px-3 py-2">
                SISTEM PENILAIAN
            </span>

        </div>

        <p>

            Sistem Pendukung Keputusan Pemilihan
            Kantin Ramah Lingkungan Berdasarkan
            Pengelolaan Sampah Menggunakan
            Sistem Penilaian

        </p>

    </div>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <strong>Berhasil!</strong>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    {{-- Notifikasi Error --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="/register" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Nama Lengkap
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="form-control"
                placeholder="Masukkan Nama Lengkap"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Email
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="form-control"
                placeholder="Masukkan Email"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Masukkan Password"
                required>

        </div>

        <button
            type="submit"
            class="btn btn-register w-100 text-white">

            <i class="bi bi-person-plus-fill"></i>

            Daftar Sekarang

        </button>

    </form>

    <div class="text-center mt-4">

        Sudah punya akun?

        <a href="/login"
           class="text-warning fw-bold">

            Login

        </a>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
