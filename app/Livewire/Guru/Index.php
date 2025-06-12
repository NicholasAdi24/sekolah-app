<?php

namespace App\Livewire\Guru;
namespace App\Livewire\Guru;

use App\Models\Guru;
use App\Models\Kelas;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Index extends Component
{
    public $nama, $nip, $kelas_id, $guru_id;
    public $isEdit = false;
    public $filterKelasId = null; // properti filter

    public function render()
    {
        $kelasList = Kelas::all();

        $query = Guru::with('kelas');
        if ($this->filterKelasId) {
            $query->where('kelas_id', $this->filterKelasId);
        }

        return view('livewire.guru.index', [
            'gurus' => $query->get(),
            'kelasList' => $kelasList,
        ]);
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'nip' => 'required|unique:gurus,nip',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        Guru::create([
            'nama' => $this->nama,
            'nip' => $this->nip,
            'kelas_id' => $this->kelas_id,
        ]);

        $this->resetForm();
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $this->guru_id = $guru->id;
        $this->nama = $guru->nama;
        $this->nip = $guru->nip;
        $this->kelas_id = $guru->kelas_id;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'nip' => 'required|unique:gurus,nip,' . $this->guru_id,
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $guru = Guru::findOrFail($this->guru_id);
        $guru->update([
            'nama' => $this->nama,
            'nip' => $this->nip,
            'kelas_id' => $this->kelas_id,
        ]);

        $this->resetForm();
    }

    public function delete($id)
    {
        Guru::findOrFail($id)->delete();
    }

    public function resetForm()
    {
        $this->nama = '';
        $this->nip = '';
        $this->kelas_id = '';
        $this->guru_id = null;
        $this->isEdit = false;
    }

    public function setFilterKelas($id)
{
    $this->filterKelasId = $id;
}
}
