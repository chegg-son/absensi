<div>
    <h1>Absensi</h1>

    <form wire:submit.prevent="recordAbsensi">
        @csrf
        <div class="input-group">
            <input type="number" inputmode="numeric" class="form-control w-full" type="text" wire:model.defer="cardId"
                placeholder="Pindai kartu di alat Scanner" autofocus>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
