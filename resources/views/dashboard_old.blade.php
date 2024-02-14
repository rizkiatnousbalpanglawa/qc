@extends("layouts.app")
@section("style")
<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
<link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
@endsection

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <div class="card shadow-none bg-transparent border-bottom border-2">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <h4 class="mb-3 mb-md-0">Visualisasi Data</h4>
                    </div>
                    {{-- <div class="col-md-9">
                        <form class="float-md-end">
                            <div class="row row-cols-md-auto g-lg-3">
                                <label for="inputFromDate" class="col-md-2 col-form-label text-md-end">From Date</label>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" id="inputFromDate">
                                </div>
                                <label for="inputToDate" class="col-md-2 col-form-label text-md-end">To Date</label>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" id="inputToDate">
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="card shadow-none bg-transparent">
            <div class="card-body">
                <div id="chart1"></div>
            </div>
        </div> --}}
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Total Pemilih</p>
                                <h4 class="mb-0">{{ $partisipan->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">ESR</p>
                                <h4 class="mb-0">{{ $pendukung->where('status','P')->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">YRK</p>
                                <h4 class="mb-0">{{ $pendukung->where('status','A')->count() }}</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">PAKET</p>
                                <h4 class="mb-0">{{ $pendukung->where('status','L')->count() }}</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end row-->
        {{-- <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 display-none">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div id="chart6"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div id="chart7"></div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--end row-->
        <div class="row row-cols-1 row-cols-md-1">
          
            <div class="col col-lg-4">
                <div class="card radius-10 shadow-none bg-transparent overflow-hidden">
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center">
                            <div>
                                <h5 class="mb-0">Pendukung ESR</h5>
                            </div>
                            <div class="ms-auto">
                                <h3 class="mb-0"><span class="font-14">Total:</span> {{ $pendukungPenuh->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="dashboard-top-countries mb-3 px-2">
                        <ul class="list-group list-group-flush radius-10">
                            @foreach ($pendukungPenuh as $item)
                            <li class="list-group-item d-flex align-items-center radius-10 mb-2 shadow-sm">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0">{{ $item->name }}</h6>
                                    </div>
                                </div>
                                <div class="ms-auto">{{ $item->partisipan->count() }}</div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col col-lg-4">
                <div class="card radius-10 shadow-none bg-transparent overflow-hidden">
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center">
                            <div>
                                <h5 class="mb-0">Pendukung YRK</h5>
                            </div>
                            <div class="ms-auto">
                                <h3 class="mb-0"><span class="font-14">Total:</span> {{ $pendukungAbu->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="dashboard-top-countries mb-3 px-2">
                        <ul class="list-group list-group-flush radius-10">
                            @foreach ($pendukungAbu as $item)
                            <li class="list-group-item d-flex align-items-center radius-10 mb-2 shadow-sm">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0">{{ $item->name }}</h6>
                                    </div>
                                </div>
                                <div class="ms-auto">{{ $item->partisipan->count() }}</div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col col-lg-4">
                <div class="card radius-10 shadow-none bg-transparent overflow-hidden">
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center">
                            <div>
                                <h5 class="mb-0">Pendukung PAKET</h5>
                            </div>
                            <div class="ms-auto">
                                <h3 class="mb-0"><span class="font-14">Total:</span> {{ $pendukungLain->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="dashboard-top-countries mb-3 px-2">
                        <ul class="list-group list-group-flush radius-10">
                            @foreach ($pendukungLain as $item)
                            <li class="list-group-item d-flex align-items-center radius-10 mb-2 shadow-sm">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0">{{ $item->name }}</h6>
                                    </div>
                                </div>
                                <div class="ms-auto">{{ $item->partisipan->count() }}</div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            
        </div>
        <!--end row-->

{{--         
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">

            <div class="col-md-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 font-weight-bold">Jumlah Baligho</h5>
                         
                        </div>
                        <div class="d-flex mt-2 mb-4">
                            <h2 class="mb-0 font-weight-bold">89,421</h2>
                            <p class="mb-0 ms-1 font-14 align-self-end text-secondary">Total Baligho</p>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                   @for ($i = 0; $i < 5; $i++)
                                   <tr>
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                           
                                            <div>Kelurahan</div>
                                        </div>
                                    </td>
                                    <td>46 Unit</td>
                                </tr>
                                   @endfor
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 font-weight-bold">Jumlah Spanduk</h5>
                         
                        </div>
                        <div class="d-flex mt-2 mb-4">
                            <h2 class="mb-0 font-weight-bold">89,421</h2>
                            <p class="mb-0 ms-1 font-14 align-self-end text-secondary">Total Spanduk</p>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                   @for ($i = 0; $i < 5; $i++)
                                   <tr>
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                           
                                            <div>Kelurahan</div>
                                        </div>
                                    </td>
                                    <td>46 Unit</td>
                                </tr>
                                   @endfor
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 font-weight-bold">Jumlah Banner</h5>
                         
                        </div>
                        <div class="d-flex mt-2 mb-4">
                            <h2 class="mb-0 font-weight-bold">89,421</h2>
                            <p class="mb-0 ms-1 font-14 align-self-end text-secondary">Total Banner</p>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                   @for ($i = 0; $i < 5; $i++)
                                   <tr>
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                           
                                            <div>Kelurahan</div>
                                        </div>
                                    </td>
                                    <td>46 Unit</td>
                                </tr>
                                   @endfor
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

  
        <!--end row-->
        {{-- <div class="card radius-10">
            <div class="card-body">
                <div class="table-responsive lead-table">
                    <table class="table mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Kunjungan Potensial</th>
                                <th>Total Kunjungan</th>
                                <th>Progress</th>
                                <th>Kunjungan Terahir</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">Ronald Waters</h6>
                                            <p class="mb-0 font-13 text-secondary">Lead Designers</p>
                                        </div>
                                    </div>
                                </td>
                                <td>5 kali</td>
                                <td class=" w-25">
                                    <div class="progress radius-10" style="height:4.5px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%">
                                        </div>
                                    </div>
                                </td>
                                <td>14 Oct 2020</td>
                                <td>
                                    <div class="badge rounded-pill bg-primary w-100">In Progress</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">David Buckley</h6>
                                            <p class="mb-0 font-13 text-secondary">Lead Designers</p>
                                        </div>
                                    </div>
                                </td>
                                <td>2 kali</td>
                                <td class=" w-25">
                                    <div class="progress radius-10" style="height:4.5px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 76%"></div>
                                    </div>
                                </td>
                                <td>15 Oct 2020</td>
                                <td>
                                    <div class="badge rounded-pill bg-danger w-100">Cancelled</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">James Caviness</h6>
                                            <p class="mb-0 font-13 text-secondary">Lead Designers</p>
                                        </div>
                                    </div>
                                </td>
                                <td>12 kali</td>
                                <td class=" w-25">
                                    <div class="progress radius-10" style="height:4.5px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%">
                                        </div>
                                    </div>
                                </td>
                                <td>16 Oct 2020</td>
                                <td>
                                    <div class="badge rounded-pill bg-success w-100">Completed</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection


@section("script")
<!-- Vector map JavaScript -->
<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- highcharts js -->
<script src="assets/plugins/highcharts/js/highcharts.js"></script>
<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="assets/js/index2.js"></script>
<script>
    new PerfectScrollbar('.dashboard-top-countries');
</script>
@endsection