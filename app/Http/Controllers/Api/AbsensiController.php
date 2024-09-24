<?php

namespace App\Http\Controllers\Api;

use App\Models\Log;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AbsensiResource;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Log::with('pegawai')->latest()->get();
        return new AbsensiResource(true, 'get data API absensi sukses', $absensi);
    }

    public function show($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->first();


        if (!$pegawai) {
            return new AbsensiResource(404, 'NIP tidak ditemukan!', null);
        }

        $absensi = Log::with('pegawai')
            ->whereHas('pegawai', function ($query) use ($nip) {
                $query->where('nip', $nip);
            })
            ->latest()
            ->get();

        if (!$absensi) {
            return new AbsensiResource(404, 'NIP tidak ditemukan!', null);
        }

        return new AbsensiResource(true, 'get data absensi by NIP ' . $nip . ' sukses', $absensi);
    }
}
