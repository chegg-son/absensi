<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip_id',
        'checkout1',
        'checkin1',
        'checkout2',
        'checkin2',
        'checkout3',
        'checkin3',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nip_id', 'nip');
    }
}
