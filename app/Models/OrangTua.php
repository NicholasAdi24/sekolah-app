<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrangTua extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'siswa_id'];

    // Relasi: OrangTua milik satu siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

}
