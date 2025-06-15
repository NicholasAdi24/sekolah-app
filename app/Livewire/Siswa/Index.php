<?php

namespace App\Livewire\Siswa;

use App\Models\Siswa;
use App\Models\Kelas;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Index extends Component
{
    public $nama, $nis, $kelas_id, $siswa_id;
    public $isEdit = false;
    public $filterKelasId = null;

public function render()
{
    $kelasList = Kelas::with(['siswas'])
        ->when($this->filterKelasId, function ($query) {
            $query->where('id', $this->filterKelasId);
        })
        ->get();

    return view('livewire.siswa.index', compact('kelasList'));
}


    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswas,nis',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        Siswa::create([
            'nama' => $this->nama,
            'nis' => $this->nis,
            'kelas_id' => $this->kelas_id,
        ]);

        $this->resetForm();
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $this->siswa_id = $siswa->id;
        $this->nama = $siswa->nama;
        $this->nis = $siswa->nis;
        $this->kelas_id = $siswa->kelas_id;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswas,nis,' . $this->siswa_id,
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $siswa = Siswa::findOrFail($this->siswa_id);
        $siswa->update([
            'nama' => $this->nama,
            'nis' => $this->nis,
            'kelas_id' => $this->kelas_id,
        ]);

        $this->resetForm();
    }

    public function delete($id)
    {
        Siswa::findOrFail($id)->delete();
    }

    public function resetForm()
    {
        $this->nama = '';
        $this->nis = '';
        $this->kelas_id = '';
        $this->siswa_id = null;
        $this->isEdit = false;
    }
    public function filterByKelas($kelasId)
{
    $this->filterKelasId = $kelasId;
}
}
