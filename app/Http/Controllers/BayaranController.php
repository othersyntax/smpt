<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bayaran;
use Validator;

class BayaranController extends Controller
{
    function ajaxFormAdd($tanah_id){
        $data['tanahID'] = $tanah_id;
        $data['bayaran'] = new Bayaran();
        return view('bayaran.form', $data);
    }

    function ajaxFormEdit($tanah_id, $bayaran_id){
        $data['tanahID'] = $tanah_id;
        $data['bayaran'] = Bayaran::find($bayaran_id);
        return view('bayaran.form', $data);
    }

    function simpan(Request $req){
        $bayaran_id = $req->bayaran_id;

        if(!empty( $bayaran_id)){
            $bayar = Bayaran::find($bayaran_id);
        }
        else{
           $bayar = new Bayaran(); 
        }
        
        $bayar->bayar_tanah_id = $req->tanah_id;
        $bayar->bayar_year = $req->bayar_year;
        $bayar->bayar_amaun = $req->bayar_amaun;
        $bayar->bayar_date = date('Y-m-d', strtotime($req->bayar_date));
        $bayar->bayar_desc = $req->bayar_desc;
        
        $bayar->bayar_created_by = 1; //Read from session
        // $bayar->bayar_created_at = Carbon::now(); //Read from session
        $bayar->bayar_updated_by = 1; //Read from session
        // $bayar->bayar_updated_at = Carbon::now(); //Read from session

        $data = $req->all();
        $rules = [
            'bayar_year'      => 'required',
            'bayar_amaun'      => 'required',
            'bayar_date' => 'required',
            'bayar_desc' => 'required'
        ];

        $msg = [
            'bayar_year.required'    => 'Sila masukkan tahun',
            'bayar_amaun.required'   => 'Sila masukkan amaun bayaran',
            'bayar_date.required'    => 'Sila masukkan tarikh bayaran',
            'bayar_desc.required'    => 'Sila masukkan keterangan'
        ];

        $v = Validator::make($data, $rules, $msg);
        if($v->fails()){
            return back()->with('msg', 'Maklumat bayariliti gagal di simpan');
        }
        else{
            $bayar->save();
            return redirect('/tanah/view/'.$req->tanah_id)->with('msg', 'Maklumat bayaran berjaya di simpan');
        }
    }
}
