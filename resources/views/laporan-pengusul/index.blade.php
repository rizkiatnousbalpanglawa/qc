@extends("layouts.app")

@section("style")
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <h6 class="mb-0 text-uppercase border-start border-5 ps-2 border-primary">Laporan Relawan</h6>
        <hr />

        <div class="card">
            <div class="card-body">

                @livewire('laporan-pengusul')
        
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




    </div>
</div>
<!--end page wrapper -->
@endsection
