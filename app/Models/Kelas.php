<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    // Field yang boleh diisi
    protected $fillable = ['nama'];

    // Relasi: 1 kelas punya banyak siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    // Relasi: 1 kelas bisa punya banyak guru (many-to-many)
    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'kelas_guru');
    }

    public function siswas()
{
    return $this->hasMany(Siswa::class);
}

}
