<div>
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3" wire:ignore>
                        {{-- <label for="" class="form-label">Kabupaten / Kota</label> --}}
                        <select name="" id="" class="form-select select_kab_kota" wire:model='searchKab'>
                            <option value="">--SEMUA KAB/KOTA--</option>
                            @foreach ($kabupaten as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>


                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3" wire:ignore>
                        {{-- <label for="" class="form-label">Kecamatan</label> --}}
                        <select name="" id="" class="form-select select_kec" wire:model='searchKec'>
                            <option value="">--SEMUA KECAMATAN--</option>
                            @foreach ($kecamatan as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3" wire:ignore>
                        {{-- <label for="" class="form-label">Kelurahan</label> --}}
                        <select name="" id="" class="form-select select_kel" wire:model='searchKel'>
                            <option value="">--SEMUA KELURAHAN--</option>
                            @foreach ($kelurahan as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3" wire:ignore>
                        {{-- <label for="" class="form-label">TPS</label> --}}
                        <select name="" id="" class="form-select select_tps" wire:model='searchTps'>
                            <option value="">--SEMUA TPS--</option>
                            @foreach ($dataTps->unique('nomor_tps')->sortBy('nomor_tps') as $item)
                            <option value="{{ $item->nomor_tps }}">{{ $item->nomor_tps }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3" wire:ignore>
                        {{-- <label for="" class="form-label">Pilihan</label> --}}
                        <select name="" id="" class="form-select select_pilihan" wire:model='searchData'>
                            <option value="">--SEMUA DATA--</option>
                            <option value="1">DPR RI SUL-SEL 3</option>
                            <option value="2">DPRD PROV SUL-SEL 10</option>
                            {{-- <option value="97">TPS TANPA DPR RI</option>
                            <option value="98">TPS TANPA DPRD PROV</option> --}}
                            <option value="99">DATA TPS KOSONG</option>
                        </select>
                    </div>
                </div>

            </div>

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
                            <th class="text-center">ESR</th>
                            <th class="text-center">YRK</th>
                            <th class="text-center">JUMLAH PEMILIH</th>
                            <th class="text-center">C1</th>
                            <th class="text-center">PLANO</th>
                            <th class="text-center">LOKASI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tps as $item)
                        <tr>
                            <td class="text-center align-middle">{{ $item->district->name }}</td>
                            <td class="text-center align-middle">{{ $item->village->name }}</td>
                            <td class="text-center align-middle">{{ $item->nomor_tps }}</td>
                            <td class="text-center align-middle">
                                @foreach ($item->lampiran->where('status',1) as $items)
                                {{ $items->caleg->where('caleg_id',3)->sum('jumlah_suara') }}
                                @endforeach
                            </td>
                            <td class="text-center align-middle">
                                @foreach ($item->lampiran->where('status',2) as $items)
                                {{ $items->caleg->where('caleg_id',10)->sum('jumlah_suara') }}
                                @endforeach
                            </td>
                            <td class="text-center align-middle">
                                @foreach ($item->lampiran->where('status',1) as $items)
                                DPR RI = {{ $items->jumlah_pemilih }} <br>
                                @endforeach
                                @foreach ($item->lampiran->where('status',2) as $items)
                                DPRD PROV = {{ $items->jumlah_pemilih }} <br>
                                @endforeach
                            </td>
                            <td class="text-center align-middle">
                                @foreach ($item->lampiran->where('status',1) as $items)
                                @if ($items->lampiran_c1)
                                <!-- Button trigger modal -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ric{{ $items->id }}">
                                    DPR RI
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="ric{{ $items->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title" id="exampleModalLabel">{{
                                                    $item->district->name. ', '. $item->village->name .', TPS
                                                    -'.$item->nomor_tps }}</div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('storage/'.$items->lampiran_c1) }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @foreach ($item->lampiran->where('status',2) as $items)
                                @if ($items->lampiran_c1)
                                <!-- Button trigger modal -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#dprdc{{ $items->id }}">
                                    DPRD PROV
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="dprdc{{ $items->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title" id="exampleModalLabel">{{
                                                    $item->district->name. ', '. $item->village->name .', TPS
                                                    -'.$item->nomor_tps }}</div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('storage/'.$items->lampiran_c1) }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @endforeach
                            </td>
                            <td class="text-center align-middle">
                                @foreach ($item->lampiran->where('status',1) as $items)
                                @if ($items->lampiran_plano)
                                <!-- Button trigger modal -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#rip{{ $items->id }}">
                                    DPR RI
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="rip{{ $items->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title" id="exampleModalLabel">{{
                                                    $item->district->name. ', '. $item->village->name .', TPS
                                                    -'.$item->nomor_tps }}</div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('storage/'.$items->lampiran_plano) }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @foreach ($item->lampiran->where('status',2) as $items)
                                @if ($items->lampiran_plano)
                                <!-- Button trigger modal -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#dprdp{{ $items->id }}">
                                    DPRD PROV
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="dprdp{{ $items->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title" id="exampleModalLabel">{{
                                                    $item->district->name. ', '. $item->village->name .', TPS
                                                    -'.$item->nomor_tps }}</div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('storage/'.$items->lampiran_plano) }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @endforeach
                            </td>
                            <td class="text-center align-middle">
                                @foreach ($item->lampiran->where('status',1) as $items)
                                @if ($items->lampiran_lokasi)
                                <!-- Button trigger modal -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#rilok{{ $items->id }}">
                                    DPR RI
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="rilok{{ $items->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title" id="exampleModalLabel">{{
                                                    $item->district->name. ', '. $item->village->name .', TPS
                                                    -'.$item->nomor_tps }}</div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('storage/'.$items->lampiran_lokasi) }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @endforeach
                                @foreach ($item->lampiran->where('status',2) as $items)
                                @if ($items->lampiran_lokasi)
                                <!-- Button trigger modal -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#dprdlok{{ $items->id }}">
                                    DPRD PROV
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="dprdlok{{ $items->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title" id="exampleModalLabel">{{
                                                    $item->district->name. ', '. $item->village->name .', TPS
                                                    -'.$item->nomor_tps }}</div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('storage/'.$items->lampiran_lokasi) }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @canany(['admin'])
            <div class="row">
                <div class="col-lg-6">
                    Total Pilihan ESR : <span class="fw-bold">{{ number_format($totalEsr) }}</span> <br>
                    Total Pilihan YRK : <span class="fw-bold">{{ number_format($totalYrk) }}</span>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <!-- Tampilan untuk Desktop (lebar layar lebih dari 768px) -->
                    <div class="d-none d-sm-block">
                        {{ $tps->links() }}
                    </div>

                </div>


            </div>
            @endcanany


        </div>
    </div>

    @section('script')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script>
        // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select_kab_kota').select2();
        $('.select_kab_kota').on('change', function (e) {
            var data = $('.select_kab_kota').select2("val");
            @this.set('searchKab', data);
        });
        $('.select_kel').select2();
        $('.select_kel').on('change', function (e) {
            var data = $('.select_kel').select2("val");
            @this.set('searchKel', data);
        });
        $('.select_kec').select2();
        $('.select_kec').on('change', function (e) {
            var data = $('.select_kec').select2("val");
            @this.set('searchKec', data);
        });
        $('.select_tps').select2();
        $('.select_tps').on('change', function (e) {
            var data = $('.select_tps').select2("val");
            @this.set('searchTps', data);
        });
        $('.select_pilihan').select2();
        $('.select_pilihan').on('change', function (e) {
            var data = $('.select_pilihan').select2("val");
            @this.set('searchData', data);
        });
        $('.select_status').select2();
        $('.select_status').on('change', function (e) {
            var data = $('.select_status').select2("val");
            @this.set('searchStatus', data);
        });
        $('.select_pengusul').select2();
        $('.select_pengusul').on('change', function (e) {
            var data = $('.select_pengusul').select2("val");
            @this.set('searchPengusul', data);
        });

    });
    </script>
    @endsection

</div>