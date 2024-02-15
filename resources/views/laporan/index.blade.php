@extends("layouts.app")

@section("style")
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <h6 class="mb-0 text-uppercase border-start border-5 ps-2 border-primary">Laporan</h6>
        <hr />

        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <select name="kel" class="form-control select_kecamatan" id="" required></select>
                                <input type="hidden" name="district_id" class="district_id">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">
                                    <i class="bx bxs-file-pdf"></i>
                                    CETAK
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@section('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>


<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select_kecamatan').select2({
                placeholder: '--Pilih Kecamatan--',
                ajax: {
                    url: "{{url('selectAllDistrict')}}",
                    processResults: function({data}){
                        return {
                            results: $.map(data, function(item){
                                return{
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        }
                    }
                } 
        });

        $('.select_kecamatan').change(function(){
            $('.district_id').val($(this).val());
        });

    });
</script>

@endsection
