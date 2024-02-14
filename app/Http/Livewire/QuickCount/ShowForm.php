<?php

namespace App\Http\Livewire\QuickCount;

use App\Models\Caleg;
use App\Models\Parpol;
use Livewire\Component;

class ShowForm extends Component
{
    public $tps;
    public $suara_sah;
    public $suara_tidak_sah;
    public $jumlah_pemilih;
    public $lampiran_c1;
    public $lampiran_plano;
    public $lampiran_lokasi;

    public function render()
    {
        $data['tps'] = $this->tps;
        $data['parpol'] = Parpol::get();
        $data['caleg'] = Caleg::where('status', $this->tps->status)->get();
        return view('livewire.quick-count.show-form',$data);
    }

    public function store()
    {
        $this->validate([
            'lampiran_c1' => 'image|file|max:1024',
            'lampiran_plano' => 'image|file|max:1024',
            'lampiran_lokasi' => 'image|file|max:1024',
            'suara_sah' => '',
            'suara_tidak_sah' => '',
            'jumlah_pemilih' => '',
        ]);
        $kode = uniqid('carli-');
        $form['user_id'] = auth()->user()->id;
        $form['regency_id'] = $this->tps->regency_id;
        $form['district_id'] = $this->tps->district_id;
        $form['village_id'] = $this->tps->village_id;
        $form['tps_id'] = $this->tps->id;
        $form['kode'] = $kode;
        $form['status'] = $this->tps->status;
        $form['suara_sah'] = $this->suara_sah;
        $form['suara_tidak_sah'] = $this->suara_tidak_sah;
        $form['jumlah_pemilih'] = $this->jumlah_pemilih;

        if ($this->lampiran_c1) {
            $form['lampiran_c1'] = $this->lampiran_c1->store('lampiran');
        }
        if ($this->lampiran_plano) {
            $form['lampiran_plano'] = $this->lampiran_plano->store('lampiran');
        }
        if ($this->lampiran_lokasi) {
            $form['lampiran_lokasi'] = $this->lampiran_lokasi->store('lampiran');
        }

        $cek = UploadC1::where('tps_id', $this->tps->id)->where('status', $this->tps->status)->first();
        if ($cek) {
            return abort(401);
        }

        try {
            UploadC1::create($form);
        } catch (\Exception $e) {
            toast('Gagal menyimpan data uploadC1, ' . $e, 'error');
            return back();
        }

        try {
            $caleg = Caleg::where('status', $this->tps->status)->get();
            foreach ($caleg as $value) {
                $suaraCaleg['user_id'] = auth()->user()->id;
                // $suaraCaleg['saksi_id'] = $saksi->id;
                $suaraCaleg['regency_id'] = $this->tps->regency_id;
                $suaraCaleg['district_id'] = $this->tps->district_id;
                $suaraCaleg['village_id'] = $this->tps->village_id;
                $suaraCaleg['tps_id'] = $this->tps->id;
                $suaraCaleg['kode'] = $kode;
                $suaraCaleg['status'] = $this->tps->status;
                $suaraCaleg['caleg_id'] = $value->id;
                $suaraCaleg['jumlah_suara'] = $this->input('caleg_' . $value->id);
                SuaraCaleg::create($suaraCaleg);
            }
        } catch (\Exception $e) {
            toast('Gagal menyimpan suara caleg', 'error');
            return back();
        }

        try {
            $parpol = Parpol::get();
            foreach ($parpol as $value) {
                $suaraParpol['user_id'] = auth()->user()->id;
                // $suaraParpol['saksi_id'] = $saksi->id;
                $suaraParpol['regency_id'] = $this->tps->regency_id;
                $suaraParpol['district_id'] = $this->tps->district_id;
                $suaraParpol['village_id'] = $this->tps->village_id;
                $suaraParpol['tps_id'] = $this->tps->id;
                $suaraParpol['kode'] = $kode;
                $suaraParpol['status'] = $this->tps->status;
                $suaraParpol['parpol_id'] = $value->id;
                $suaraParpol['jumlah_suara'] = $this->input('parpol_' . $value->id);
                SuaraParpol::create($suaraParpol);
            }
        } catch (\Exception $e) {
            toast('Gagal menyimpan suara parpol', 'error');
            return back();
        }

        toast('Data berhasil disimpan!', 'success');
        return redirect('upload-c1/saksi/show/');
    }
}
