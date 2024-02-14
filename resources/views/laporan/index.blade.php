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
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tps as $item)
                            <tr class="">
                                <td class="text-center align-middle">{{ $item->district->name }}</td>
                                <td class="text-center align-middle">{{ $item->village->name }}</td>
                                <td class="text-center align-middle">{{ $item->nomor_tps }}</td>
                             
                                <td class="text-center" style="width: 50px">
                                    <a href="{{ url('laporan/cetak/'.$item->id) }}" class="btn btn-primary btn-sm">
                                        <i class='bx bxs-file-pdf me-0 ms-0'></i>
                                    </a>
                                    {{-- <button type="button" class="btn btn-sm p-0" data-bs-toggle="dropdown">
                                        <i class='bx bx-dots-vertical-rounded  p-0'></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                        <a class="dropdown-item" href="{{ url('tps/show/'.$item->id) }}">DPT</a>
                                        <a class="dropdown-item" href="{{ url('tps/edit/'.$item->id) }}">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <form action="" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="tps_id" value="{{ $item->id }}">
                                            <button type="submit" class="dropdown-item text-danger"
                                                onclick="return confirm('Yakin Hapus?')">Hapus</button>
                                        </form>
                                    </div> --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Data tidak ditemukan!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
        
                <div class="float-end">
                    {{ $tps->links() }}
                </div>
        
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
