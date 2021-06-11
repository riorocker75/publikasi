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

class DsnCtrl extends Controller
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
        $data= Usulan::where('id_dospem1',$nidn)
                ->orWhere('id_dospem2',$nidn)->get();
        return view('dospem.dashboard',[
            'data' =>$data
        ]);
    }


    function profile(){
        return view('dospem.profileData'); 

    }
    function profile_edit(){
        return view('dospem.profileEdit'); 
    }
    function profile_update(Request $request){
        $nidn= Session::get('ds_username');

        $this->validate($request, [
            'nama' => 'required',
            'telp' => 'max:10'
        ]);
        $request->validate([
            'avatar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
           ]);
            
           $avatar= $request->file('avatar');

           if($avatar != ""){
                $inf_avatar =rand(10000,99999)."_".rand(1000,9999).".".$avatar->getClientOriginalExtension();
                $tujuan_upload ='upload/user';
        
                $avatar->move($tujuan_upload,$inf_avatar);

                $avatar_hapus=Dosen::where('nidn',$nidn)->first();
                File::delete('upload/user/'.$avatar_hapus->avatar);
    
                Dosen::where('nidn',$nidn)->update([
                  'avatar' => $inf_avatar
               ]);
           }
           DB::table('dosen')->where('nidn',$nidn)->update([
               'nama' =>$request->nama,
               'pendidikan_terakhir' =>$request->pendidikan,
               'id_jurusan' =>$request->jurusan,
               'alamat' =>$request->alamat,
               'telepon' =>$request->telp,
               'email' =>$request->email
           ]);

           if($request->pass != "" ){
                DB::table('pengguna')->where('username',$nidn)->update([
                    'username' => $request->nidn,
                    'password' => bcrypt($request->pass),
                    'level' => '2',
                    'status' => '1'
                ]);
            }
            return redirect('/dosen/profile')->with('alert-success','Data telah diubah');

    }


}
