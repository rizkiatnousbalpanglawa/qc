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
                        <li class="breadcrumb-item active" aria-current="page">Data Pemilih Tetap</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-3 text-uppercase">Rekap TPS</h6>

        @livewire('rekap-tps')

    </div>
</div>
<!--end page wrapper -->
@endsection

@section('script')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <script>
            document.addEventListener('livewire:load', function () {
                $('.select_kab_kota').select2({
                    placeholder: '--Pilih--',
                    ajax: {
                        url: "{{route('regency')}}",
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
        
                $('.select_kab_kota').change(function(){
                    let id= $(this).val();
                    $('.kab_id').val($(this).val());
        
                    $('.select_kecamatan').select2({
                        placeholder: '--Pilih--',
                        ajax: {
                            url: "{{url('selectDistrict')}}/"+id,
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
                });
        
                $('.select_kecamatan').change(function(){
                    let id= $(this).val();
                    $('.kec_id').val($(this).val());
        
                    $('.select_kelurahan').select2({
                        placeholder: '--Pilih--',
                        ajax: {
                            url: "{{url('selectVillage')}}/"+id,
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
                });
        
                $('.select_kelurahan').change(function(){
                    $('.village_id').val($(this).val());
                });
            });
        </script>
        @endsection