<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]

class DataKeseluruhan extends Component
{
    public $search = '';

    public function render()
    {
        
        $siswas = Siswa::with(['kelas.gurus'])
            ->where(function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhereHas('kelas.gurus', function ($q2) {
                        $q2->where('nama', 'like', '%' . $this->search . '%');
                    });
            })
            ->get();

        return view('livewire.data-keseluruhan', compact('siswas'));
    }
}

