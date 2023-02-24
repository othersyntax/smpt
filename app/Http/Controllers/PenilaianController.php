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

    function simpan(Request $req){
        $penilaian_id = $req->penilaian_id;
     
        if(!empty( $penument_id)){
            $pen = Penilaian::find($penument_id);
        }
        else{
            $pen = new Penilaian();
            $pen->pen_create_by = session('loginID');
        }
        $pen->pen_tanah_id = $req->tanah_id;
            $pen->pen_jenis = $req->pen_jenis;
        $pen->pen_tahun = $req->pen_tahun;
        $pen->pen_nilai = $req->pen_nilai;
        $pen->pen_create_by = session('loginID'); //Read from session
        $pen->save();
        return redirect('/tanah/view/'.$req->tanah_id)->with('msg', 'Maklumat Penilaian berjaya di simpan');
    }
    

}
