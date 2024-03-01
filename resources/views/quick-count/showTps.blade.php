@extends("layouts.app")

@section("wrapper")

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Quick Count</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        {{-- <li class="breadcrumb-item" aria-current="page"><a href="{{ url('upload-c1') }}">SAKSI</a></li> --}}
                        <li class="breadcrumb-item" aria-current="page">TPS</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ url('/upload-c1/create') }}" class="btn btn-primary">
                    <i class='bx bx-plus mx-0'></i>
                    Add
                </a>
            </div>
        </div>
        <hr />


        <div class="card">
            <div class="card-body">

                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="mb-3">
                                <select name="kel" class="form-control select_kelurahan" id="" required></select>
                                <input type="hidden" name="village_id" class="village_id">
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-2">
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm" type="submit">
                                    <i class="bx bx-search"></i>
                                    Filter
                                </button>
                            </div>
                        </div>
                        {{-- <div class="col align-self-center">
                            <div class="mb-3 text-center">
                                <span class="text-uppercase h5 mb-0">Saksi : {{ $saksi->nama }}</span>
                            </div>
                        </div> --}}
                    </div>
                </form>

                <div class="table-responsive" wire:loading.remove>
                    <table id="" class="table table-striped table-bordered table-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">KELURAHAN</th>
                                <th class="text-center">TPS</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tps as $item)
                            @php
                                if($item->upload->where('status','1')->isEmpty() && $item->upload->where('status','2')->isNotEmpty()) {
                                    $warna = 'bg-warning';
                                } elseif ($item->upload->where('status','1')->isNotEmpty() && $item->upload->where('status','2')->isEmpty()) {
                                    $warna = 'bg-primary  text-white';
                                } elseif($item->upload->where('status','1')->isNotEmpty() && $item->upload->where('status','2')->isNotEmpty()) {
                                    $warna = 'bg-success text-white';
                                }else {
                                    $warna="";
                                }
                                
                            @endphp
                            <tr>
                                <td class="text-center align-middle {{ $warna }}">
                                    {{ $item->district->name }} <br>
                                    {{ $item->village->name }}
                                </td>
                                <td class="text-center align-middle {{ $warna }}">{{ $item->nomor_tps }}</td>
                                <td class="text-center align-middle" style="width: 50px">
                                    @if ($item->upload->where('status','1')->isEmpty() && $item->upload->where('status','2')->isEmpty())
                                    <a href="{{ url('upload-c1/1/tps/'.$item->id) }}"
                                        class="btn btn-warning btn-sm">
                                        ESR
                                    </a>
                                    <a href="{{ url('upload-c1/2/tps/'.$item->id) }}"
                                        class="btn btn-primary btn-sm">
                                        YRK
                                    </a>
                                    @elseif ($item->upload->where('status','1')->isEmpty() && $item->upload->where('status','2')->isNotEmpty())
                                    <a href="{{ url('upload-c1/1/tps/'.$item->id) }}"
                                        class="btn btn-warning btn-sm">
                                        ESR
                                    </a>
                                    <a href="{{ url('upload-c1/2/edit/'.$item->id) }}"
                                        class="btn btn-primary btn-sm">
                                        EDIT YRK
                                    </a>
                                    @elseif ($item->upload->where('status','2')->isEmpty() && $item->upload->where('status','1')->isNotEmpty())
                                    <a href="{{ url('upload-c1/1/edit/'.$item->id) }}"
                                        class="btn btn-warning btn-sm">
                                       EDIT ESR
                                    </a>
                                    <a href="{{ url('upload-c1/2/tps/'.$item->id) }}"
                                        class="btn btn-primary btn-sm">
                                        YRK
                                    </a>
                                    @else

                                        @if (auth()->user()->role == 'admin')
                                        <a href="{{ url('upload-c1/1/edit/'.$item->id) }}"
                                            class="btn btn-warning btn-sm">
                                           EDIT ESR
                                        </a>
                                        <a href="{{ url('upload-c1/2/edit/'.$item->id) }}"
                                            class="btn btn-primary btn-sm">
                                            EDIT YRK
                                        </a>
                                        @else
                                            -
                                        @endif
                                   
                                   
                                     
                                     
                                    @endif
                                    <form action="" class="mt-2" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="tps_id" value="{{ $item->id }}">
                                        <button type="submit" name="hapus" value="esr" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">HAPUS ESR</button>
                                        <button type="submit" name="hapus" value="yrk" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">HAPUS YRK</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- <div class="float-end">
                    {{ $tps->links() }}
                </div> --}}
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