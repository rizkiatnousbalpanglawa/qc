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
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data CALEG</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="" class="form-label">Parpol</label>
                        <select name="parpol_id" id="" class="form-select">
                            @foreach ($parpol as $item)
                            <option value="{{ $item->id }}" 
                                @if ($item->id == $caleg->parpol_id)
                                selected
                                @endif>
                                {{ $item->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nomor Urut</label>
                        <input type="number" class="form-control" name="nomor_urut" value="{{ old('nomor_urut') ?? $caleg->nomor_urut }}"
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Status</label>
                        <select name="status" class="form-select" id="">
                            <option value="1" {{ ($caleg->status ==1) ? 'selected' : '' }}>DPR RI</option>
                            <option value="2" {{ ($caleg->status ==2) ? 'selected' : '' }}>DPRD Provinsi</option>
                            <option value="3" {{ ($caleg->status ==3) ? 'selected' : '' }}>DPRD Kab / Kota</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') ?? $caleg->nama }}"
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


@section('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select_kab_kota').click(function(){
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
        });

        $('.select_kab_kota').change(function(){
            let id= $(this).val();

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