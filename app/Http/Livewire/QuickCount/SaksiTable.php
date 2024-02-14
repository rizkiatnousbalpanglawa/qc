<?php

namespace App\Http\Livewire\QuickCount;

use App\Models\Saksi;
use Livewire\Component;

class SaksiTable extends Component
{
    public $tps_id,$nama;
    public $listeners = ['saksiStore' => 'render', 'namaDiperbarui' => 'perbaruiNama'];

    public function perbaruiNama($nama)
    {
        $this->nama = $nama;
    }
    
    public function render()
    {
        $query = Saksi::latest();

        if ($this->nama) {
            $query->where('nama', 'LIKE', '%' . $this->nama . '%');
        }
        $data['saksi'] = $query->paginate(10);
        return view('livewire.quick-count.saksi-table',$data);
    }
}
