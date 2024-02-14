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
                        <li class="breadcrumb-item" aria-current="page">Partisipan</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Partisipan</h6>
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
                                    <option value="" selected>{{ $partisipan->village->district->regency->name }}
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Kecamatan</label>
                                <select class="form-control select_kecamatan" name="">
                                    <option value="" selected>{{ $partisipan->village->district->name }}</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Kelurahan</label>
                                <select name="" class="form-control select_kelurahan" id="" required>
                                    <option value="{{ $partisipan->village->id }}" selected>{{
                                        $partisipan->village->name }}</option>
                                </select>
                                <input type="hidden" name="village_id" class="village_id"
                                    value="{{ $partisipan->village_id }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">No KK</label>
                                <input type="text" class="form-control" name="no_kk" value="{{ $partisipan->no_kk }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" value="{{ $partisipan->nik }}"
                                    required>
                                @error('nik')
                                <div class="small text-danger form-text">
                                    NIK sudah digunakan, periksa kembali.
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $partisipan->nama }}"
                                    required>
                                @error('nama')
                                <div class="small text-danger form-text">
                                    Nama Wajib diisi.
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir"
                                    value="{{ $partisipan->tempat_lahir }}" >
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir"
                                    value="{{ $partisipan->tanggal_lahir }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ $partisipan->alamat }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir"
                                    value="{{ $partisipan->tanggal_lahir }}" >
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status Perkawinan</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_kawin" id="belum_nikah"
                                        value="B" {{ $partisipan->status_kawin == 'B' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="belum_nikah">Belum Menikah</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_kawin" id="sudah_nikah"
                                        value="S" {{ $partisipan->status_kawin == 'S' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sudah_nikah">Sudah Menikah</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_kawin" id="bercerai"
                                        value="P" {{ $partisipan->status_kawin == 'P' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="bercerai">Perceraian</label>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1"
                                        value="L" {{ $partisipan->jenis_kelamin == 'L' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2"
                                        value="P" {{ $partisipan->jenis_kelamin == 'P' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">RT</label>
                                <input type="text" class="form-control" name="rt" value="{{ $partisipan->rt }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">RW</label>
                                <input type="text" class="form-control" name="rw" value="{{ $partisipan->rw }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">No Telp</label>
                                <input type="text" class="form-control" name="no_telp"
                                    value="{{ $partisipan->no_telp }}">
                                @error('no_telp')
                                <div class="small text-danger form-text">
                                    No Telp Wajib diisi.
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kriteria</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kriteria" id="inlineRadio1"
                                        value="E" {{ $partisipan->kriteria =='E' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio1">E</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kriteria" id="inlineRadio2"
                                        value="Y" {{ $partisipan->kriteria =='Y' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio2">Y</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kriteria" id="inlineRadio2"
                                        value="P" {{ $partisipan->kriteria =='P' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio2">P</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                                        value="K" {{ $partisipan->status=='K' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio1">K</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                        value="S" {{ $partisipan->status=='S' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio2">S</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                        value="L" {{ $partisipan->status=='L' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio2">L</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tim Data</label>
                                <input type="text" class="form-control" name="tim_data" value="{{ $partisipan['tim_data'] }}" >
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ url('partisipan') }}" type="button" class="btn">Back</a>
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