<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]

class Index extends Component
{
    public $kelasList;

    protected $listeners = ['kelasUpdated' => 'loadKelas'];

    public function mount()
    {
        $this->loadKelas();
    }

    public function loadKelas()
    {
        $this->kelasList = Kelas::orderBy('nama')->get();
    }

    public function edit($id)
    {
        $this->dispatch('editKelas', $id);
    }

    public function delete($id)
    {
        Kelas::findOrFail($id)->delete();
        session()->flash('message', 'Kelas berhasil dihapus.');
        $this->loadKelas();
    }

    public function render()
    {
        return view('livewire.kelas.index');
    }

}
