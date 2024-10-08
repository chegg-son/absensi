<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'keterangan',
        'waktu',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
