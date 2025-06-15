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
    public $nama, $nip, $guru_id;
    public $isEdit = false;
    public $filterKelasId = null; // properti filter
    public $kelas_id = [];


public function render()
{
    $kelasList = Kelas::with(['guru'])
        ->when($this->filterKelasId, function ($q) {
            $q->where('id', $this->filterKelasId);
        })
        ->get();

    return view('livewire.guru.index', [
        'kelasList' => $kelasList,
    ]);
}


    public function store()
{
    $this->validate([
        'nama' => 'required',
        'nip' => 'required|unique:gurus,nip',
        'kelas_id' => 'required|array|min:1',
        'kelas_id.*' => 'exists:kelas,id'
    ]);

    $guru = Guru::create([
        'nama' => $this->nama,
        'nip' => $this->nip,
    ]);

    $guru->kelas()->sync($this->kelas_id);

    $this->resetForm();
}


public function edit($id)
{
    $guru = Guru::with('kelas')->findOrFail($id);
    $this->guru_id = $guru->id;
    $this->nama = $guru->nama;
    $this->nip = $guru->nip;
    $this->kelas_id = $guru->kelas->pluck('id')->toArray();
    $this->isEdit = true;
}


   public function update()
{
    $this->validate([
        'nama' => 'required',
        'nip' => 'required|unique:gurus,nip,' . $this->guru_id,
        'kelas_id' => 'required|array|min:1',
        'kelas_id.*' => 'exists:kelas,id'
    ]);

    $guru = Guru::findOrFail($this->guru_id);
    $guru->update([
        'nama' => $this->nama,
        'nip' => $this->nip,
    ]);

    $guru->kelas()->sync($this->kelas_id);

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
        $this->kelas_id = [];
        $this->guru_id = null;
        $this->isEdit = false;
    }

    public function setFilterKelas($id)
{
    $this->filterKelasId = $id;
}
}
