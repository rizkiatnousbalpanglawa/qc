<div>
    <div class="card">
        <div class="card-body">

            <form wire:submit.prevent='render'>
                <div class="row">
                    <div class="col">
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i class='bx bx-search'></i></span>
                            <input type="text" wire:model='kelurahan' class="form-control"
                                placeholder="Cari Kelurahan ...">
                        </div>
                    </div>
                    <div class="col">
                        <button wire:click='search' class="btn btn-primary">Cari</button>
                    </div>
                </div>

            </form>

            <div class="text-center" wire:loading.flex>
                Processing ...
            </div>

            <div class="table-responsive" wire:loading.remove>
                <table id="" class="table table-striped table-bordered table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">KECAMATAN</th>
                            <th class="text-center">KELURAHAN</th>
                            <th class="text-center">TPS</th>
                            <th class="text-center">JML DPT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tps as $item)
                        <tr>
                            <td class="text-center align-middle">{{ $item->district->name }}</td>
                            <td class="text-center align-middle">{{ $item->village->name }}</td>
                            <td class="text-center align-middle">{{ $item->nomor_tps }}</td>
                            <td class="text-center align-middle">
                                {{ $item->jumlah_dpt }}
                                {{-- <div class="fst-italic">Ditambahkan oleh {{ $item->user->name ?? '-' }}</div>
                                --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- <div class="float-end">
                {{ $tps->links() }}
            </div> --}}
        </div>
    </div>


</div>