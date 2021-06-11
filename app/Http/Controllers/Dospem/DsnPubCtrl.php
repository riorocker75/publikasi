<?php

namespace App\Http\Controllers\Dospem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use App\Model\Admin;
use App\Model\Mahasiswa;
use App\Model\Dosen;
use App\Model\Pengguna;
use App\Model\Kategori;
use App\Model\Jurusan;
use App\Model\Prodi;
use App\Model\Publikasi;

class DsnPubCtrl extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-ds')){
                return redirect('login/user')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }
    public function __invoke(){
        $nidn=Session::get('ds_username');
        $data= Publikasi::where('id_pengguna',$nidn)->get();
        return view('dospem.publikasi.publikasiData',[
            'data' => $data
        ]);
    }

    function publikasi_add(){
        return view('dospem.publikasi.publikasiAdd');
    }

    function publikasi_act(Request $request){
        
    }

    function publikasi_edit($id){
        $nidn=Session::get('ds_username');
        $data= Publikasi::where('id',$id)->get();
        return view('dospem.publikasi.publikasiEdit',[
            'data' => $data
        ]);
    }
    function publikasi_update(Request $request){}






}
