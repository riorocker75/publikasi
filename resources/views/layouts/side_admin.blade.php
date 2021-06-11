 <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('asset/img/pnj.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">PUBLIKASI</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @php
        $username= Session::get('adm_username');
        $gbr= \App\Model\Admin::where('username',$username)->first();
       @endphp
        @if ($gbr->avatar != "")
        <img src="{{asset('upload/user/'.$gbr->avatar.'')}}" class="img-circle elevation-2" alt="User Image">
        @else
        <img src="{{asset('asset/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
        @endif
      </div>
      <div class="info">
       
        <a href="#" class="d-block">{{Session::get('nama')}}</a>

      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{url('/')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="{{url('/admin/daftar-jurusan')}}"  class="nav-link">
            <i class="nav-icon fas fa-university"></i>
            <p>Daftar Jurusan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/admin/daftar-prodi')}}" class="nav-link">
            <i class="nav-icon fas fa-chalkboard"></i>
            <p>Daftar Program Studi</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Daftar Pengguna
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('admin/pengguna/dosen')}}"class="nav-link  active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dosen</p>
              </a>
            </li>
          
            <li class="nav-item">
              <a href="{{url('admin/pengguna/mahasiswa')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Mahsiswa</p>
              </a>
            </li>
          </ul>
        </li>
      
        <li class="nav-item">
          <a href="{{url('/admin/data-publikasi')}}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
                Publikasi
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>