<?php

namespace App\Http\Livewire;

use App\Models\District;
use App\Models\Regency;
use App\Models\Tps;
use App\Models\UploadC1;
use App\Models\Village;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TpsTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $searchKab;
    public $searchKec;
    public $searchKel;
    public $searchTps;
    public $searchData;

    public function render()
    {
        $query = Tps::with(['village', 'district', 'regency','lampiran','lampiran.caleg'])->orderBy('district_id')->orderBy('village_id');

        if ($this->searchKab) {
            $query->whereHas('regency', function ($query) {
                $query->where('id', $this->searchKab);
            });
        }

        if ($this->searchKec) {
            $query->whereHas('district', function ($query) {
                $query->where('id', $this->searchKec);
            });
        }
        if ($this->searchKel) {
            $query->whereHas('village', function ($query) {
                $query->where('id', $this->searchKel);
            });
        }

        if ($this->searchTps) {
            $query->where('nomor_tps', $this->searchTps);
        }

        if ($this->searchData) {
            if ($this->searchData == 99) {
                $query->doesntHave('lampiran');
            }else {
                $query->whereHas('lampiran', function ($query) {
                    $query->where('status', $this->searchData);
                });
            }
           
        }

        $data['tps'] = $query->orderBy('nomor_tps')
            ->paginate('10');

        $data['kabupaten'] = Regency::whereHas('province', function ($query) {
            $query->where('name', 'SULAWESI SELATAN');
        })->get();
        $data['kelurahan'] = Village::get();
        $data['kecamatan'] = District::get();
        $data['dataTps'] = Tps::distinct('nomor_tps')->get();
        return view('livewire.tps-table', $data);
    }

    public function updatingKelurahan()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
        $this->searchTerm = $this->kelurahan; // Salin nilai dari kelurahan ke searchTerm
    }
}
