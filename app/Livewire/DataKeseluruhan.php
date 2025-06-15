<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use Livewire\Attributes\Layout;
use App\Models\Kelas;

#[Layout('layouts.admin')]

class DataKeseluruhan extends Component
{
    public $search = '';

public function render()
{
    $kelasList = Kelas::with(['siswas', 'gurus'])
        ->when($this->search, function ($query) {
            $query->where('nama', 'like', '%' . $this->search . '%')
                ->orWhereHas('siswas', function ($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('gurus', function ($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%');
                });
        })
        ->get();

    return view('livewire.data-keseluruhan', compact('kelasList'));
}
}

