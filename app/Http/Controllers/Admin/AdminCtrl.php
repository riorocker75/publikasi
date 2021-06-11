<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use App\Model\Prodi;
use App\Model\Jurusan;
use App\Model\Kategori;

use App\Model\Publikasi;



class AdminCtrl extends Controller
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
        return view('admin.dashboard');
    }

    

    function profile(){

    }

    function profile_edit($id){
        
    }

    function profile_update(Request $request){
        
    }






}
