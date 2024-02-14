<?php

namespace App\Http\Livewire;

use App\Models\Tps;
use App\Models\Village;
use Livewire\Component;
use Livewire\WithPagination;

class TpsTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $kelurahan = '';
    public $searchTerm = ''; // Tambahkan properti searchTerm untuk menyimpan kata kunci pencarian

    protected $queryString = ['kelurahan'];

    public function render()
    {
        $query = Tps::with(['village', 'district'])->withCount('dpt as jumlah_dpt');

        if ($this->searchTerm) {
            $query->whereHas('village', function ($query) {
                $query->where('name', 'LIKE', '%' . $this->searchTerm . '%');
            });
        }

        $data['tps'] = $query->limit(16)->orderBy('nomor_tps')->get();
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
