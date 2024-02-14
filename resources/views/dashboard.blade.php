@extends("layouts.app")
{{-- @section("style")
<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
<link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
@endsection --}}

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        {{-- <div class="card shadow-none bg-transparent border-bottom border-2">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <h4 class="mb-3 mb-md-0">Visualisasi Data</h4>
                    </div>
                </div>
            </div>
        </div> --}}
   
        @livewire('dashboard')

    </div>
</div>
@endsection

