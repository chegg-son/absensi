<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Log;
use Illuminate\Http\Request;
use PgSql\Lob;

class Rekap extends Controller
{
    public function index()
    {
        $rekap_absensi = Log::with('pegawai')->paginate(20);
        return view('pages.admin.index', compact('rekap_absensi'));
    }
}
