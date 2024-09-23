<?php

namespace App\Http\Controllers\Api;

use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AbsensiResource;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Log::with('pegawai')->paginate(10);
        return new AbsensiResource(true, 'get data API absensi sukses', $absensi);
    }
}
