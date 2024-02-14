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
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ url('komunitas') }}">Komunitas / Relawan</a></li>
                        <li class="breadcrumb-item" aria-current="page">{{ $anggota->komunitas->nama }}</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Anggota Komunitas / Relawan {{ $anggota->tpsPemilih->nama }}</h6>
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
                               <input type="text" class="form-control" value="{{ $anggota->tpsPemilih->nama }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="anggota" value="A" {{
                                        $anggota->status=='A' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="anggota">Anggota</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="koord" value="K" {{
                                        $anggota->status=='K' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="koord">Koordinator</label>
                                </div>

                            </div>



                            <div class="text-end">
                                <a href="{{ url('komunitas/show/'.$anggota->komunitas->id) }}" type="button" class="btn" >Back</a>
                                <button type="submit" class="btn btn-primary"><i class='bx bx-plus mx-0 p-0'></i>
                                    Save</button>
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



@section('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select_partisipan').select2({
            placeholder: '--Pilih--',
            ajax: {
                url: "{{url('selectPartisipan')}}",
                processResults: function({data}){
                    return {
                        results: $.map(data, function(item){
                            return{
                                id: item.nik,
                                text: item.nama +' ~ '+ item.nik
                            }
                        })
                    }
                }
            } 
        });

    });
</script>
@endsection