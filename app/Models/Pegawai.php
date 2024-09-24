<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'jabatan',
        'bidang',
        'foto',
        'rfid',
    ];

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
