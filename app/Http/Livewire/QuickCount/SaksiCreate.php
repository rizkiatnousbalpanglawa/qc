<?php

namespace App\Http\Livewire\QuickCount;

use App\Models\Saksi;
use App\Models\Tps;
use Livewire\Component;

class SaksiCreate extends Component
{
    public $nama;
    public $tps_id;

    public function render()
    {
        return view('livewire.quick-count.saksi-create');
    }

    public function updatedNama()
    {
        $this->emit('namaDiperbarui', $this->nama);
    }

    public function store()
    {
        
        // if (Gate::check(['admin','tim_data'])) {
        //     abort(401);
        // }
        
        $this->validate([
            'nama' => 'required',
        ]);

        $tps = Tps::where('id', $this->tps_id)->first();

        Saksi::create([
            'nama' => $this->nama,
        ]);

        $this->nama = '';

        $this->emit('saksiStore');
        $this->emit('namaDiperbarui', $this->nama);
        
    }
}
