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
                        <li class="breadcrumb-item" aria-current="page">Komunitas / Relawan</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Edit Komunitas</h6>
        <hr />
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama komunitas / relawan" value="{{ $komunitas->nama }}" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="{{ $komunitas->keterangan }}" autocomplete="off">
                            </div>

                            <div class="text-end">
                                <a href="{{ url('komunitas') }}" type="button" class="btn" >Back</a>
                                <button type="submit" class="btn btn-primary"><i class='bx bx-plus mx-0 p-0'></i>
                                    Update</button>
                            </div>
                    </div>

                </div>



                </form>
            </div>
        </div>

    </div>
</div>
<!--end page wrapper -->
@endsection
