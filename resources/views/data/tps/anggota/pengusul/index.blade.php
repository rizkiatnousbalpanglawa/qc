@extends("layouts.app")

@section("style")
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section("wrapper")
<!-- start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!-- breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Data</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ url('tps/show/'.$tps->id) }}"> PENGUSUL</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DPT</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">

                    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Upload Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <div for="" class="">Desa / Kelurahan </div>
                                            <div class="h4"> {{ $tps->village->name }}</div>
                                            <div for="" class="">TPS </div>
                                            <div class="h4"> {{ $tps->nomor_tps }}</div>

                                            <div class="">Upload Data</div>
                                            <input type="hidden" name="tps_id" value="{{ $tps->id }}">
                                            <input type="file" class="custom-file" name="file" style="height: 25vh">
                                            @error('file')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="upload">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end breadcrumb -->
        <h6 class="mb-0 text-uppercase">Data Pemilih Tetap (DPT) <span class="fw-bold">{{ $tps->nama }}</span></h6>
        <hr />



        <div class="card">
            <div class="card-body">
                <h5 class="text-center text-uppercase">{{$tps->regency->name.', '.$tps->district->name.', '. $tps->village->name }} <br> TPS {{ $tps->nomor_tps }}</h5>
                <h5 class=" text-uppercase">Pengusul : {{ $pengusul->nama }}</h5>
                <div class="table-responsive">
                    @livewire('dpt-table',['tps' => $tps,'pengusul'=>$pengusul])
                </div>
            </div>
        </div>



    </div>
</div>
<!-- end page wrapper -->
@endsection