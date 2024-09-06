<div>
    <h1>Absensi</h1>
    <form wire:submit.prevent="recordAbsensi">
        @csrf
        <input class="form-control w-full" type="text" wire:model.defer="cardId"
            placeholder="Pindai kartu di alat Scanner" autofocus>
    </form>
</div>
