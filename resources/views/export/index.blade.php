@extends("layouts.app")

@section("style")
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <h6 class="mb-0 text-uppercase border-start border-5 ps-2 border-primary">Exports</h6>
        <hr />

        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <select name="nama_tabel" class="form-select" id="" required>
                                    <option value="regency">KABUPATEN</option>
                                    <option value="district">KECAMATAN</option>
                                    <option value="village">KELURAHAN</option>
                                    <option value="tps">TPS</option>
                                    <option value="caleg">CALEG</option>
                                    <option value="parpol">PARPOL</option>
                                    <option value="suara_caleg">SUARA CALEG</option>
                                    <option value="suara_parpol">SUARA PARPOL</option>
                                    {{-- <option value="">LAMPIRAN</option> --}}
                                    {{-- <option value="">UPLOAD C1</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">
                                    <i class="bx bxs-upload"></i>
                                    EXPORT
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
