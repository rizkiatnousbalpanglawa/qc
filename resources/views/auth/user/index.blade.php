@extends("layouts.app")

@section("style")
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <h6 class="mb-0 text-uppercase border-start border-5 ps-2 border-primary">User </h6>
        <hr />

        <div class="card">
            <div class="card-body">
                <div class="ms-auto mb-3">
                    <div class="btn-group">
                        <a href="{{ url('user/create') }}" class="btn btn-primary">
                            <i class='bx bx-plus mx-0'></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered user" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            <tr>
                                <td class="align-middle">{{ $item->name }}</td>
                                <td class="align-middle">{{ $item->username }}</td>
                                <td class="align-middle">
                                    @php
                                        if ($item->role === 'tim_data') {
                                            echo 'Tim Data';
                                        } else {
                                            echo $item->role;
                                        }
                                        
                                    @endphp
                                </td>
                                <td class="text-center" style="width: 50px">
                                    <button type="button" class="btn btn-sm p-0" data-bs-toggle="dropdown">
                                        <i class='bx bx-dots-vertical-rounded m-0'></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
                                        <a class="dropdown-item" href="{{ url('user/edit/'.$item->id) }}">Edit</a>
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
        $('.user').DataTable({
            'ordering' : []
        });
      } );
</script>

@endsection