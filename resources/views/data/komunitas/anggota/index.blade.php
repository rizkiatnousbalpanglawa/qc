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
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ url('komunitas') }}">Komunitas / Relawan</a></li>
                        <li class="breadcrumb-item" aria-current="page">{{ $komunitas->nama }}</li>
                        <li class="breadcrumb-item active" aria-current="page">Anggota</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ url('/komunitas/create-anggota/'.$komunitas->id) }}" class="btn btn-primary">
                        <i class='bx bx-plus mx-0'></i>
                        Add
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Anggota Komunitas / Relawan </h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="fw-bold text-center h3">{{ $komunitas->nama }}</div>
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered partisipan" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                {{-- <th>Alamat</th> --}}
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($komunitas_anggota as $item)
                            <tr>
                                <td class="align-middle">{{ $item->tpsPemilih->nama }}</td>
                                {{-- <td>{{ $item->tps_anggota->alamat }}</td> --}}
                                <td class="align-middle">
                                    @if ($item->status == 'K')
                                    Koordinator
                                    @else
                                        Anggota
                                    @endif
                                </td>
                                <td class="text-center" style="width: 50px">
                                    <button type="button" class="btn btn-sm p-0" data-bs-toggle="dropdown">
                                        <i class='bx bx-dots-vertical-rounded m-0'></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
                                        <a class="dropdown-item" href="{{ url('komunitas/edit-anggota/'.$item->id) }}">Edit Status</a>
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