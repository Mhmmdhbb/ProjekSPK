<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>About Sistem</title>

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

.container-about{
    max-width:1000px;
    margin:auto;
    padding:50px 20px;
}

.about-card{
    background:rgba(255,255,255,.12);
    backdrop-filter:blur(15px);
    border-radius:20px;
    padding:35px;
    box-shadow:0 8px 32px rgba(0,0,0,.3);
}

.judul{
    text-align:center;
    margin-bottom:30px;
}

.judul h2{
    font-weight:bold;
}

.deskripsi{
    text-align:justify;
    line-height:1.9;
}

.info-box{
    background:rgba(255,255,255,.08);
    padding:20px;
    border-radius:15px;
    margin-top:20px;
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

<div class="container-about">

    <div class="about-card">

        <div class="judul">

            <h2>
                Tentang Sistem
            </h2>

            <p>
                Sistem Pendukung Keputusan Pemilihan Kantin Ramah Lingkungan
            </p>

        </div>

        <div class="deskripsi">

            <p>

                Sistem Pendukung Keputusan (SPK) Pemilihan Kantin Ramah
                Lingkungan Berdasarkan Pengelolaan Sampah Menggunakan
                Metode evaluasi ini merupakan
                aplikasi berbasis web yang dirancang untuk membantu
                proses pengambilan keputusan dalam menentukan kantin
                terbaik berdasarkan sejumlah kriteria yang telah
                ditentukan.

            </p>

            <p>

                Sistem ini melakukan proses penilaian terhadap setiap
                alternatif kantin berdasarkan kriteria yang berkaitan
                dengan aspek ramah lingkungan dan pengelolaan sampah.
                Setiap kriteria memiliki bobot tertentu yang digunakan
                dalam proses perhitungan dan evaluasi kriteria.

            </p>

            <p>

                Sistem ini digunakan karena mampu melakukan evaluasi
                terhadap banyak kriteria sekaligus serta menghasilkan
                nilai utilitas yang objektif sehingga proses
                perangkingan kantin dapat dilakukan secara lebih
                transparan, cepat, dan akurat.

            </p>

        </div>

        <div class="info-box">

            <h5>Tujuan Sistem</h5>

            <ul>
                <li>Menentukan kantin terbaik berdasarkan kriteria yang telah ditentukan.</li>
                <li>Membantu pengambilan keputusan secara objektif.</li>
                <li>Menerapkan sistem evaluasi kriteria dalam proses perangkingan alternatif.</li>
                <li>Mendukung penerapan kantin ramah lingkungan di lingkungan kampus.</li>
            </ul>

        </div>

        <div class="info-box">

            <h5>Teknologi yang Digunakan</h5>

            <ul>
                <li>Laravel Framework</li>
                <li>PHP</li>
                <li>MySQL Database</li>
                <li>Bootstrap 5</li>
                <li>Evaluasi Berbasis Kriteria Multi-Atribut</li>
            </ul>

        </div>

        <div class="text-center mt-4">

            <a href="/dashboard"
               class="btn btn-kembali text-white">

                ← Kembali ke Dashboard

            </a>

        </div>

    </div>

</div>

</body>
</html>