<?php

namespace App\Livewire\Absensi;

use Livewire\Component;
use App\Models\Absensi;

class Index extends Component
{
    public function render()
    {
        $absensis = Absensi::latest()->paginate(10);
        return view('livewire.absensi.index', compact('absensis'));
    }
}
