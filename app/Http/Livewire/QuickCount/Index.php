<?php

namespace App\Http\Livewire\QuickCount;

use App\Models\Tps;
use App\Models\Village;
use Livewire\Component;

class Index extends Component
{
    public $searchKelurahan;

    public function render()
    {
        $query = Tps::with(['district','regency']);

        if ($this->searchKelurahan) {
            $query->whereHas('village', function ($query){
                $query->where('id',$this->searchKelurahan);
            });
        }

        $data['tps'] = $query->limit(10)->orderBy('district_id')->orderBy('village_id')->orderBy('nomor_tps')->get();
        $data['kelurahan'] = Village::with('district')->get();


        return view('livewire.quick-count.index',$data);
    }
}
