<?php

namespace App\Http\Livewire;

use App\Models\District;
use App\Models\Regency;
use App\Models\SuaraCaleg;
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
    public $searchKondisi;

    public function render()
    {
        $query = Tps::with(['village', 'district', 'regency', 'lampiran', 'lampiran.caleg', 'suaraCaleg'])->orderBy('district_id')->orderBy('village_id');
        $queryEsr = SuaraCaleg::where('caleg_id', '3');
        $queryYrk = SuaraCaleg::where('caleg_id', '10');

        if ($this->searchKab) {
            $query->whereHas('regency', function ($query) {
                $query->where('id', $this->searchKab);
            });

            $queryEsr->whereHas('regency', function ($queryEsr) {
                $queryEsr->where('id', $this->searchKab);
            });

            $queryYrk->whereHas('regency', function ($queryYrk) {
                $queryYrk->where('id', $this->searchKab);
            });
        }

        if ($this->searchKec) {
            $query->whereHas('district', function ($query) {
                $query->where('id', $this->searchKec);
            });
            $queryEsr->whereHas('district', function ($queryEsr) {
                $queryEsr->where('id', $this->searchKec);
            });
            $queryYrk->whereHas('district', function ($queryYrk) {
                $queryYrk->where('id', $this->searchKec);
            });
        }
        if ($this->searchKel) {
            $query->whereHas('village', function ($query) {
                $query->where('id', $this->searchKel);
            });
            $queryEsr->whereHas('village', function ($queryEsr) {
                $queryEsr->where('id', $this->searchKel);
            });
            $queryYrk->whereHas('village', function ($queryYrk) {
                $queryYrk->where('id', $this->searchKel);
            });
        }

        if ($this->searchTps) {
            $query->where('nomor_tps', $this->searchTps);

            $queryEsr->whereHas('tps', function ($queryEsr) {
                $queryEsr->where('nomor_tps', $this->searchTps);
            });

            $queryYrk->whereHas('tps', function ($queryYrk) {
                $queryYrk->where('nomor_tps', $this->searchTps);
            });
        }

        // if ($this->searchKondisi) {
        //     $query->doesntHave('lampiran');
        //     $queryEsr->doesntHave('lampiran');
        //     $queryYrk->doesntHave('lampiran');
        // }

        if ($this->searchData) {
            if ($this->searchData == 99) {
                $query->doesntHave('lampiran');
            } 
            
            elseif ($this->searchData == 97) {
                $query->whereDoesntHave('lampiran', function ($query) {
                    $query->where('status',1);
                });

                $queryEsr->whereDoesntHave('lampiran', function ($queryEsr) {
                    $queryEsr->where('status',1);
                });

                $queryYrk->whereDoesntHave('lampiran', function ($queryYrk) {
                    $queryYrk->where('status',1);
                });
            }
            elseif ($this->searchData == 98) {
                $query->whereDoesntHave('lampiran', function ($query) {
                    $query->where('status',2);
                });

                $queryEsr->whereDoesntHave('lampiran', function ($queryEsr) {
                    $queryEsr->where('status',2);
                });

                $queryYrk->whereDoesntHave('lampiran', function ($queryYrk) {
                    $queryYrk->where('status',2);
                });
            }
            
            else {
                $query->whereHas('lampiran', function ($query) {
                    $query->where('status', $this->searchData);
                });

                $queryEsr->whereHas('lampiran', function ($queryEsr) {
                    $queryEsr->where('status', $this->searchData);
                });
    
                $queryYrk->whereHas('lampiran', function ($queryYrk) {
                    $queryYrk->where('status', $this->searchData);
                });
            }
        }

        $data['totalTps'] =  $query->count();
        $data['tps'] = $query->orderBy('nomor_tps')
            ->paginate('10');

        $data['totalEsr'] = $queryEsr->sum('jumlah_suara');

        $data['totalYrk'] = $queryYrk->sum('jumlah_suara');

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
