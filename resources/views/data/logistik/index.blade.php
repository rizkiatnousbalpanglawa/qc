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
                        <li class="breadcrumb-item active" aria-current="page">Logistik</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ url('logistik/create') }}" class="btn btn-primary">
                        <i class='bx bx-plus mx-0'></i>
                        Add
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Logistik</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered partisipan" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Atribut</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Detail Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logistik as $item)
                            <tr>
                                <td>{{ $item->village->district->name }}</td>
                                <td>{{ $item->village->name }}</td>
                                <td>{{ $item->atribut->nama }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->keterangan ?? '-' }}</td>
                                <td>{{ $item->detail_lokasi ?? '-' }}</td>
                                <td class="text-center" style="width: 50px">
                                    <button type="button" class="btn btn-sm p-0" data-bs-toggle="dropdown">
                                        <i class='bx bx-dots-vertical-rounded m-0'></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
                                        <a class="dropdown-item" href="{{ url('logistik/edit/'.$item->id) }}">Edit</a>
                                        <div class="dropdown-divider"></div>	
                                        <form action="" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Yakin Hapus?')">Hapus</button>
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