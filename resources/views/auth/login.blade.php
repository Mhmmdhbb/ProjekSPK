<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pemilihan Kantin Ramah Lingkungan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-r from-green-50 to-blue-50 min-h-screen flex items-center justify-center p-4">

    <!-- Tombol Kembali -->
    <a href="/" class="absolute top-6 left-6 text-green-600 hover:text-green-700 flex items-center gap-2 font-semibold bg-white px-4 py-2 rounded-lg shadow hover:shadow-md transition">
        <i class="fas fa-arrow-left"></i> Kembali ke Beranda
    </a>

    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-8 border border-gray-100">
        
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-100 text-green-600 mb-4 text-3xl shadow-inner">
                <i class="fas fa-leaf"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900">Selamat Datang</h2>
            <p class="text-gray-600 mt-2 text-sm">Masuk untuk mengakses Sistem Pemilihan Kantin Ramah Lingkungan.</p>
            <div class="mt-3">
                <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">
                    SISTEM PENILAIAN
                </span>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r shadow-sm" role="alert">
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r shadow-sm" role="alert">
                <p class="text-sm">{{ session('error') }}</p>
            </div>
        @endif

        <form action="/login" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition bg-gray-50 hover:bg-white focus:bg-white"
                           placeholder="Masukkan Email">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" name="password" id="password" required
                           class="w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition bg-gray-50 hover:bg-white focus:bg-white"
                           placeholder="Masukkan Password">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" onclick="togglePassword()" class="text-gray-400 hover:text-green-600 focus:outline-none transition">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-200 transition-all flex items-center justify-center gap-2 mt-2 shadow-md hover:shadow-lg">
                <i class="fas fa-sign-in-alt"></i> Masuk
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-gray-100 text-center text-sm text-gray-600">
            Belum punya akun? 
            <a href="/register" class="text-green-600 hover:text-green-700 font-semibold hover:underline transition">
                Daftar sekarang
            </a>
        </div>
    </div>

    <script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
    </script>
</body>
</html>
