<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pages.pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        // tidak
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|numeric',
            'nama' => 'required|string|min:3',
            'jabatan' => 'required|string',
            'bidang' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
        ]);
    }

    public function show($id)
    {
        $user = Pegawai::findOrFail($id);
        return view('pages.pegawai.show', compact('user'));
    }

    public function edit(Request $request, $id)
    {
        $user = Pegawai::findOrFail($id);

        $request->validate(
            [
                'nip' => 'required|numeric',
                'nama' => 'required|string|min:3',
                'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
                'rfid' => 'nullable|numeric',
            ],
            [
                'nip.required' => 'NIP harus di isi',
                'nama.required' => 'Nama harus di isi',
                'rfid.numeric' => 'RFID harus angka',
                'foto.image' => 'File harus berupa gambar',
            ]
        );

        $file = $request->file('foto');
        if ($file) {
            Storage::delete('public/photos/' . $user->foto);
            $file->storeAs('public/photos', $file->hashName());
            $user->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'foto' => $file->hashName(),
                'rfid' => $request->rfid,
            ]);
        } else {
            $user->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'rfid' => $request->rfid,
            ]);
        }

        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Data user berhasil di perbarui');
        return redirect()->route('pegawai');
    }

    public function destroy($id)
    {
        $user = Pegawai::findOrFail($id);

        if ($user->foto) {
            Storage::delete('public/photos/' . $user->foto);
        }

        $user->delete();
        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Data user berhasil di hapus');
        return redirect()->route('pegawai');
    }
}
