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
                        <li class="breadcrumb-item active" aria-current="page">Pendukung</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">

                    {{-- upload Document --}}
                    <button type="button" class="btn btn-success me-2" data-bs-toggle="modal"
                        data-bs-target="#uploadModal">
                        <i class='bx bx-upload mx-0'></i>
                        Upload
                    </button>

                    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="">Tim Data</label>
                                        <input type="text" class="form-control" name="tim_data" placeholder="tim data">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Upload Data</label> <br>
                                        <input type="file" class="custom-file" name="upload_data">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('partisipan/create') }}" class="btn btn-primary">
                        <i class='bx bx-plus mx-0'></i>
                        Add
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Pendukung</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered partisipan" style="width:100%">
                        <thead>
                            <tr>
                                {{-- <th>No. KK</th> --}}
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Kelurahan</th>
                                {{-- <th>Alamat</th> --}}
                                <th>Telp</th>
                                <th>Kriteria</th>
                                <th>Status</th>
                                <th>Tim Data</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partisipan as $item)
                            <tr>
                                {{-- <td>{{ $item->no_kk }}</td> --}}
                                <td class="align-middle">{{ $item->nik }}</td>
                                <td class="align-middle">{{ $item->nama }}</td>
                                <td class="align-middle">{{ $item->village->name }}</td>
                                {{-- <td>{{ $item->alamat }}</td> --}}
                                <td class="align-middle">{{ $item->no_telp }}</td>
                                <td class="align-middle text-capitalize">{{ $item->kriteria }}</td>
                                <td class="align-middle text-capitalize">{{ $item->status }}</td>
                                <td class="align-middle text-capitalize">{{ $item->tim_data }}</td>
                                <td class="align-middle text-center" style="width: 50px">
                                    <button type="button" class="btn btn-sm p-0" data-bs-toggle="dropdown">
                                        <i class='bx bx-dots-vertical-rounded m-0'></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                        <a class="dropdown-item" href="{{ url('partisipan/edit/'.$item->id) }}">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <form action="" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="dropdown-item text-danger"
                                                onclick="return confirm('Yakin Hapus?')">Hapus</button>
                                        </form>

                                    </div>
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
<!--end page wrapper -->
@endsection

@section("script")
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('.partisipan').DataTable({
            'ordering' : []
        });
      } );
</script>

@endsection