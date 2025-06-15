<x-app-layout>
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-800 text-white hidden md:block">
            <div class="p-4 text-xl font-bold border-b border-gray-700">
                SekolahApp
            </div>
            <nav class="mt-4 space-y-2 px-4">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                    🏠 Dashboard
                </a>
                <a href="{{ route('kelas.index') }}" class="block px-3 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('kelas.index') ? 'bg-gray-700' : '' }}">
                    🏫 Kelola Kelas
                </a>
                <a href="{{ route('guru.index') }}" class="block px-3 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('guru.index') ? 'bg-gray-700' : '' }}">
                    👨‍🏫 Kelola Guru
                </a>
                <a href="{{ route('siswa.index') }}" class="block px-3 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('siswa.index') ? 'bg-gray-700' : '' }}">
                    👨‍🎓 Kelola Siswa
                </a>
                <a href="{{ route('data-keseluruhan') }}" class="block px-3 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('data-keseluruhan') ? 'bg-gray-700' : '' }}">
                    📋 Data Keseluruhan
                </a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 bg-gray-100 dark:bg-gray-900 p-6">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-white">
                {{ __('Dashboard') }}
            </h2>

<div class="grid md:grid-cols-3 gap-4">
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h3 class="text-lg font-bold mb-2 text-gray-800 dark:text-white">Jumlah Kelas</h3>
        <p class="text-3xl font-bold text-blue-500">{{ $jumlahKelas }}</p>
    </div>
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h3 class="text-lg font-bold mb-2 text-gray-800 dark:text-white">Jumlah Guru</h3>
        <p class="text-3xl font-bold text-green-500">{{ $jumlahGuru }}</p>
    </div>
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h3 class="text-lg font-bold mb-2 text-gray-800 dark:text-white">Jumlah Siswa</h3>
        <p class="text-3xl font-bold text-purple-500">{{ $jumlahSiswa }}</p>
    </div>
</div>

            <div class="mt-6 text-gray-700 dark:text-gray-300">
                Selamat datang di aplikasi manajemen sekolah!
            </div>
        </main>
    </div>
</x-app-layout>
