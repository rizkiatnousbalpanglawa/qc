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
                        <li class="breadcrumb-item" aria-current="page">Logistik</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Logistik</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Kabupaten / Kota</label>
                                <select name="" id="" class="form-control select_kab_kota">
                                </select>
                                <div class="text-danger small">
                                    *biarkan kosong jika tidak ada perubahan
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Kecamatan</label>
                                <select class="form-control select_kecamatan" name="">

                                </select>
                                <div class="text-danger small">
                                    *biarkan kosong jika tidak ada perubahan
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Kelurahan</label>
                                <select name="" class="form-control select_kelurahan" id="" required>
                                    <option value="{{ $logistik->village->id }}" selected>{{ $logistik->village->name }}</option>
                                </select>
                                <input type="hidden" name="village_id" class="village_id" value="{{ $logistik->village_id }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Jenis Atribut</label>
                                <select name="atribut_id" id="" class="form-select" required>
                                    <option value="">--Pilih--</option>
                                    @foreach ($atribut as $item)
                                    <option value="{{ $item->id }}" {{ ($item->id == $logistik->atribut_id) ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" value="{{ $logistik->jumlah }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Satuan</label>
                                <input type="text" name="satuan" class="form-control" value="{{ $logistik->satuan }}" placeholder="lembar">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" value="{{ $logistik->keterangan }}" placeholder="keterangan">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Detail Lokasi</label>
                                <input type="text" name="detail_lokasi" class="form-control" value="{{ $logistik->detail_lokasi }}"
                                    placeholder="Dekat Lampu merah">
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <a href="{{ url('logistik') }}" type="button" class="btn">Back</a>
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