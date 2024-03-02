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
                            {{-- <span class="float-end fst-italic">Data Masuk  --}}
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
                                        {{ $d1->sum('suara_esr') }}
                                        {{-- @if (auth()->user()->role == 'admin')
                                        {{ number_format($realisasi_esr) }}
                                        @else --}}
                                        {{-- {{ number_format($item->total_suara*6/7) }} --}}
                                        {{-- 52,098
                                        @endif --}}
                                       
                                    </div>
                                    <div class="mt-2 small">Suara Partai</div>
                                    <div class="h6">
                                        {{ $d1->sum('suara_partai') }}
                                        {{-- @if (auth()->user()->role == 'admin')
                                        {{ number_format($realisasi_esr) }}
                                        @else --}}
                                        {{-- {{ number_format($item->total_suara*6/7) }} --}}
                                        {{-- 52,098
                                        @endif --}}
                                       
                                    </div>
                                    {{-- <div class="h6">
                                        {{ number_format($realisasi_partai_esr) }}
                                    </div> --}}
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
                                         
                                            <tr class="text-center bg-warning fw-bold">
                                                <td>EVA STEVANY RATABA</td>
                                                <td class="align-middle">
                                                    {{ $d1->sum('suara_esr') }}
                                                    {{-- @if (auth()->user()->role == 'admin')
                                                    {{ number_format($item->total_suara) }}
                                                    @else
                                                    @if ($item->caleg->id == 3)
                                                    52,098
                                                    @else
                                                    {{ number_format($item->total_suara) }}
                                                    @endif
                                                    @endif --}}

                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>NICODEMUS BIRINGKANAE</td>
                                                <td class="align-middle">
                                                    {{ $d1->sum('suara_nico') }}
                                                    {{-- @if (auth()->user()->role == 'admin')
                                                    {{ number_format($item->total_suara) }}
                                                    @else
                                                    @if ($item->caleg->id == 3)
                                                    52,098
                                                    @else
                                                    {{ number_format($item->total_suara) }}
                                                    @endif
                                                    @endif --}}

                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>RUSDI MASSE</td>
                                                <td class="align-middle">
                                                    {{ $d1->sum('suara_rusdi') }}
                                                    {{-- @if (auth()->user()->role == 'admin')
                                                    {{ number_format($item->total_suara) }}
                                                    @else
                                                    @if ($item->caleg->id == 3)
                                                    52,098
                                                    @else
                                                    {{ number_format($item->total_suara) }}
                                                    @endif
                                                    @endif --}}

                                                </td>
                                            </tr>
                                            <tr class="text-center ">
                                                <td>ASLAM PATONANGI</td>
                                                <td class="align-middle">
                                                    {{ $d1->sum('suara_aslam') }}
                                                    {{-- @if (auth()->user()->role == 'admin')
                                                    {{ number_format($item->total_suara) }}
                                                    @else
                                                    @if ($item->caleg->id == 3)
                                                    52,098
                                                    @else
                                                    {{ number_format($item->total_suara) }}
                                                    @endif
                                                    @endif --}}

                                                </td>
                                            </tr>
                                            <tr class="text-center ">
                                                <td>HAYARNA HAKIM</td>
                                                <td class="align-middle">
                                                    {{ $d1->sum('suara_hayarna') }}
                                                    {{-- @if (auth()->user()->role == 'admin')
                                                    {{ number_format($item->total_suara) }}
                                                    @else
                                                    @if ($item->caleg->id == 3)
                                                    52,098
                                                    @else
                                                    {{ number_format($item->total_suara) }}
                                                    @endif
                                                    @endif --}}

                                                </td>
                                            </tr>
                                            <tr class="text-center ">
                                                <td>JUDAS AMIR</td>
                                                <td class="align-middle">
                                                    {{ $d1->sum('suara_judas') }}
                                                    {{-- @if (auth()->user()->role == 'admin')
                                                    {{ number_format($item->total_suara) }}
                                                    @else
                                                    @if ($item->caleg->id == 3)
                                                    52,098
                                                    @else
                                                    {{ number_format($item->total_suara) }}
                                                    @endif
                                                    @endif --}}

                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>PUTRI DAKKA</td>
                                                <td class="align-middle">
                                                    {{ $d1->sum('suara_putri') }}
                                                    {{-- @if (auth()->user()->role == 'admin')
                                                    {{ number_format($item->total_suara) }}
                                                    @else
                                                    @if ($item->caleg->id == 3)
                                                    52,098
                                                    @else
                                                    {{ number_format($item->total_suara) }}
                                                    @endif
                                                    @endif --}}

                                                </td>
                                            </tr>

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
                                @forelse ($d1 as $item)
                                <tr>
                                    <td class="text-center">{{ 
                                        $loop->iteration }}</td>
                                    <td>{{ $item->kabupaten->name }}</td>
                                    <td>
                                        {{ number_format($item->suara_esr) }}
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
                       
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection