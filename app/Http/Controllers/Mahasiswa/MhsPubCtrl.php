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
        $judul=$request->judul;
        $id=Session::get('mh_username');
        $this->validate($request, [
            'judul' => 'required|unique:publikasi,judul',
            'deskripsi' => 'required|',
            'penulis' => 'required',
            'kunci' => 'required',
            'kategori' => 'required',
            'jurusan' => 'required',
            'status_berkas' => 'required',
            'berkas' => 'required|file|mimes:pdf|max:20000'
        ]);

        $tujuan_upload ='upload/berkas';
        $berkas= $request->file('berkas');

        $inf_berkas =rand(10000,99999)."_".rand(1000,9999).".".$berkas->getClientOriginalExtension();
        $berkas->move($tujuan_upload,$inf_berkas);

        $slug= Str::slug($request->judul, '-');
        $slug_kunci= Str::slug($request->kunci, '-');

        DB::table('publikasi')->insert([
            'judul' =>$request->judul,
            'slug' => $slug,
            'tgl' => $request->tgl,
            'deskripsi' =>$request->deskripsi,
            'id_pengguna' =>$id,
            'penulis' =>$request->penulis,
            'jurusan' =>$request->jurusan,
            'kata_kunci' =>$request->kunci,
            'kk_slug' => $slug_kunci,
            'kategori' => $request->kategori,
            'link' => $request->link,
            'berkas' => $inf_berkas,
            'status_berkas' => $request->status_berkas,
            'status_post' => '1',
            'status_user' => '2',
        ]);

        return redirect('/mahasiswa/data-publikasi')->with('alert-success','Publikasi Telah dikirimkan ');

    }

    function publikasi_edit($id){
        $nim=Session::get('mh_username');
        $data= Publikasi::where('id',$id)->get();
        return view('mahasiswa.publikasi.publikasiEdit',[
            'data' => $data
        ]);
    }
    function publikasi_update(Request $request){
        $judul=$request->judul;
        $id=$request->sumber;
        $this->validate($request, [
            'judul' => 'required|unique:publikasi,judul,'.$judul.',judul',
            'deskripsi' => 'required|',
            'penulis' => 'required',
            'kunci' => 'required',
            'kategori' => 'required',
            'jurusan' => 'required',
            'status_berkas' => 'required',
            'berkas' => 'file|mimes:pdf|max:20000'
        ]);

        $tujuan_upload ='upload/berkas';
        $berkas= $request->file('berkas');

        if($berkas != ""){
            $inf_berkas =rand(10000,99999)."_".rand(1000,9999).".".$berkas->getClientOriginalExtension();
            $berkas->move($tujuan_upload,$inf_berkas);

            $berkas_hapus=Publikasi::where('id',$id)->first();
            File::delete('upload/berkas/'.$berkas_hapus->berkas);

            Publikasi::where('id',$id)->update([
                'berkas' => $inf_berkas
            ]);
        }
       
        $slug= Str::slug($request->judul, '-');
        $slug_kunci= Str::slug($request->kunci, '-');

        DB::table('publikasi')->insert([
            'judul' =>$request->judul,
            'slug' => $slug,
            'tgl' => $request->tgl,
            'deskripsi' =>$request->deskripsi,
            'penulis' =>$request->penulis,
            'jurusan' =>$request->jurusan,
            'kata_kunci' =>$request->kunci,
            'kk_slug' =>$slug_kunci,
            'kategori' => $request->kategori,
            'link' => $request->link,
            'status_berkas' => $request->status_berkas,
        ]);

        return redirect('/mahasiswa/data-publikasi')->with('alert-success','Data Berhasil diubah');

    }

    function publikasi_delete($id){
        $berkas_hapus=Publikasi::where('id',$id)->first();
        File::delete('upload/berkas/'.$berkas_hapus->berkas);

        Publikasi::where('id',$id)->delete();
        return redirect('/mahasiswa/data-publikasi')->with('alert-success','Data Berhasil dihapus');

    }


    function publikasi_ulang($id){
        $nim=Session::get('mh_username');
        $data= Publikasi::where('id',$id)->get();
        return view('mahasiswa.publikasi.publikasiUlang',[
            'data' => $data
        ]);
    }

    function publikasi_ulang_update(Request $request){
        $judul=$request->judul;
        $id=$request->sumber;
        $this->validate($request, [
            'judul' => 'required|unique:publikasi,judul,'.$judul.',judul',
            'deskripsi' => 'required|',
            'penulis' => 'required',
            'kunci' => 'required',
            'kategori' => 'required',
            'jurusan' => 'required',
            'status_berkas' => 'required',
            'berkas' => 'file|mimes:pdf|max:20000'
        ]);

        $tujuan_upload ='upload/berkas';
        $berkas= $request->file('berkas');

        if($berkas != ""){
            $inf_berkas =rand(10000,99999)."_".rand(1000,9999).".".$berkas->getClientOriginalExtension();
            $berkas->move($tujuan_upload,$inf_berkas);

            $berkas_hapus=Publikasi::where('id',$id)->first();
            File::delete('upload/berkas/'.$berkas_hapus->berkas);

            Publikasi::where('id',$id)->update([
                'berkas' => $inf_berkas
            ]);
        }
       
        $slug= Str::slug($request->judul, '-');
        $slug_kunci= Str::slug($request->kunci, '-');

        DB::table('publikasi')->insert([
            'judul' =>$request->judul,
            'slug' => $slug,
            'tgl' => $request->tgl,
            'deskripsi' =>$request->deskripsi,
            'penulis' =>$request->penulis,
            'jurusan' =>$request->jurusan,
            'kata_kunci' =>$request->kunci,
            'kk_slug' =>$slug_kunci,
            'kategori' => $request->kategori,
            'link' => $request->link,
            'status_berkas' => $request->status_berkas,
        ]);

        return redirect('/mahasiswa/data-publikasi')->with('alert-success','Data di ajukan kembali');

    }

    


}
