<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanah;
use App\Models\Daerah;
use App\Models\Bandar;
use App\Models\Penilaian;
use App\Models\Dokumen;
use App\Models\Fasiliti;
use App\Models\Isu;
use App\Models\Bayaran;
use Form;

class TanahController extends Controller
{
    function senarai(Request $req){
        $queryType = 1; // default click pd menu    
        if($req->isMethod('post')) {
            $neg_kod_negeri = $req->neg_kod_negeri;
            $dae_kod_daerah = $req->dae_kod_daerah;
            $ban_kod_bandar = $req->ban_kod_bandar;
            $jenis_hakmilik = $req->jenis_hakmilik;
            $nolot  = $req->nolot;
            $tanah_desc  = $req->tanah_desc;
            session([
                'neg_kod_negeri' => $neg_kod_negeri,
                'dae_kod_daerah' => $dae_kod_daerah,
                'ban_kod_bandar' => $ban_kod_bandar,
                'jenis_hakmilik' => $jenis_hakmilik,
                'nolot'  => $nolot,
                'tanah_desc'  => $tanah_desc
            ]);
            $queryType = 2;
        }
        else{
            if($req->has('page')) {
                $neg_kod_negeri = session('neg_kod_negeri');
                $dae_kod_daerah = session('dae_kod_daerah');
                $ban_kod_bandar = session('ban_kod_bandar');
                $jenis_hakmilik = session('jenis_hakmilik');
                $nolot  = session('nolot');
                $tanah_desc  = session('tanah_desc');
                $queryType = 2;
            }
            else{
                session()->forget(['neg_kod_negeri', 'dae_kod_daerah', 'ban_kod_bandar', 'jenis_hakmilik', 'nolot', 'tanah_desc']);
            }
            
        }

        if ($queryType == 1) {
            $tanah = Tanah::paginate(20);
        } 
        else {
            $query = Tanah::where(function($q) use ($neg_kod_negeri, $dae_kod_daerah, $ban_kod_bandar, $jenis_hakmilik, $nolot, $tanah_desc){
                if(!empty($neg_kod_negeri)){
                    $q->where('tanah_kod_negeri',$neg_kod_negeri);
                }
    
                if(!empty($dae_kod_daerah)){
                    $q->where('tanah_kod_daerah',$dae_kod_daerah);
                }

                if(!empty($ban_kod_bandar)){
                    $q->where('tanah_kod_bandar',$ban_kod_bandar);
                }
    
                if(!empty($jenis_hakmilik)){
                    $q->where('tanah_jenis_hakmilik',$jenis_hakmilik);
                }

                if(!empty($nolot)){
                    $q->where('tanah_no_lot','like', "%{$nolot}%");
                }

                if(!empty($tanah_desc)){
                    $q->where('tanah_desc','like', "%{$tanah_desc}%");
                }
            });
            

            $tanah = $query->paginate(20);

        }
        return view('/tanah.senarai', compact('tanah'));
    }

    //TAMBAH MAKLUMAT TANAH 11/1/23
    function tambah(){
        // $tanah = Tanah::find($tanah_id);
        // session([
        //     'neg_kod_negeri' => $tanah->tanah_kod_negeri,
        //     'dae_kod_daerah' => $tanah->tanah_kod_daerah,
        //     'ban_kod_bandar' => $tanah->tanah_kod_bandar
        // ]);
        // $data['tanah'] = $tanah;
        return view('tanah.tambah');
    }

    function simpan(Request $req){
        $tanah_id = $req->tanah_id;

        if(empty($tanah_id)){
            $tanah = new Tanah();
            $tanah->tanah_crtby = session('loginID');
            $tanah->tanah_updby = session('loginID');
        }
        else{
            $tanah = Tanah::find($tanah_id);
            $tanah->tanah_updby = session('loginID');
        }
        
        $tanah->tanah_desc = $req->tanah_desc;
        $tanah->tanah_no_lot = $req->tanah_no_lot;
        $tanah->tanah_no_jkptg = $req->tanah_no_jkptg;
        $tanah->tanah_jenis_hakmilik = $req->tanah_jenis_hakmilik;
        $tanah->tanah_no_hakmilik = $req->tanah_no_hakmilik;
        $tanah->tanah_facilities = $req->tanah_facilities;
        $tanah->tanah_no_jkptg = $req->tanah_no_jkptg;
        $tanah->tanah_no_hakmilik = $req->tanah_no_hakmilik;
        $tanah->tanah_pk_id = $req->tanah_pk_id;
        $tanah->tanah_kod_negeri = $req->neg_kod_negeri;
        $tanah->tanah_kod_daerah = $req->dae_kod_daerah;
        $tanah->tanah_kod_bandar = $req->ban_kod_bandar;
        $tanah->tanah_longitud = $req->tanah_longitud;
        $tanah->tanah_latitud = $req->tanah_latitud;
        $tanah->tanah_memo = $req->tanah_memo;
        $tanah->tanah_luas = $req->tanah_luas;
        $tanah->tanah_luas_unit = $req->tanah_luas_unit;
        $tanah->tanah_status_tanah = $req->tanah_status_tanah;
        $tanah->tanah_status = $req->tanah_status;
        
        $tanah->save();

        return redirect('tanah/view/'.$tanah->tanah_id);
    }

    function papar($tanah_id){
        $tanah = Tanah::find($tanah_id);
        $nilai = Penilaian::where('pen_tanah_id',$tanah_id)->get();
        $dokumen = Dokumen::where('doc_tanah_id',$tanah_id)->get();
        $fasiliti = Fasiliti::where('fas_tanah_id',$tanah_id)->get();
        $isu = Isu::where('isue_tanah_id',$tanah_id)->get();
        $bayaran = Bayaran::where('bayar_tanah_id', $tanah_id)->get();
        $data['tanah'] = $tanah;
        $data['nilai'] = $nilai;
        $data['dokumen'] = $dokumen;
        $data['fasiliti'] = $fasiliti;
        $data['isu'] = $isu;
        $data['bayaran'] = $bayaran;
        return view('tanah.view', $data);
    }

    function ubah($tanah_id){
        $tanah = Tanah::find($tanah_id);
        session([
            'neg_kod_negeri' => $tanah->tanah_kod_negeri,
            'dae_kod_daerah' => $tanah->tanah_kod_daerah,
            'ban_kod_bandar' => $tanah->tanah_kod_bandar
        ]);
        $data['tanah'] = $tanah;
        return view('tanah.ubah', $data);
    }

    // function paparDokumen($dokumen_id){
    //     $dokumen = Dokumen::find($dokumen_id);
    //     $fail = $dokumen->doc_location;
    // }
}
