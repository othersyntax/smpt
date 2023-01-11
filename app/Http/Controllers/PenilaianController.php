<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;

class PenilaianController extends Controller
{
    function ajaxFormAdd($tanah_id){
        $data['tanahID'] = $tanah_id;
        $data['penilaian'] = new Penilaian();
        return view('penilaian.form', $data);
    }

    // function ajaxFormEdit($tanah_id, $fasiliti_id){
    //     $data['tanahID'] = $tanah_id;
    //     $data['fasiliti'] = Fasiliti::find($fasiliti_id);
    //     return view('fasiliti.form', $data);
    // }

}
