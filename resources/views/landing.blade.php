<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Kantin Ramah Lingkungan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-white">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white shadow-md z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-leaf text-green-600 text-2xl"></i>
                    <span class="font-bold text-xl text-gray-900"> Kantin Ramah Lingkungan</span>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : route('user.dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Masuk</a>
                        <a href="{{ route('register') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 bg-gradient-to-r from-green-50 to-blue-50 min-h-[600px] flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-5xl font-bold text-gray-900 mb-6">
                        Tentukan Kantin Ramah Lingkungan Terbaik
                    </h1>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        Sistem ini membantu melakukan penilaian kantin berdasarkan pengelolaan sampah secara objektif, transparan, dan terukur.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        @auth
                            <a href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : route('user.dashboard') }}" class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 text-center font-semibold">
                                <i class="fas fa-chart-bar mr-2"></i> Lihat Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 text-center font-semibold">
                                <i class="fas fa-play mr-2"></i> Mulai Penilaian
                            </a>
                        @endauth
                        <a href="#cara-kerja" class="bg-white text-green-600 border-2 border-green-600 px-8 py-3 rounded-lg hover:bg-green-50 text-center font-semibold">
                            <i class="fas fa-book mr-2"></i> Pelajari Metode
                        </a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="bg-white rounded-lg shadow-2xl p-8">
                        <img src="https://images.unsplash.com/photo-1559207615-cd4628902d4a?w=500&h=400&fit=crop" alt="Kantin Ramah Lingkungan" class="w-full rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Unggulan -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-gray-900 mb-16">Fitur Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl text-green-600 mb-4">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Perhitungan</h3>
                    <p class="text-gray-700">Menghitung nilai utilitas dan preferensi setiap kantin berdasarkan kriteria pengelolaan sampah.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl text-blue-600 mb-4">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Dashboard Analitik</h3>
                    <p class="text-gray-700">Visualisasi hasil penilaian dan ranking kantin ramah lingkungan.</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl text-purple-600 mb-4">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Ranking Otomatis</h3>
                    <p class="text-gray-700">Menampilkan urutan kantin terbaik berdasarkan nilai.</p>
                </div>

                <!-- Card 4 -->
                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl text-yellow-600 mb-4">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Bobot Kriteria</h3>
                    <p class="text-gray-700">Pengelolaan bobot setiap kriteria penilaian.</p>
                </div>

                <!-- Card 5 -->
                <div class="bg-gradient-to-br from-red-50 to-red-100 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl text-red-600 mb-4">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Input Penilaian</h3>
                    <p class="text-gray-700">Input nilai alternatif berdasarkan hasil observasi lapangan.</p>
                </div>

                <!-- Card 6 -->
                <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl text-indigo-600 mb-4">
                        <i class="fas fa-history"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Riwayat Perhitungan</h3>
                    <p class="text-gray-700">Menyimpan hasil perhitungan yang pernah dilakukan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cara Kerja Sistem -->
    <section id="cara-kerja" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-gray-900 mb-16">Cara Kerja Metode</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-green-600 text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">1</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Input Data Penilaian</h3>
                    <p class="text-gray-600">Masukkan data penilaian kantin berdasarkan kriteria pengelolaan sampah</p>
                </div>

                <div class="text-center">
                    <div class="bg-blue-600 text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">2</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Normalisasi Data</h3>
                    <p class="text-gray-600">
                        <strong>Benefit:</strong> U(x) = (x-min)/(max-min)<br>
                        <strong>Cost:</strong> U(x) = (max-x)/(max-min)
                    </p>
                </div>

                <div class="text-center">
                    <div class="bg-purple-600 text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">3</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Perhitungan Preferensi</h3>
                    <p class="text-gray-600">V(x) = Σ(Wi × Ui)<br>Menghitung nilai preferensi setiap alternatif</p>
                </div>

                <div class="text-center">
                    <div class="bg-orange-600 text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">4</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Perangkingan</h3>
                    <p class="text-gray-600">Menentukan kantin terbaik berdasarkan nilai preferensi tertinggi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Data Kantin -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-gray-900 mb-16">Kantin yang Dinilai</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white border-2 border-gray-200 p-8 rounded-lg hover:border-green-600 transition">
                    <div class="text-3xl text-green-600 mb-4">
                        <i class="fas fa-store"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Kantin Universitas Janabadra Pingit</h3>
                    <p class="text-gray-600 text-sm">Kode: KU1</p>
                </div>

                <div class="bg-white border-2 border-gray-200 p-8 rounded-lg hover:border-green-600 transition">
                    <div class="text-3xl text-blue-600 mb-4">
                        <i class="fas fa-store"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Kantin Universitas Janabadra Timoho</h3>
                    <p class="text-gray-600 text-sm">Kode: KU2</p>
                </div>

                <div class="bg-white border-2 border-gray-200 p-8 rounded-lg hover:border-green-600 transition">
                    <div class="text-3xl text-purple-600 mb-4">
                        <i class="fas fa-store"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Kantin UIN Sunan Kalijaga Yogyakarta</h3>
                    <p class="text-gray-600 text-sm">Kode: KU3</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Pengembang -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-gray-900 mb-4">Team Pengembang</h2>
            <p class="text-center text-gray-600 mb-16 max-w-2xl mx-auto">
                Sistem Pendukung Keputusan Pemilihan Kantin Ramah Lingkungan
                Berdasarkan Kriteria Pengelolaan Sampah
            </p>

            <!-- Dosen Pembimbing -->
            <div class="text-center mb-12">
                <div class="inline-block">
                    <img src="{{ asset('images/team/dosen.jpeg') }}"
                         alt="Dosen Pembimbing"
                         class="w-36 h-44 object-cover rounded-xl border-4 border-green-500 shadow-lg mx-auto mb-4">
                    <h4 class="text-lg font-bold text-gray-900">Yumarlin MZ, S.Kom., M.Pd., M.Kom.</h4>
                    <span class="inline-block mt-2 bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full">
                        Dosen Pembimbing
                    </span>
                </div>
            </div>

            <!-- Tim Mahasiswa -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="text-center bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <img src="{{ asset('images/team/radit.jpeg') }}"
                         alt="Raditya Rinda Mardeansyah"
                         class="w-28 h-36 object-cover rounded-xl border-4 border-blue-500 shadow-md mx-auto mb-4">
                    <h5 class="text-md font-bold text-gray-900">Raditya Rinda Mardeansyah</h5>
                    <span class="inline-block mt-2 bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                        Mahasiswa
                    </span>
                </div>

                <div class="text-center bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <img src="{{ asset('images/team/habib.jpeg') }}"
                         alt="Moh Habib Jakiya"
                         class="w-28 h-36 object-cover rounded-xl border-4 border-blue-500 shadow-md mx-auto mb-4">
                    <h5 class="text-md font-bold text-gray-900">Moh Habib Jakiya</h5>
                    <span class="inline-block mt-2 bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                        Mahasiswa
                    </span>
                </div>

                <div class="text-center bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <img src="{{ asset('images/team/ilzam.jpeg') }}"
                         alt="Mohammad Ilzam"
                         class="w-28 h-36 object-cover rounded-xl border-4 border-blue-500 shadow-md mx-auto mb-4">
                    <h5 class="text-md font-bold text-gray-900">Mohammad Ilzam</h5>
                    <span class="inline-block mt-2 bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                        Mahasiswa
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-green-600 to-blue-600">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold text-white mb-6">Siap Menilai Kantin Ramah Lingkungan?</h2>
            <p class="text-xl text-white mb-8">Daftarkan akun Anda dan mulai melakukan penilaian sekarang</p>
            @auth
                <a href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : route('user.dashboard') }}" class="bg-white text-green-600 px-8 py-3 rounded-lg hover:bg-gray-100 font-semibold inline-block">
                    Ke Dashboard
                </a>
            @else
                <a href="{{ route('register') }}" class="bg-white text-green-600 px-8 py-3 rounded-lg hover:bg-gray-100 font-semibold inline-block">
                    Daftar Sekarang
                </a>
            @endauth
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">SPK Kantin Ramah Lingkungan</h3>
                    <p class="text-gray-400">Sistem Pendukung Keputusan untuk penilaian kantin berdasarkan pengelolaan sampah dan kriteria ramah lingkungan</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Menu</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Beranda</a></li>
                        <li><a href="#cara-kerja" class="hover:text-white">Cara Kerja</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-white">Masuk</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak</h3>
                    <p class="text-gray-400">
                        Email: info@spk-kantin.local<br>
                        Telepon: +62 XXX XXX XXX
                    </p>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; 2026 SPK Kantin Ramah Lingkungan. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>
