<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Admin;
use App\Model\Mahasiswa;
use App\Model\Dosen;
use App\Model\Pengguna;
use App\Model\Publikasi;
use App\Model\Taxonomy;

class FronCtrl extends Controller
{
    public function __invoke(){
        return view('front.index');
    }



    function publikasi_dosen(){
        $data= Publikasi::where('status_post','2')->where('status_user','1')->get();
        return view('front.publikasi',[
            'data' =>$data
        ]);
    }

    function publikasi_mahasiswa(){
        $data= Publikasi::where('status_post','2')->where('status_user','2')->get();
        return view('front.publikasi',[
            'data' =>$data
        ]);
    }
     

}
