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
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ url('upload-c1/saksi/show/') }}">TPS</a></li>
                        <li class="breadcrumb-item" aria-current="page">Form</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="mb-0 text-uppercase">
            <form action="{{ url('/upload-c1/saksi/show/') }}" method="post">
                @csrf
                <input type="hidden" name="village_id" value="{{ $tps->village_id }}">
                <button class="btn">
                    <i class='bx bx-arrow-back'></i>
                </button>
                <span class="h6 align-middle">{{ $tps->regency->name.', '.$tps->district->name.', '.$tps->village->name }}</span>
            </form>
        </div>
        <hr />

        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">FILE C1</label>
                                <input type="file" name="lampiran_c1" class="form-control @error('lampiran_c1') is-invalid @enderror">
                                @error('lampiran_c1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">PLANO</label>
                                <input type="file" name="lampiran_plano" class="form-control @error('lampiran_plano') is-invalid @enderror">
                                @error('lampiran_plano')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">LOKASI</label>
                                <input type="file" name="lampiran_lokasi" class="form-control @error('lampiran_lokasi') is-invalid @enderror">
                                @error('lampiran_lokasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label">Kecamatan</label>
                                <div class="h4">{{ $tps->district->name }}</div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Kelurahan / Desa</label>
                                <div class="h4">{{ $tps->village->name }}</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor TPS</label>
                                <div class="h4">TPS - {{ $tps->nomor_tps }}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-borderless">
                                @foreach ($caleg as $item)
                                <tr>
                                    <td class="align-middle">
                                        <label for="" class="text-uppercase fw-bold">{{ $item->nomor_urut }}. {{ $item->nama }}</label>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="caleg_{{ $item->id }}" value="{{ old('caleg_'.$item->id) }}"
                                            placeholder="Suara {{ $item->nama }}" autocomplete="off" required onkeypress="return hanyaAngka(event)">
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table table-borderless">
                                @foreach ($parpol as $item)
                                <tr>
                                    <td class="align-middle">
                                        <label for="" class="text-uppercase">{{ $item->nama }}</label>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="parpol_{{ $item->id }}" value="{{ old('parpol_'.$item->id) }}"
                                            placeholder="Suara {{ $item->nama }}" autocomplete="off" required onkeypress="return hanyaAngka(event)">
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="align-middle">
                                        <label for="" class="text-uppercase">SUARA SAH</label>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="suara_sah" value="{{ old('suara_sah') }}"
                                            placeholder="Suara Sah" autocomplete="off" required onkeypress="return hanyaAngka(event)">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <label for="" class="text-uppercase text-danger">SUARA TIDAK SAH</label>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="suara_tidak_sah" value="{{ old('suara_tidak_sah') }}"
                                            placeholder="Suara Tidak Sah" autocomplete="off" required onkeypress="return hanyaAngka(event)">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <label for="" class="text-uppercase">Jumlah Pemilih</label>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="jumlah_pemilih" value="{{ old('jumlah_pemilih') }}"
                                            placeholder="Jumlah Pemilih" autocomplete="off" required onkeypress="return hanyaAngka(event)">
                                    </td>
                                </tr>
                             

                            </table>
                        </div>

                    </div>


                    <div class="text-end">
                        <button type="submit" class="btn btn-primary"><i class='bx bx-plus mx-0 p-0'></i>
                            Save</button>
                    </div>

                </form>
            </div>
        </div>
        {{-- @livewire('quick-count.show-form', ['tps' => $tps]) --}}

    </div>
</div>
<!--end page wrapper -->
@endsection

{{-- @section('script')
<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
    
        return false;
      return true;
    }
    </script>
@endsection --}}