<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Pengembang Sistem</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:linear-gradient(
    135deg,
    #0f172a,
    #1e293b,
    #3b82f6
    );
    min-height:100vh;
    color:white;
}

.container-custom{
    max-width:1200px;
    margin:auto;
    padding:40px 20px;
}

.judul{
    text-align:center;
    margin-bottom:30px;
}

.judul h2{
    font-weight:bold;
}

.judul p{
    color:#e5e7eb;
}

.foto-dosen{
    width:150px;
    height:190px;
    object-fit:cover;
    border-radius:10px;
    border:3px solid white;
    background:white;
    padding:3px;
    box-shadow:0 4px 12px rgba(0,0,0,.4);
}

.foto-mahasiswa{
    width:130px;
    height:170px;
    object-fit:cover;
    border-radius:10px;
    border:3px solid white;
    background:white;
    padding:3px;
    box-shadow:0 4px 12px rgba(0,0,0,.4);
}

.nama{
    margin-top:10px;
    font-weight:bold;
}

.box-deskripsi{
    margin-top:35px;
    background:rgba(255,255,255,.12);
    backdrop-filter:blur(15px);
    padding:25px;
    border-radius:15px;
    text-align:justify;
    line-height:1.9;
}

.btn-kembali{
    background:#2563eb;
    border:none;
    padding:10px 25px;
    border-radius:10px;
}

.btn-kembali:hover{
    background:#1d4ed8;
}

</style>

</head>
<body>

<div class="container-custom">

    <!-- JUDUL -->

    <div class="judul">

        <h2>
            Team Pengembang Project
        </h2>

        <p>
            Sistem Pendukung Keputusan Pemilihan Kantin Ramah Lingkungan
            Berdasarkan Kriteria Pengelolaan Sampah
        </p>

    </div>

    <!-- DOSEN -->

    <div class="text-center mb-5">

        <img src="{{ asset('images/team/dosen.jpeg') }}"
             class="foto-dosen">

        <h5 class="nama">
            Yumarlin MZ, S.Kom., M.Pd., M.Kom.
        </h5>

        <small>
            Dosen Pembimbing
        </small>

    </div>

    <!-- TIM MAHASISWA -->

    <div class="row text-center justify-content-center">

        <div class="col-md-3 mb-4">

            <img src="{{ asset('images/team/radit.jpeg') }}"
                 class="foto-mahasiswa">

            <h6 class="nama">
                Raditya Rinda Mardeansyah
            </h6>

        </div>

        <div class="col-md-3 mb-4">

            <img src="{{ asset('images/team/habib.jpeg') }}"
                 class="foto-mahasiswa">

            <h6 class="nama">
                Moh Habib Jakiya
            </h6>

        </div>

        <div class="col-md-3 mb-4">

            <img src="{{ asset('images/team/ilzam.jpeg') }}"
                 class="foto-mahasiswa">

            <h6 class="nama">
                Mohammad Ilzam
            </h6>

        </div>

    </div>

    <!-- DESKRIPSI -->

    <div class="box-deskripsi">

        <p>

            Website ini merupakan hasil pengembangan dari Sistem Pendukung
            Keputusan Pemilihan Kantin Ramah Lingkungan Berdasarkan
            Pengelolaan Sampah Menggunakan Evaluasi Kriteria (Multi Attribute
            Utility Theory). Sistem ini dirancang untuk membantu pihak
            kampus dalam menentukan kantin terbaik berdasarkan sejumlah
            kriteria yang telah ditentukan secara objektif, transparan,
            dan terukur.

        </p>

        <p>

            Pengembangan sistem dilakukan oleh mahasiswa Program Studi
            Informatika Universitas Janabadra sebagai implementasi
            penerapan metode Sistem Pendukung Keputusan berbasis web
            menggunakan framework Laravel dan database MySQL. Metode
            Sistem ini digunakan untuk melakukan proses penilaian dan
            perangkingan alternatif kantin berdasarkan nilai utilitas
            dari setiap kriteria yang telah ditentukan.

        </p>

        <p>

            Sistem ini diharapkan dapat membantu proses pengambilan
            keputusan menjadi lebih cepat, akurat, dan transparan
            dalam memilih kantin yang menerapkan prinsip ramah
            lingkungan, khususnya dalam aspek pengelolaan sampah,
            kebersihan, dan keberlanjutan lingkungan kampus.

        </p>

        <p>

            Kami mengucapkan terima kasih kepada dosen pembimbing,
            Universitas Janabadra, serta seluruh pihak yang telah
            memberikan dukungan dan kontribusi dalam proses
            pengembangan sistem ini.

        </p>

    </div>

    <!-- TOMBOL -->

    <div class="text-center mt-4">

        <a href="/dashboard"
           class="btn btn-kembali text-white">

            ← Kembali ke Dashboard

        </a>

    </div>

</div>

</body>
</html>
```
