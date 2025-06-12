<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SADARI - Selamat Datang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-white font-sans">
    <div class="min-h-screen flex flex-col items-center justify-center p-6">
        <div class="w-full max-w-4xl text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SADARI" class="mx-auto w-28 mb-6">
            <h1 class="text-4xl font-bold mb-4">Selamat Datang di <span class="text-pink-500">Manajemen SEKOLAH</span></h1>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">Aplikasi penyimpanan data siswa dan guru.</p>
            <div class="flex justify-center gap-4">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-pink-500 text-white rounded-xl hover:bg-pink-600 transition">Masuk</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-white text-pink-500 border border-pink-500 rounded-xl hover:bg-pink-50 transition">Daftar</a>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
