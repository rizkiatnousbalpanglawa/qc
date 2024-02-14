<div>
    <div class="card">
        <div class="card-body">

            <form action="" wire:submit.prevent='store'>
                @csrf
                <div class="mb-3">
                    <div class="mb-2">Nama Saksi</div>
                    <input type="text" wire:model='nama' class="form-control" placeholder="nama saksi">
                    <div class="mt-1 ms-1 small text-muted">***Jika saksi tidak ditemukan, silahkan buat baru!</div>
                </div>
                <button class="btn btn-primary float-end">Buat Baru</button>
            </form>
        </div>
    </div>
</div>
