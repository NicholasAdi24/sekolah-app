<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

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
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>
</html>
