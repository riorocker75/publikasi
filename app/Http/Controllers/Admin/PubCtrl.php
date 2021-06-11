<?php

namespace App\Http\Controllers\Admin;

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

class PubCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-adm')){
                return redirect('login/user');
            }
            return $next($request);
        });
    } 

    public function __invoke(){
        $data= Publikasi::orderBy('id','desc')->get();
        return view('admin.publikasi.publikasiData',[
            'data' => $data
        ]);
    }

    function publikasi_edit($id){
        $data= Publikasi::where('id',$id)->get();
        return view('admin.publikasi.publikasiEdit',[
            'data' => $data
        ]);
    }
    function publikasi_update(Request $request){

    }
    
    function publikasi_delete($id){
        
    }
}
