<?php

namespace App\Http\Controllers\Mahasiswa;

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

class MhsPubCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-mh')){
                return redirect('login/user')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }

    public function __invoke(){
        $nim=Session::get('mh_username');
        $data= Publikasi::where('id_pengguna',$nim)->get();
        return view('mahasiswa.publikasi.publikasiData',[
            'data' => $data
        ]);
    }

    function publikasi_add(){
        return view('mahasiswa.publikasi.publikasiAdd');
    }

    function publikasi_act(Request $request){
        
    }

    function publikasi_edit($id){
        $nim=Session::get('mh_username');
        $data= Publikasi::where('id',$id)->get();
        return view('mahasiswa.publikasi.publikasiEdit',[
            'data' => $data
        ]);
    }
    function publikasi_update(Request $request){

    }

    function publikasi_delete($id){
        
    }

}
