<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanah;
use DB;

class DashboardController extends Controller
{
    function index(){

        $milik = DB::select('SELECT
                            Count(tbltanah.tanah_id) AS BIL,
                            SUM(if(tbltanah.tanah_jenis_hakmilik=1,1,0)) AS PTP,
                            SUM(if(tbltanah.tanah_jenis_hakmilik=2,1,0)) AS RIZAB,
                            SUM(if(tbltanah.tanah_jenis_hakmilik=3,1,0)) AS FELDA,
                            SUM(if(tbltanah.tanah_jenis_hakmilik=4,1,0)) AS FELCRA,
                            SUM(if(tbltanah.tanah_jenis_hakmilik=5,1,0)) AS KESEDAR,
                            SUM(if(tbltanah.tanah_jenis_hakmilik=6,1,0)) AS LADA
                            FROM
                            tbltanah');
        // dd($milik);
        $bchart=DB::table('tbltanah')
                            ->select('ddsa_kod_negeri.neg_nama_negeri', DB::raw('COUNT(tbltanah.tanah_id) AS BIL'))
                            ->join('ddsa_kod_negeri','tbltanah.tanah_kod_negeri', '=', 'ddsa_kod_negeri.neg_kod_negeri')
                            ->groupBy('ddsa_kod_negeri.neg_nama_negeri')
                            ->get();

        $mapchart=DB::table('tbltanah')
                            ->select('ddsa_kod_negeri.neg_maps_code', DB::raw('COUNT(tbltanah.tanah_id) AS BIL'))
                            ->join('ddsa_kod_negeri','tbltanah.tanah_kod_negeri', '=', 'ddsa_kod_negeri.neg_kod_negeri')
                            ->groupBy('ddsa_kod_negeri.neg_maps_code')
                            ->get();

        foreach ($mapchart as $mc) {
           $mdata[] = "['".$mc->neg_maps_code."',".$mc->BIL."]";
        }
        // dd($mapchart);

        foreach($bchart as $d){
            $xdata[] = $d->neg_nama_negeri;
            $ydata[] = $d->BIL; 
        }

        $data['milik'] = $milik;
        $data['xdata'] = $xdata;
        $data['ydata'] = $ydata;
        $data['mapchart'] = $mdata;

        // dd($mdata);

        return view('dashboard.index', $data);
    }
}
