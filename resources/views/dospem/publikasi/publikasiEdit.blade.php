@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3 class="m-0">Publikasi</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Publikasi</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        @foreach ($data as $dt)
            
        @endforeach
        <form action="{{url('/dosen/publikasi/update')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="row">  
                <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Publikasi</h3>
                    </div>    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kategoriBantuan">Judul</label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="judul"  placeholder="Judul Publikasi" value="{{$dt->judul}}" required>
                              @if($errors->has('judul'))
                              <small class="text-muted text-danger">
                                  {{ $errors->first('judul')}}
                                  </small>
                              @endif
                              <input type="hidden" class="form-control" name="sumber" value="{{$dt->id}}" required>

                          </div>
                          </div> 
                          
                          <div class="form-group">
                            <label for="kategoriBantuan">Deskripsi</label>
                            <div class="input-group mb-3">
                            
                             <textarea name="deskripsi" cols="100" rows="5">{{$dt->deskripsi}}</textarea>
                              @if($errors->has('deskripsi'))
                              <small class="text-muted text-danger">
                                  {{ $errors->first('deskripsi')}}
                                  </small>
                              @endif 
                          </div>
                          </div>  

                          <div class="form-group">
                            <label for="kategoriBantuan">Tanggal Publikasi</label>
                            <div class="input-group mb-3">
                              <input type="date" class="form-control" name="tgl"  value="{{$dt->tgl}}">
                              @if($errors->has('tgl'))
                              <small class="text-muted text-danger">
                                  {{ $errors->first('tgl')}}
                                  </small>
                              @endif 
                          </div>
                          </div> 

                          <div class="form-group">
                            <label for="kategoriBantuan">Penulis</label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="penulis" value="{{$dt->penulis}}" required>
                              @if($errors->has('penulis'))
                              <small class="text-muted text-danger">
                                  {{ $errors->first('penulis')}}
                                  </small>
                              @endif 
                          </div>
                          </div> 

                          <div class="form-group">
                            <label for="kategoriBantuan">Kata Kunci</label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="kunci" value="{{$dt->kata_kunci}}" required>
                              @if($errors->has('kunci'))
                              <small class="text-muted text-danger">
                                  {{ $errors->first('kunci')}}
                                  </small>
                              @endif 
                          </div>
                          </div> 

                          <div class="form-group">
                            <label for="kategoriBantuan">Kategori</label>
                            <div class="input-group mb-3">
                                <select class="form-control" name="kategori" required>
                                    <option value="{{$dt->kategori}}" selected hidden>{{kategori_post($dt->kategori)}}</option>
                                    <option value="1">Jurnal</option>
                                    <option value="2">Pencapaian</option>
                                </select>
                              @if($errors->has('kategori'))
                              <small class="text-muted text-danger">
                                  {{ $errors->first('kategori')}}
                                  </small>
                              @endif 
                          </div>
                          </div>

                          <div class="form-group">
                            <label>Jurusan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                </div>
                                <select class="form-control" name="jurusan" required>
                                    @php
                                        $jur=\App\Model\Jurusan::all();
                                        $jr=\App\Model\Jurusan::where('id',$dt->jurusan)->first();
                                    @endphp
                                    <option value="{{$dt->jurusan}}" selected hidden>{{$jr->nama}}</option>
                                    @foreach ($jur as $jr)
                                        <option value="{{$jr->id}}">{{$jr->nama}}</option>
                                    @endforeach
                                   
                                </select>
                                @if($errors->has('jurusan'))
                                <small class="text-muted text-danger">
                                    {{ $errors->first('jurusan')}}
                                </small>
                                @endif 
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kategoriBantuan">Status Publikasi</label>
                            <div class="input-group mb-3">
                                <select class="form-control" name="status_berkas" required>
                                    <option value="{{$dt->status_berkas}}" selected hidden>{{status_berkas($dt->status_berkas)}}</option>
                                    <option value="1">Private</option>
                                    <option value="2">Publik</option>
                                </select>
                              @if($errors->has('status_berkas'))
                              <small class="text-muted text-danger">
                                  {{ $errors->first('status_berkas')}}
                                  </small>
                              @endif 
                          </div>
                          </div>
                          
                    </div>
                    
                </div>          
            </div>  
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">File</h3>
                    </div>    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="avatar">Upload File</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="berkas" name="berkas" required>
                                <label class="custom-file-label" for="berkas">File</label>
                              </div>
                              @if($errors->has('berkas'))
                              <small class="text-muted text-danger">
                                  {{ $errors->first('berkas')}}
                              </small>
                              @endif 
                            </div>
                            <br>
                            {{preview_proposal($dt->berkas)}}
                          </div>  

                          
                          <div class="form-group">
                            <label for="kategoriBantuan">Link</label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="link" value="{{$dt->link}}">
                              @if($errors->has('link'))
                              <small class="text-muted text-danger">
                                  {{ $errors->first('link')}}
                                  </small>
                              @endif 
                          </div>
                          </div> 

                          <button type="submit" class="btn btn-primary"> Publish</button>
                    </div>
                    
                </div>          
            </div> 
        </div>
    </form> 
    </section>
</div>

@endsection