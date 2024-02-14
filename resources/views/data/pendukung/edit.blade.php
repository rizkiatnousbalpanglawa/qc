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
                        <li class="breadcrumb-item" aria-current="page">Pendukung</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Pendukung</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="" class="form-label">NIK / Nama</label>
                        <input type="text" class="form-control" value="{{ $pendukung->nik .' ~ ' . $pendukung->partisipan->nama}}" disabled>
                     
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Status</label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="pasti" value="P" {{
                                $pendukung->status=='P' ? 'checked' : '' }}>
                            <label class="form-check-label" for="pasti">Pendukung Pasti</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="abu" value="A" {{
                                $pendukung->status=='A' ? 'checked' : '' }}>
                            <label class="form-check-label" for="abu">Pendukung Abu - abu</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="lainnya" value="L" {{
                                $pendukung->status=='L' ? 'checked' : '' }}>
                            <label class="form-check-label" for="lainnya">Pendukung Lainnya</label>
                        </div>

                    </div>

                    <div class="text-end">
                        <a href="{{ url('pendukung') }}" type="button" class="btn">Back</a>
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


@section('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<script>

    $(document).ready(function() {
        $('.select_partisipan').click(function(){
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
    });

</script>
@endsection