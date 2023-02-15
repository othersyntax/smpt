<?php

namespace App\Http\Controllers\Premis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Premis\Penyewaan;

class PenyewaanController extends Controller
{
    function senarai(Request $req){
        $sewa = Penyewaan::all();
        $data['sewa'] = $sewa;
        return view('premis.senarai', $data);
    }
}
