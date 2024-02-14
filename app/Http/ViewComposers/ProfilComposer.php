<?php


namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Profil;

class ProfilComposer
{
    public function compose(View $view)
    {
        $profil = Profil::first();
        $view->with('profil', $profil);
    }
}