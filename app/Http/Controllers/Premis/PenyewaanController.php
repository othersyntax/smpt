<?php

namespace App\Http\Controllers\Premis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Premis\Penyewaan;
use App\Models\Tanah;
use DB;

class PenyewaanController extends Controller
{
    function senarai(Request $req){
        $sewa = DB::table('pre_tblsewa')
                ->select('tbltanah.tanah_id', 'ddsa_kod_negeri.neg_nama_negeri', 'ddsa_kod_bandar.ban_nama_bandar', 'tbltanah.tanah_desc' , 
                        DB::raw('COUNT(pre_tblsewa.penyewaan_id) AS bilangan'))
                ->leftJoin('tblfasiliti', 'pre_tblsewa.peny_fasilti_id','=', 'tblfasiliti.fasiliti_id')
                ->join('tbltanah', 'tblfasiliti.fas_tanah_id','=', 'tbltanah.tanah_id')
                ->join('ddsa_kod_bandar', 'tbltanah.tanah_kod_bandar','=', 'ddsa_kod_bandar.ban_kod_bandar')
                ->join('ddsa_kod_negeri', 'ddsa_kod_bandar.ban_kod_negeri','=', 'ddsa_kod_negeri.neg_kod_negeri')                
                ->groupBy('tbltanah.tanah_id', 'ban_nama_bandar', 'neg_nama_negeri')->paginate(20);
        
        // DB::select(" SELECT 
        //                     FROM pre_tblsewa
        //                     INNER JOIN tblfasiliti ON pre_tblsewa.peny_fasilti_id = tblfasiliti.fasiliti_id
        //                     INNER JOIN tbltanah ON tblfasiliti.fas_tanah_id = tbltanah.tanah_id
        //                     INNER JOIN ddsa_kod_bandar ON tbltanah.tanah_kod_bandar = ddsa_kod_bandar.ban_kod_bandar
        //                     INNER JOIN ddsa_kod_negeri ON ddsa_kod_bandar.ban_kod_negeri = ddsa_kod_negeri.neg_kod_negeri
        //                     GROUP BY tbltanah.tanah_id,ban_nama_bandar, neg_nama_negeri");
        // $sewa = $query->paginate(20);
        $data['sewa'] = $sewa;
        return view('premis.senarai', $data);
    }

    function papar(Request $req){
        $tanah_id = $req->tanah;
        $tanah = Tanah::find( $tanah_id);
        $sewaan = DB::select('SELECT pre_tblsewa.*, pre_tblsyarikat.sya_desc, tblfasiliti.fas_desc  FROM pre_tblsewa
        INNER JOIN tblfasiliti ON pre_tblsewa.peny_fasilti_id = tblfasiliti.fasiliti_id
        INNER JOIN pre_tblsyarikat ON pre_tblsewa.peny_syarikat_id = pre_tblsyarikat.syarikat_id
        WHERE tblfasiliti.fas_tanah_id='.$tanah_id);
        $data['sewaan']=$sewaan;
        $data['tanah']=$tanah;
        // dd($sewaan);
        return view('premis.view', $data);
    }

    function sewa(Request $req){
        $penyewaan_id = $req->sewaan;
        $sewaan = Penyewaan::find($penyewaan_id);
        $data['sewaan'] =  $sewaan;
        return view('premis.sewa', $data);
    }
}