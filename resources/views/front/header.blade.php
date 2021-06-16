

{{-- mobile --}}
 <!-- Modal -->
 <div class="modal fade offcanvas-modal" id="exampleModal">
    <div class="modal-dialog offcanvas-dialog">
        <div class="modal-content">
            <div class="modal-header offcanvas-header">
                {{-- <a class="offcanvas-logo" href=""><img src="{{url('asset/img/pnj.png')}}" alt="logo" /></a> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- offcanvas-mobile-menu start -->

            <nav id="offcanvasNav" class="offcanvas-menu">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Tentang</a></li>
                    <li>
                        <a href="javascript:void(0)">Publikasi</a>

                        <ul>
                            <li><a href="">Publikasi Ilmiah Dosen</a></li>
                            <li><a href="">Publikasi Ilmiah Mahasiswa</a></li>
                        </ul>
                    </li>
                    
                    @if (Session::get('login'))
                    <li>
                        <a href="{{url('/login/user')}}">{{Session::get('nama')}}</a>
                        <ul>
                            @if (Session::get('login-ds'))
                                 <li><a href="{{url('/dashboard/dosen')}}">Dashboard</a></li>
                            @elseif(Session::get('login-mh'))
                                <li><a href="{{url('/dashboard/mahasiswa')}}">Dashboard</a></li>
                            @endif
                            <li><a href="{{url('/logout/user')}}">Logout</a></li>
                        </ul>
                    </li>
                    <li>
                        @if (Session::get('login-ds'))
                            <a href="{{url('/dosen/publikasi/add')}}">Unggah</a>
                        @elseif(Session::get('login-mh'))
                            <a href="{{url('/mahasiswa/publikasi/add')}}">Unggah</a>
                         @endif
                    </li>
                    @else
                    <li><a href="{{url('/login/user')}}">Masuk</a></li>
                    @endif
                </ul>


            </nav>
            <!-- offcanvas-mobile-menu end -->
        </div>
    </div>
</div>

{{-- end mobile --}}


{{-- start header --}}
<header id="active-sticky" class="header-section">
    <!-- Header  Start -->
    <div class="container">
        <div class="row align-items-center">
            <!-- Header Logo Start -->
            <div class="col">
                <div class="header-logo">
                    {{-- <a href=""><img src="{{url('asset/img/pnj.png')}}" alt="Site Logo" /></a> --}}
                </div>
            </div>
            <!-- Header Logo End -->

            <!-- Header Menu Start -->
            <div class="col text-end">
                <nav class="main-menu d-none d-lg-block">
                    <ul class="d-flex">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="">Tentang</a></li>
                        <li>
                            <a href="#">Publikasi</a>

                            <ul class="sub-menu">
                                <li class="sub-menu-item">
                                    <a class="sub-menu-link" href="">Publikasi Ilmiah Dosen</a>
                                </li>
                                <li class="sub-menu-item">
                                    <a class="sub-menu-link" href="single-service.html">Publikasi Ilmiah Mahasiswa</a>
                                </li>
                            </ul>
                        </li>
                     
                     
                        @if (Session::get('login'))
                        <li >
                            <a href="{{url('/login/user')}}">{{Session::get('nama')}}</a>
                            <ul class="sub-menu">
                                @if (Session::get('login-ds'))
                                     <li class="sub-menu-item"><a class="sub-menu-link" href="{{url('/dashboard/dosen')}}">Dashboard</a></li>
                                @elseif(Session::get('login-mh'))
                                    <li class="sub-menu-item"><a class="sub-menu-link" href="{{url('/dashboard/mahasiswa')}}">Dashboard</a></li>
                                @endif
                                <li class="sub-menu-item"><a class="sub-menu-link" href="{{url('/logout/user')}}">Logout</a></li>
                            </ul>
                        </li>
                        <li>
                            @if (Session::get('login-ds'))
                                <a href="{{url('/dosen/publikasi/add')}}">Unggah</a>
                            @elseif(Session::get('login-mh'))
                                <a href="{{url('/mahasiswa/publikasi/add')}}">Unggah</a>
                             @endif
                        </li>
                        @else
                         <li><a href="{{url('/login/user')}}">Masuk</a></li>
                        @endif
                    </ul>
                </nav>
                <button class="toggle" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span class="icon-top"></span>
                    <span class="icon-middle"></span>
                    <span class="icon-bottom"></span>
                </button>
            </div>
            <!-- Header Menu End -->
        </div>
    </div>
    <!-- Header  End -->
</header>


{{-- end header --}}

<!-- Hero Slider Start -->
<section class="section position-relative">
   
    <!-- hero-shape two end -->
    <!-- hero-slider start -->
    <div class="hero-slider">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-slide-content">
                        <h2 class="title animated">
                           Publikasi Ilmiah <br />
                        
                            <span style="font-size:1em"> Politeknik Negeri Jakarta</span>
                        
                        </h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img scene mt-10 mt-lg-0">
                        <div data-depth="0.2">
                            <img class="animated" src="{{url('front/images/slider/slide2.png')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero-slider end -->
</section>
<!-- Hero Slider End -->