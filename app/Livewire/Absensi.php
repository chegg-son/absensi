<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\Pegawai;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Absensi as ModelsAbsensi;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

        if ($this->cardId == '' || $this->cardId == null) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->error('NIP tidak boleh kosong');
            return;
        }

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

                $log_absensi = new Log([
                    'pegawai_id' => $pegawai->id,
                    'keterangan' => 'Check-out pertama',
                    'waktu' => $today,
                ]);
                $log_absensi->save();

                flash()->option('position', 'bottom-right')->option('timeout', 3000)->success("Baris baru dibuat, Check-out Pertama berhasil untuk {$pegawai->nama}<br/>Pukul: {$today}");
            } else {
                $columnsAndNames = [
                    'checkin1' => 'Check-in Pertama',
                    'checkout2' => 'Check-out Kedua',
                    'checkin2' => 'Check-in Kedua',
                    'checkout3' => 'Check-out Ketiga',
                    'checkin3' => 'Check-in Ketiga'
                ];

                foreach ($columnsAndNames as $column => $names) {
                    if (is_null($absensi->$column)) {
                        $absensi->$column = $today;
                        $absensi->save();

                        $log_absensi = new Log([
                            'pegawai_id' => $pegawai->id,
                            'keterangan' => $names,
                            'waktu' => $today,
                        ]);
                        $log_absensi->save();

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
        $log_absensi = Log::latest('waktu')->paginate(10);
        $absensis = ModelsAbsensi::latest('updated_at')->paginate(10);
        return view('livewire.absensi', compact('absensis', 'log_absensi'));
    }
}
