@extends('data.tps.anggota.index')

@section('dpt-table-content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            @livewire('dpt-table',['tps' => $tps])
        </div>
    </div>
</div>
@endsection