<div>
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col">
                    <div class="mb-3" wire:ignore>
                        <select name="" id="" class="form-select select_kel" wire:model='searchKelurahan'>
                            <option value="">--PILIH KELURAHAN--</option>
                            @foreach ($kelurahan as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}, KECAMATAN {{ $item->district->name }}
                            </option>
                            @endforeach
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
                            <th class="text-center">KELURAHAN</th>
                            <th class="text-center">TPS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tps as $item)
                        <tr>
                            <td class="text-center align-middle">
                                {{ $item->district->name }} <br>
                                {{ $item->village->name }}
                            </td>
                            <td class="text-center align-middle">{{ $item->nomor_tps }}</td>
                            <td class="text-center align-middle">
                                <a href="{{ url('upload-c1/dpr/saksi/'.$item->id) }}" class="btn btn-warning btn-sm">
                                    ESR
                                </a>
                                <a href="{{ url('upload-c1/dprdp/saksi/'.$item->id) }}" class="btn btn-primary btn-sm">
                                    YRK
                                </a>
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

    @section('script')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script>
        $('.select_kel').select2();
        $('.select_kel').on('change', function (e) {
            var data = $('.select_kel').select2("val");
            @this.set('searchKelurahan', data);
        });
    </script>
    @endsection
</div>