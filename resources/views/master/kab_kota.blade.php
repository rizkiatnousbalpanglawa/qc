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
                        <li class="breadcrumb-item active" aria-current="page">Kabupaten / Kota</li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                        <i class='bx bx-plus mx-0'></i>
                        Add
                    </button>
                </div>
            </div> --}}
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Kabupaten / Kota</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="kab_kota" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Provinsi</th>
                                <th>Kabupaten / Kota</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kab_kota as $item)
                            <tr>
                                <td>{{ $item->province->name }}</td>
                                <td>{{ $item->name }}</td>
                                {{-- <td>
                                    <a href="{{ url('kabupaten-kota/hapus/' . $item->id) }}" class="btn btn-danger" onclick="return confirm('Yakin Hapus?')">Hapus</a>
                                </td> --}}
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
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Kode Kabupaten / Kota</label>
                                <input type="text" class="form-control" name="kode_kab" placeholder="Contoh: KAB-001">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Kabupaten / Kota</label>
                                <input type="text" class="form-control" name="kabupaten_kota"
                                    placeholder="Contoh: Timika">
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