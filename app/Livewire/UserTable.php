<?php

namespace App\Livewire;

use App\Models\Pegawai;
use Livewire\Component;

class UserTable extends Component
{

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        $this->dispatch('editPegawai', $pegawai);
    }

    public function delete($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
    }

    public function render()
    {
        $pegawais = Pegawai::all();
        return view('livewire.user-table', compact('pegawais'));
    }
}
