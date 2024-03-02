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
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data D1</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <form action="" class="form-prevent-multiple-submits" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="d1_1" value="{{ $d1->id }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Kabupaten / Kota</label>
                                    <select name="kabupaten_id" id="" class="form-select">
                                        @foreach ($kabupaten as $item)
                                        <option value="{{ $item->id }}" {{ ($item->id == $d1->kabupaten_id) ? 'selected'
                                            : '' }}>{{ $item->name }}</option>
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
                                <div class="mb-3">
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
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">RUSDI MASSE</label>
                                    <input type="number" class="form-control" name="suara_rusdi"
                                        value="{{ $d1->suara_rusdi }}" placeholder="SUARA RUSDI MASSE">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">ASLAM PATONANGI</label>
                                    <input type="number" class="form-control" name="suara_aslam"
                                        value="{{ $d1->suara_aslam }}" placeholder="SUARA ASLAM PATONANGI">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">EVA STEVANY RATABA</label>
                                    <input type="number" class="form-control" name="suara_esr"
                                        value="{{ $d1->suara_esr }}" placeholder="SUARA EVA STEVANY RATABA">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">JUDAS AMIR</label>
                                    <input type="number" class="form-control" name="suara_judas"
                                        value="{{ $d1->suara_judas }}" placeholder="SUARA JUDAS AMIR">
                                </div>
                            </div>
                            <div class="col-lg-6">
                               
                                <div class="mb-3">
                                    <label for="" class="form-label">HAYARNA HAKIM</label>
                                    <input type="number" class="form-control" name="suara_hayarna"
                                        value="{{ $d1->suara_hayarna }}" placeholder="SUARA HAYARNA HAKIM">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">NICODEMUS BIRINGKANAE</label>
                                    <input type="number" class="form-control" name="suara_nico"
                                        value="{{ $d1->suara_nico }}" placeholder="SUARA NICODEMUS BIRINGKANAE">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">PUTRI DAKKA</label>
                                    <input type="number" class="form-control" name="suara_putri"
                                        value="{{ $d1->suara_putri }}" placeholder="SUARA PUTRI DAKKA">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">SUARA PARTAI</label>
                                    <input type="number" class="form-control" name="suara_partai" value="{{ $d1->suara_partai }}" placeholder="SUARA PARTAI NASDEM">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">SUARA SAH</label>
                                    <input type="number" class="form-control" name="suara_sah" value="{{ $d1->suara_sah }}" placeholder="SUARA SAH">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">SUARA TIDAK SAH</label>
                                    <input type="number" class="form-control" name="suara_tidak_sah" value="{{ $d1->suara_tidak_sah }}" placeholder="SUARA TIDAK SAH">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">JUMLAH PEMILIH</label>
                                    <input type="number" class="form-control" name="jumlah_pemilih" value="{{ $d1->jumlah_pemilih }}" placeholder="JUMLAH PEMILIH">
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ url('d1') }}" class="btn">Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class='bx bx-plus mx-0 p-0'></i>
                                Add</button>
                        </div>
               
                      
                </form>
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