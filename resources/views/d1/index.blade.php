@extends("layouts.app")

@section("style")
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Data</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">D1</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                        <i class='bx bx-plus mx-0'></i>
                        Add
                    </button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data D1</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="kab_kota" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kabupaten / Kota</th>
                                <th>ESR</th>
                                <th>NICODEMUS</th>
                                <th>RUSDI MASSE</th>
                                <th>ASLAM</th>
                                <th>HAYARNA</th>
                                <th>JUDAS</th>
                                <th>PUTRI</th>
                                <th>PARTAI</th>
                                <th>SAH</th>
                                <th>TDK SAH</th>
                                <th>JUMLAH PEMILIH</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($d1 as $item)
                            <tr>
                                <td class="align-middle">{{ $item->kabupaten->name }}</td>
                                <td class="align-middle">{{ $item->suara_esr }}</td>
                                <td class="align-middle">{{ $item->suara_nico }}</td>
                                <td class="align-middle">{{ $item->suara_rusdi }}</td>
                                <td class="align-middle">{{ $item->suara_aslam }}</td>
                                <td class="align-middle">{{ $item->suara_hayarna }}</td>
                                <td class="align-middle">{{ $item->suara_judas }}</td>
                                <td class="align-middle">{{ $item->suara_putri }}</td>
                                <td class="align-middle">{{ $item->suara_partai }}</td>
                                <td class="align-middle">{{ $item->suara_sah }}</td>
                                <td class="align-middle">{{ $item->suara_tidak_sah }}</td>
                                <td class="align-middle">{{ $item->jumlah_pemilih }}</td>
                                <td class="align-middle">
                                    <a href="{{ url('d1/edit/' . $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('d1/hapus/' . $item->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin Hapus?')">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- modal tambah data --}}
        {{-- --}}
        {{-- --}}
        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="" class="form-prevent-multiple-submits" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Kabupaten / Kota</label>
                                        <select name="kabupaten_id" id="" class="form-select">
                                            @foreach ($kabupaten as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">FILE D1</label>
                                        <input type="file" name="lampiran_c1"
                                            class="form-control @error('lampiran_c1') is-invalid @enderror">
                                        @error('lampiran_c1')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label class="form-label">PLANO</label>
                                        <input type="file" name="lampiran_plano"
                                            class="form-control @error('lampiran_plano') is-invalid @enderror">
                                        @error('lampiran_plano')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">LOKASI</label>
                                        <input type="file" name="lampiran_lokasi"
                                            class="form-control @error('lampiran_lokasi') is-invalid @enderror">
                                        @error('lampiran_lokasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div> --}}
                                    <div class="mb-3">
                                        <label for="" class="form-label">RUSDI MASSE</label>
                                        <input type="number" class="form-control" name="suara_rusdi" placeholder="SUARA RUSDI MASSE">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">ASLAM PATONANGI</label>
                                        <input type="number" class="form-control" name="suara_aslam" placeholder="SUARA ASLAM PATONANGI">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">EVA STEVANY RATABA</label>
                                        <input type="number" class="form-control" name="suara_esr" placeholder="SUARA EVA STEVANY RATABA">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">JUDAS AMIR</label>
                                        <input type="number" class="form-control" name="suara_judas" placeholder="SUARA JUDAS AMIR">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">HAYARNA HAKIM</label>
                                        <input type="number" class="form-control" name="suara_hayarna" placeholder="SUARA HAYARNA HAKIM">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                   
                                 
                                
                                 
                                    <div class="mb-3">
                                        <label for="" class="form-label">NICODEMUS BIRINGKANAE</label>
                                        <input type="number" class="form-control" name="suara_nico" placeholder="SUARA NICODEMUS BIRINGKANAE">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">PUTRI DAKKA</label>
                                        <input type="number" class="form-control" name="suara_putri" placeholder="SUARA PUTRI DAKKA">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">SUARA PARTAI</label>
                                        <input type="number" class="form-control" name="suara_partai" placeholder="SUARA PARTAI NASDEM">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">SUARA SAH</label>
                                        <input type="number" class="form-control" name="suara_sah" placeholder="SUARA SAH">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">SUARA TIDAK SAH</label>
                                        <input type="number" class="form-control" name="suara_tidak_sah" placeholder="SUARA TIDAK SAH">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">JUMLAH PEMILIH</label>
                                        <input type="number" class="form-control" name="jumlah_pemilih" placeholder="JUMLAH PEMILIH">
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><i class='bx bx-plus mx-0 p-0'></i>
                                Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!--end page wrapper -->
@endsection

@section("script")
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kab_kota').DataTable({
            'ordering' : []
        });
      } );
</script>

@endsection