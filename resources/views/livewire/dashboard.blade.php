<div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    {{-- <div class="row"> --}}
        {{-- <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-1">
                        <div class="mb-0 text-center h5">DATA MASUK</div>
                    </div>
                    <hr>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>KELURAHAN</th>
                                <th>JUMLAH TPS</th>
                                <th>DATA MASUK</th>
                                <th>JUMLAH SUARA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelTerbanyak as $item)
                                <tr>
                                    <td>{{ $item->village->name }}</td>
                                    <td>{{ $item }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                  
                    {{-- <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-borderless table-sm">
                                <tr class="border-bottom">
                                    <td class=" align-middle">Jumlah TPS</td>
                                    <td class="align-middle text-center">
                                        <span class="h5">{{ number_format($jumlahTpsRealisasi) }}</span> 
                                    </td>
                                    <td class="text-center align-middle">dari {{ $total_tps }}</td>
                                    <td class="text-center align-middle h5">{{ round($jumlahTpsRealisasi / $total_tps * 100) }}%</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class=" align-middle">Jumlah Kelurahan</td>
                                    <td class="h5 align-middle text-center">{{
                                        number_format($jumlahKelRealisasi) }}
                                    </td>
                                    <td class="text-center align-middle">dari {{ $total_kel }}</td>
                                    <td class="text-center align-middle h5">{{ round($jumlahKelRealisasi / $total_kel * 100) }}%</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="align-middle">Jumlah Kecamatan</td>
                                    <td class="h6 align-middle text-center">{{
                                        number_format($jumlahKecRealisasi) }}
                                    </td>
                                    <td class="text-center align-middle">dari {{ $total_kec }}</td>
                                    <td class="text-center align-middle h5">{{ round($jumlahKecRealisasi / $total_kec * 100) }}%</td>
                
                                </tr>
                                <tr class="border-bottom">
                                    <td class="align-middle">Jumlah Kab/Kota</td>
                                    <td class="h6 align-middle text-center">{{
                                        number_format($jumlahKabRealisasi) }}
                                    </td>
                                    <td class="text-center align-middle">dari {{ $total_kab }}</td>
                                    <td class="text-center align-middle h5">{{ round($jumlahKabRealisasi / $total_kab * 100) }}%</td>
                
                                </tr>
                            </table>
                        </div>
                    </div> --}}

                {{-- </div>
            </div>
        </div> --}}
    {{-- </div> --}}
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

        <div class="col">
            <div class="card radius-10 small">
                <div class="card-body">
                    <div class="h6 text-center">DPR RI SUL-SEL 3</div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <div class="text-center">
                                <img src="{{ asset('assets/images/avatars/esr.jpeg') }}" class="img-fluid"
                                    style="width: 60px">
                                    <div class="mt-2 small">Target</div>
                                    <div class="h6">60,000</div>
                                    <div class="mt-2 small">Realisasi</div>
                                    <div class="h6">
                                        @can('admin')
                                        {{ number_format($realisasi_esr) }}
                                        @elsecan('user')
                                        {{ number_format($realisasi_esr*6/7) }}
                                        @endcan
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
                                                @can('admin')
                                                {{ number_format($item->total_suara) }}
                                                @elsecan('user')
                                                {{ number_format($item->total_suara*6/7) }}
                                                @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 small">
                <div class="card-body">
                    <div class="h6 text-center">DPRD PROVINSI SUL-SEL 10</div>
                    <hr>
                     <div class="row">
                        <div class="col-4">
                            <div class="text-center">
                                <img src="{{ asset('assets/images/avatars/yrk.png') }}" class="img-fluid"
                                    style="width: 60px">
                                    <div class="mt-2 small">Target</div>
                                    <div class="h6">30,000</div>
                                    <div class="mt-2 small">Realisasi</div>
                                    <div class="h6">
                                        @can('admin')
                                        {{ number_format($realisasi_yrk) }}
                                        @elsecan('user')
                                        {{ number_format($realisasi_yrk*3/4) }}
                                        @endcan
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
                                        <tr class="@if($item->caleg_id == 10) bg-primary text-white fw-bold @endif text-center">
                                            <td>{{ $item->caleg->nama }}</td>
                                            <td class="align-middle">
                                                @can('admin')
                                                {{ number_format($item->total_suara) }}
                                                @elsecan('user')
                                                {{ number_format($item->total_suara*3/4) }}
                                                @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

                    <div id="container_esr" style="width:100%; height:250px;"></div>

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card radius-10">
                <div class="card-body">

                    <div id="container_yrk" style="width:100%; height:250px;"></div>

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
                text: 'DPRD PROVINSI SULSEL 11 NASDEM'
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
</div>