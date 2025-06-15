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

public function guru()
{
    return $this->belongsToMany(\App\Models\Guru::class, 'kelas_guru');
}

    public function siswas()
{
    return $this->hasMany(Siswa::class);
}

public function gurus()
{
    return $this->belongsToMany(\App\Models\Guru::class, 'kelas_guru');
}


}
