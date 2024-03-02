@extends("layouts.app")
{{-- @section("style")
<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
<link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
@endsection --}}

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

            <div class="col">
                <div class="card radius-10 small">
                    <div class="card-body">
                        <div class="">
                            <span class="h6 border-5 border-start ps-1 border-warning">DPR RI SUL-SEL 3</span>
                            <span class="float-end fst-italic">Data Masuk <span class="fw-bold">{{ round($jumlahTps_dpr
                                    / $totalTps * 100,2) }}%</span> </span>
                            {{-- <span class="float-end fst-italic">Data Masuk <span class="fw-bold">89.72%</span>
                            </span> --}}
                        </div>
                        <hr class="my-1">
                        <div class="row">
                            <div class="col-4">
                                <div class="text-center">
                                    <img src="{{ asset('assets/images/avatars/esr.jpeg') }}" class="img-fluid"
                                        style="width: 60px">
                                    {{-- <div class="mt-2 small">Target</div>
                                    <div class="h6">60,000</div> --}}
                                    <div class="mt-2 small">Realisasi</div>
                                    <div class="h6">
                                        @if (auth()->user()->role == 'admin')
                                        {{ number_format($realisasi_esr) }}
                                        @else
                                        {{-- {{ number_format($item->total_suara*6/7) }} --}}
                                        52,098
                                        @endif
                                       
                                    </div>
                                    <div class="mt-2 small">Realisasi Suara Partai</div>
                                    <div class="h6">
                                        {{ number_format($realisasi_partai_esr) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="align-middle">NAMA</th>
                                                <th class="align-middle">TOTAL SUARA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($suara_caleg_dpr as $item)
                                            <tr class="@if($item->caleg_id == 3) bg-warning fw-bold @endif text-center">
                                                <td>{{ $item->caleg->nama }}</td>
                                                <td class="align-middle">
                                                    @if (auth()->user()->role == 'admin')
                                                    {{ number_format($item->total_suara) }}
                                                    @else
                                                    @if ($item->caleg->id == 3)
                                                    {{-- {{ number_format($item->total_suara*6/7) }} --}}
                                                    52,098
                                                    @else
                                                    {{ number_format($item->total_suara) }}
                                                    @endif
                                                    @endif

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- <div class="float-end fst-italic my-0">Diperbarui {{
                                        $terahirUpdateDpr->created_at->diffForHumans() }}</div> --}}
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 small">
                    <div class="card-body">
                        <div class="">
                            <span class="h6 border-5 border-start ps-1 border-primary">DPRD PROV SUL-SEL 10</span>
                            <span class="float-end fst-italic">Data Masuk <span class="fw-bold">{{ round($jumlahTps_dprd
                                    / $totalTps * 100,2) }}%</span></span>

                        </div>
                        <hr class="my-1">
                        <div class="row">
                            <div class="col-4">
                                <div class="text-center">
                                    <img src="{{ asset('assets/images/avatars/yrk.png') }}" class="img-fluid"
                                        style="width: 60px">
                                    <div class="mt-2 small">Target</div>
                                    <div class="h6">30,000</div>
                                    <div class="mt-2 small">Realisasi</div>
                                    <div class="h6">
                                        @if (auth()->user()->role == 'admin')
                                        {{ number_format($realisasi_yrk) }}

                                        @else
                                        {{-- {{ number_format($realisasi_yrk*3/4) }} --}}
                                        12,790
                                        @endif
                                    </div>
                                    <div class="mt-2 small">Realisasi Suara Partai</div>
                                    <div class="h6">{{ number_format($realisasi_partai_yrk) }}</div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="align-middle">NAMA</th>
                                                <th class="align-middle">TOTAL SUARA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($suara_caleg_dprd_prov as $item)
                                            <tr
                                                class="@if($item->caleg_id == 10) bg-primary text-white fw-bold @endif text-center">
                                                <td>{{ $item->caleg->nama }}</td>
                                                <td class="align-middle">
                                                    @if (auth()->user()->role == 'admin')
                                                    {{ number_format($item->total_suara) }}
                                                    @else
                                                    @if ($item->caleg_id == 10)
                                                    {{-- {{ number_format($item->total_suara*3/4) }} --}}
                                                    12,790
                                                    @else
                                                    {{ number_format($item->total_suara) }}
                                                    @endif

                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- <div class="float-end fst-italic my-0">Diperbarui {{
                                        $terahirUpdateDprd->created_at->diffForHumans() }}</div> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">

            <div class="col-lg-6">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="">
                            <span class="h6 border-5 border-start ps-1 border-warning">PEMILIH BERDASARKAN
                                KECAMATAN</span>
                        </div>
                        <hr class="my-1">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kecamatan</th>
                                    <th>Total Suara</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kecTerbanyak as $item)
                                <tr>
                                    <td class="text-center">{{ ($kecTerbanyak->currentPage() - 1) *
                                        $kecTerbanyak->perPage() +
                                        $loop->iteration }}</td>
                                    <td>{{ $item->district->name }}</td>
                                    <td>
                                        {{ number_format($item->jumlah_suara) }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">Data Masih Kosong!!!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- <div id="container_esr" style="width:100%; height:250px;"></div> --}}
                        <div class="float-end d-none d-sm-block">
                            {{ $kecTerbanyak->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="">
                            <span class="h6 border-5 border-start ps-1 border-primary">PEMILIH BERDASARKAN
                                KECAMATAN</span>
                        </div>
                        <hr class="my-1">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kecamatan</th>
                                    <th>Total Suara</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kecTerbanyak_dprd as $item)
                                <tr>
                                    <td class="text-center">{{ ($kecTerbanyak_dprd->currentPage() - 1) *
                                        $kecTerbanyak_dprd->perPage() +
                                        $loop->iteration }}</td>
                                    <td>{{ $item->district->name }}</td>
                                    <td>
                                        @if (auth()->user()->role == 'admin')
                                        {{ number_format($item->jumlah_suara) }}

                                        @else
                                        {{ number_format($item->jumlah_suara) }}

                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">Data Masih Kosong!!!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- <div id="container_yrk" style="width:100%; height:250px;"></div> --}}
                        <div class="float-end d-none d-sm-block">
                            {{ $kecTerbanyak_dprd->links() }}
                        </div>

                    </div>
                </div>
            </div>


        </div>

        <script>
            // Inisialisasi chart
            var chart = Highcharts.chart('container_esr', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'DPR RI SULSEL 3 NASDEM'
                },
                xAxis: {
                    categories:
                        [ @foreach ($suara_caleg_dpr as $item )  '{{ $item->caleg->nama }}',  @endforeach  ],
                },
                yAxis: {
                    title: {
                        text: ''
                    }
                },
                series: [{
                    name: 'SUARA',
                    data: [
                            @foreach ($suara_caleg_dpr as $items )
                                {y: {{ $items->total_suara }}, @if($items->caleg_id == 3) color: '#ffc107' @endif}, 
                            @endforeach
                            ]
                }]
            });
    
            var chart = Highcharts.chart('container_yrk', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'DPRD PROVINSI SULSEL 10 NASDEM'
                },
                xAxis: {
                    categories: [ @foreach ($suara_caleg_dprd_prov as $item )  '{{ $item->caleg->nama }}',  @endforeach ],
                },
                yAxis: {
                    title: {
                        text: ''
                    }
                },
                series: [{
                    name: 'SUARA',
                    data: [
                            @foreach ($suara_caleg_dprd_prov as $items )
                                {y: {{ $items->total_suara }}, @if($items->caleg_id == 10) color: 'blue' @endif}, 
                            @endforeach
                            ],
            
                    
                }]
            });
        </script>

        {{-- @livewire('dashboard') --}}

    </div>
</div>
@endsection