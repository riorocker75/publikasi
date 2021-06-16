<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;
use File;

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
        $id= $request->sumber;
        if($request->has('terima')){
            DB::table('publikasi')->where('id',$id)->update([
                'status_post' => '2'
            ]);
        }elseif($request->has('tolak')){
            DB::table('publikasi')->where('id',$id)->update([
                'status_post' => '3'
            ]);
        }
        return redirect('/admin/data-publikasi')->with('alert-success','Publiakasi telah diupdate');

    }
    
    function publikasi_delete($id){
        $berkas_hapus=Publikasi::where('id',$id)->first();
        File::delete('upload/berkas/'.$berkas_hapus->berkas);

        Publikasi::where('id',$id)->delete();
        return redirect('/admin/data-publikasi')->with('alert-success','Data Berhasil dihapus');

    }
}
