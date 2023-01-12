<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;
use App\Models\UserModul;

class PenggunaController extends Controller
{
    function index(Request $req){
        $queryType = 1; // default click pd menu    
        if($req->isMethod('post')) {
            $carian_type = $req->carian_type;
            $carian_text = $req->carian_text;
            session([
                'carian_type' => $carian_type,
                'carian_text' => $carian_text
            ]);
            $queryType = 2;
        }
        else{
            if($req->has('page')) {
                $carian_type = session('carian_type');
                $carian_text = session('carian_text');
                $queryType = 2;
            }
            else{
                session()->forget(['carian_type', 'carian_text']);
            }
            
        }

        if ($queryType == 1) {
            $user = DB::table('tbluser')
                        ->leftJoin('tblptj', 'tbluser.user_jkn','=', 'tblptj.ptj_id')
                        ->select('tbluser.*', 'tblptj.ptj_nama')
                        ->orderBy('tbluser.user_name')
                        ->paginate(20);
            $data['user'] = $user;
        } 
        else {
            $query = DB::table('tbluser')
                        ->leftJoin('tblptj', 'tbluser.user_jkn','=', 'tblptj.ptj_id')
                        ->select('tbluser.*', 'tblptj.ptj_nama')
                        ->orderBy('tbluser.user_name')
                        ->where(function($q) use ($carian_type, $carian_text){
                if(!empty($carian_type)){
                    if($carian_type=='Negeri'){
                        $q->where('ddsa_kod_negeri.neg_nama_negeri','like', "%{$carian_text}%");
                    }
                    else if($carian_type=='NoKP'){
                        $q->where('tbluser.user_nokp','like', "%{$carian_text}%");
                    }
                    else if($carian_type=='Nama'){
                        $q->where('tbluser.user_name','like', "%{$carian_text}%");
                    }
                    else{
                        if($carian_text=='Pentadbir')
                            $carian_text=1;
                        else if($carian_text=='Pegawai')
                            $carian_text=2;
                        else
                            $carian_text=3;
                        $q->where('tbluser.user_role','=', $carian_text);
                    }
                }
            });
            
            $user = $query->paginate(20);
            $data['user'] = $user;
        }       

        return view('utiliti/pengguna.index', $data);
    }

    function simpan(Request $req){
        $user_id = $req->user_id;

        if(empty($user_id)){
            $user = new Pengguna();
            $user->user_pswd = Hash::make($user->user_nokp);        
            $user->user_crtby = session('loginID');
            $user->user_updby = session('loginID');
            $user->user_crtdate = date('Y-m-d H:i:s');

        }
        else{
            $user = Pengguna::find($user_id);
            $user->user_updby = session('loginID');
        }

        $user->user_name = $req->user_name;
        $user->user_nokp = $req->user_nokp;
        $user->user_email = $req->user_email;
        $user->user_role = $req->user_role;
        $moduls = $req->user_modul;
        
        $user->user_jkn = $req->user_jkn;
        // $user->user_state = 16; //dummy dulu tak perlu dah selepas ini

        // dd($moduls);
        $simpan = $user->save();
        if($simpan){
            //insert User Modul ///Guna nanti yg ni utk masuk multiple modul
            // foreach($moduls as $mdl){
            //     $UModul = new UserModul;
            //     $UModul->um_user_id = $user_id;
            //     $UModul->um_modul_id = $mdl;
            //     $UModul->um_created_by=session('loginID');
            //     $UModul->um_updated_by=session('loginID');
            //     $UModul->save();
            // }

            $output='';
            $user = DB::table('tbluser')
                        ->leftJoin('tblptj', 'tbluser.user_jkn','=', 'tblptj.ptj_id')
                        ->select('tbluser.*', 'tblptj.ptj_nama')
                        ->orderBy('tbluser.user_name')
                        ->paginate(20);
            $output .= '  
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center" width="5%">No.</th>
                        <th width="15%">No. Kad Pengenalan</th>
                        <th width="30%">Nama</th>
                        <th width="20%">E-Mel</th>
                        <th width="15%">JKN / PTJ / PK</th>
                        <th width="10%">Peranan</th>
                        <th class="text-center" width="5%">Tindakan</th>
                    </thead>
                    <tbody>
                ';  
            $mesej = 'Anda pasti untuk set semula katalaluan?';
            $no = $user->firstItem();
            foreach($user as $usr){
                $output .= '                                                     
                    <tr>
                        <td class="text-center">'.$no++.'</td>
                        <td>'.$usr->user_nokp.'</td>
                        <td>'.$usr->user_name.'</td>
                        <td>'.$usr->user_email.'</td>
                        <td>'.$usr->ptj_nama.'</td> 
                        <td>'.aliasPeranan($usr->user_role).'</td>                                
                        <td class="text-center">
                            <a href="#" id="'.$usr->user_id.'" class="btn btn-xs btn-default edit_user" title="Kemaskini">
                                <i class="text-purple fas fa-edit"></i>
                            </a>
                            <a href="#" onclick=" return confirm('.$mesej.')" class="btn btn-xs btn-default" title="Set Katalaluan">
                                <i class="text-danger fas fa-key"></i>
                            </a>
                        </td>
                    </tr>
                ';  
            }

            $output .= '</tbody>
                        </table>'; 
           
        }
        else{
            $output='Gagal';
        }
        echo $output; 
    }

    function tambah(){
        return view('utiliti/pengguna.tambah');
    }

    function ubah(Request $req){
        $user = Pengguna::find($req->user_id);
        // $user = DB::table('tbluser')
        //                 ->leftJoin('tbluser_module', 'tbluser.user_id','=', 'tbluser_module.um_user_id')
        //                 ->select('tbluser.*', 'tbluser_module.um_modul_id')                        
        //                 ->where('tbluser.user_id',$req->user_id)
        echo json_encode($user);
    }

    function papar(Request $req){
        return view('utiliti/pengguna.ubah');
    }

    function setKatalaluan(Request $req){
        $user = Pengguna::find($req->user_id_setpass);

        $user->user_pswd = Hash::make($user->user_nokp);
        $user->user_updby = session('loginID');
        $simpan = $user->save();

        if($simpan)
            return true;
        else
            return false;
    }
}
