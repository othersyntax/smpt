<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Isu;
use App\Models\JenisIsu;

class IsuController extends Controller
{
    function senarai(){
        return view('isu.senarai');
    }

    function ajaxFormAdd($tanah_id){
        $data['tanahID'] = $tanah_id;
        $data['isu'] = new Isu();
        $data['jenisIsu'] = JenisIsu::where('isuet_status', '1')
                ->orderBy('isuet_sort')
                ->pluck('isuet_name', 'isuetype_id')
                ->prepend('--Sila Pilih--', '');
        return view('isu.form', $data);
    }
}
