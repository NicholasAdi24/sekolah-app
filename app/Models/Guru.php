<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nip', 'kelas_id'];

    // Relasi: Guru mengajar banyak kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
