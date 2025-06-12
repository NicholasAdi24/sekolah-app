<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'jumlahKelas' => Kelas::count(),
            'jumlahGuru' => Guru::count(),
            'jumlahSiswa' => Siswa::count(),
        ]);
    }
}

