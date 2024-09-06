<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Pegawai;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Absensi as ModelsAbsensi;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class Absensi extends Component
{
    public $cardId = '';
    public $message = '';
    use WithPagination;

    protected $rules = [
        'cardId' => 'required|string'
    ];

    public function recordAbsensi()
    {
        $this->validate();

        try {
            $pegawai = Pegawai::where('nip', $this->cardId)->firstOrFail();
            $today = Carbon::now();

            $absensi = ModelsAbsensi::where('pegawai_id', $pegawai->id)
                ->whereDate('created_at', $today->toDateString())
                ->latest()
                ->first();

            if (!$absensi || $absensi->checkin3) {
                $absensi = new ModelsAbsensi([
                    'pegawai_id' => $pegawai->id,
                    'checkout1' => $today,
                ]);
                $absensi->save();

                // $logAbsensi = new LogAbsensi([
                //     'pegawai_id' => $pegawai->id,
                //     'keterangan' => $absensi->checkout1,

                // ]);
                // $logAbsensi->save();
                flash()->option('position', 'bottom-right')->option('timeout', 3000)->success("Baris baru dibuat, Check-out pertama berhasil untuk {$pegawai->nama}<br/>Pukul: {$today}");
            } else {
                $columns = ['checkin1', 'checkout2', 'checkin2', 'checkout3', 'checkin3'];

                foreach ($columns as $column) {
                    if (is_null($absensi->$column)) {
                        $absensi->$column = $today;
                        $absensi->save();

                        // $logAbsensi = new LogAbsensi([
                        //     'pegawai_id' => $pegawai->id,
                        //     'keterangan' => $absensi->checkout1,
                        // ]);
                        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success("{$column} berhasil untuk {$pegawai->nama}<br/>Pukul: {$today}");
                        break;
                    }
                }
            }
        } catch (ModelNotFoundException $e) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->error("Pegawai tidak ditemukan");
        } catch (\Exception $e) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->error("Terjadi kesalahan : {$e->getMessage()}");
        }

        // Reset input cardId setelah proses
        $this->reset('cardId');
    }

    public function render()
    {
        $absensis = ModelsAbsensi::latest('updated_at')->paginate(10);
        return view('livewire.absensi', compact('absensis'));
    }
}
