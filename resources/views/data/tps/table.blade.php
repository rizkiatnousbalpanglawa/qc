@extends('data.tps.index')

@section('tps_table')


<div class="card">
    <div class="card-body">
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <select name="kel" class="form-control select_kelurahan" id="" required></select>
                        <input type="hidden" name="village_id" class="village_id">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <button class="btn btn-primary btn-sm" type="submit">
                            <i class="bx bx-search"></i>
                            Filter
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table id="" class="table table-striped table-bordered table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Kecamatan</th>
                        <th class="text-center">Kelurahan</th>
                        <th class="text-center">No TPS</th>
                        <th class="text-center">Jumlah Pemilih</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>

        {{-- Total : <span class="fw-bold"></span> --}}

    </div>
</div>
@endsection

@section('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
      
        $('.select_kelurahan').select2({
                placeholder: '--Pilih Kelurahan--',
                ajax: {
                    url: "{{url('selectVillage/111')}}",
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

        $('.select_kelurahan').change(function(){
            $('.village_id').val($(this).val());
        });

    });
</script>
@endsection