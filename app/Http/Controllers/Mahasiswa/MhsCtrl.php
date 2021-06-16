<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use File;

use Illuminate\Support\Str;

use App\Model\Admin;
use App\Model\Mahasiswa;
use App\Model\Dosen;
use App\Model\Pengguna;
use App\Model\Kategori;
use App\Model\Jurusan;
use App\Model\Prodi;
use App\Model\Publikasi;



class MhsCtrl extends Controller
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
        return view('mahasiswa.dashboard',[
            'data' =>$data
        ]);
    }


    
    function profile(){
       
        return view('mahasiswa.profileData'); 
    }

    function profile_edit(){
        $nim= Session::get('mh_username');
        $data =Mahasiswa::where('nim',$nim)->first();
        return view('mahasiswa.profileEdit',[
            'data' => $data
        ]); 
    }

    
    function profile_update(Request $request){
        $nim= Session::get('mh_username');
        $this->validate($request, [
            'nama' => 'required|max:50',
            'telp' => 'max:16'
        ]);
        $request->validate([
            'avatar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
           ]);
            
           $avatar= $request->file('avatar');

           if($avatar != ""){
                $inf_avatar =rand(10000,99999)."_".rand(1000,9999).".".$avatar->getClientOriginalExtension();
                $tujuan_upload ='upload/user';
        
                $avatar->move($tujuan_upload,$inf_avatar);

                $avatar_hapus=Mahasiswa::where('nim',$nim)->first();
                File::delete('upload/user/'.$avatar_hapus->avatar);
    
                Mahasiswa::where('nim',$nim)->update([
                  'avatar' => $inf_avatar
               ]);
           }
           DB::table('mahasiswa')->where('nim',$nim)->update([
               'nama' =>$request->nama,
               'jenjang' =>$request->jenjang,
                'id_jurusan' =>$request->jurusan,
                'id_prodi' =>$request->prodi,
                'angkatan' =>$request->angkatan,
                'telepon' =>$request->telp,
                'email' =>$request->email
           ]);

           if($request->pass != "" ){
                DB::table('pengguna')->where('username',$request->nim)->update([
                    'password' => bcrypt($request->pass),
                    'level' => '4',
                    'status' => '1'
                ]);
            }
            return redirect('/mahasiswa/profile')->with('alert-success','Data telah diubah');

    }

    
}
