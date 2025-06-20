<?php

namespace App\Livewire\OrangTua;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\OrangTua;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]

class Index extends Component
{

    public $nama, $siswa_id, $orangtua_id ;
    public $isEdit = false;

    public function render()
    {
    return view('livewire.orang-tua.index', [
        'orangtuas' => OrangTua::with('siswa')->get(),
        'siswas' => Siswa::all(),
    ]);
    }

     public function store()
    {
        $this->validate([
            'nama' => 'required',
            'siswa_id' => 'required|exists:siswas,id',
        ]);

        OrangTua::create([
            'nama' => $this->nama,
            'siswa_id' => $this->siswa_id,
        ]);

    $this->resetForm();
    }

   public function edit($id)
{
        $orangtua = OrangTua::findOrFail($id);
        $this->orangtua_id = $orangtua->id;
        $this->nama = $orangtua->nama;
        $this->siswa_id = $orangtua->siswa_id;
        $this->isEdit = true;
}


 public function update()
    {
        $this->validate([
            'nama' => 'required',
            'siswa_id' => 'required|exists:siswas,id',
        ]);

        $orangtua = OrangTua::findOrFail($this->orangtua_id);
        $orangtua->update([
            'nama' => $this->nama,
            'siswa_id' => $this->siswa_id,
        ]);

        $this->resetForm();
    }


    public function delete($id)
    {
        OrangTua::findOrFail($id)->delete();
    }

    public function resetForm()
    {
        $this->nama = '';
        $this->siswa_id = '';
        $this->orangtua_id = null;
        $this->isEdit = false;
    }
}
