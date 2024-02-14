@extends("layouts.app")

@section("style")
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
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
                        <li class="breadcrumb-item active" aria-current="page">Caleg</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ url('caleg/create') }}" class="btn btn-primary">
                        <i class='bx bx-plus mx-0'></i>
                        Add
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Caleg</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered partisipan" style="width:100%">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>No Urut</th>
                                <th>Nama</th>
                                <th>Parpol</th>
                                <th>Dapil</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($caleg as $item)
                            @php
                            switch ($item->status) {
                            case '1':
                            $status = 'DPR RI';
                            break;
                            case '2':
                            $status = 'DPRD Provinsi';
                            break;
                            case '3':
                            $status = 'DPRD Kab. / Kota';
                            break;
                            default:
                            $status = '-';
                            break;
                            }
                            @endphp
                            <tr>
                                <td class="align-middle">{{ $status }}</td>
                                <td class="align-middle">{{ $item->nomor_urut }}</td>
                                <td class="align-middle">{{ $item->nama }}</td>
                                <td class="align-middle">{{ $item->parpol->nama }}</td>
                                <td class="align-middle">{{ $item->dapil }}</td>
                                <td class="text-center" style="width: 50px">
                                    <button type="button" class="btn btn-sm p-0" data-bs-toggle="dropdown">
                                        <i class='bx bx-dots-vertical-rounded m-0'></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                        <a class="dropdown-item" href="{{ url('caleg/edit/'.$item->id) }}">Edit</a>
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
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.partisipan').DataTable({
            'ordering' : []
        });
      } );
</script>

@endsection