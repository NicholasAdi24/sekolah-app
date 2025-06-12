<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]

class Form extends Component
{
    public $nama;
    public $kelas_id;
    public $editMode = false;

    protected $rules = [
        'nama' => 'required|string|min:2|max:100',
    ];

    protected $listeners = ['editKelas' => 'edit', 'resetForm' => 'resetInput'];

    public function save()
    {
        $this->validate();

        if ($this->editMode) {
            $kelas = Kelas::find($this->kelas_id);
            $kelas->update(['nama' => $this->nama]);
            session()->flash('message', 'Kelas berhasil diupdate.');
        } else {
            Kelas::create(['nama' => $this->nama]);
            session()->flash('message', 'Kelas berhasil ditambahkan.');
        }

        $this->resetInput();
        $this->dispatch('kelasUpdated');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $this->kelas_id = $kelas->id;
        $this->nama = $kelas->nama;
        $this->editMode = true;
    }

    public function resetInput()
    {
        $this->reset(['nama', 'kelas_id', 'editMode']);
    }

    public function render()
    {
        return view('livewire.kelas.form');
    }
}
