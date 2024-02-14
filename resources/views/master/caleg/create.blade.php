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
                        <li class="breadcrumb-item" aria-current="page">Caleg</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Caleg</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Parpol</label>
                        <select name="parpol_id" id="" class="form-select">
                            @foreach ($parpol as $item)
                            <option value="{{ $item->id }}" 
                                @if ($loop->iteration == 1)
                                selected
                                @endif>
                                {{ $item->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Urut</label>
                        <input type="number" class="form-control" name="nomor_urut" value="{{ old('nomor_urut') }}"
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" id="">
                            <option value="1" selected>DPR RI</option>
                            <option value="2">DPRD Provinsi</option>
                            {{-- <option value="3">DPRD Kab / Kota</option> --}}
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}"
                            placeholder="Nama Caleg" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DAPIL</label>
                        <select name="dapil" class="form-select" id="">
                            <option value="DPR RI SUL-SEL 3">DPR RI SUL-SEL 3</option>
                            <option value="DPRD PROVINSI SUL-SEL 10">DPRD PROVINSI SUL-SEL 10</option>
                        </select>
                    </div>
                    <div class="text-end">
                        <a href="{{ url('caleg') }}" type="button" class="btn">Back</a>
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