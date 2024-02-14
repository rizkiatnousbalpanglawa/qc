@extends("layouts.app")

@section("style")
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <h6 class="mb-0 text-uppercase border-start border-5 ps-2 border-primary">Profil</h6>
        <hr />

        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label> <br>
                        <input type="text" class="form-control" name="name" autocomplete="off" value="{{ auth()->user()->name }}">

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label> <br>
                        <input type="text" class="form-control" name="" autocomplete="off" value="{{ auth()->user()->username }}" readonly>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password Baru</label> <br>
                        <input type="text" class="form-control" name="password" autocomplete="off" value="">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary"><i class='bx bx-plus mx-0 p-0'></i>
                            Save</button>
                    </div>
                </form>

            </div>

        </div>





    </div>
</div>
<!--end page wrapper -->
@endsection
