@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3 class="m-0">Data Publikasi</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Publikasi</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
     
        <div class="row">   
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Publikasi</h3>
                    </div>    
                    <div class="card-body">
                        <table id="data1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th width="15%">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php $no=1;?>
                                @foreach ($data as $dt)
                                <td>{{ $no++}}</td>
        
                                <td>{{$dt->judul}} </td>
                                <td>{{$dt->penulis}} </td>
                                <td>{{format_tanggal($dt->tgl)}} </td>
                                <td>{{status_post($dt->status_post)}} </td>

                                <td>
                                    @if($dt->status_post == 2)
                                        <a href="{{ url('/mahasiswa/publikasi/edit/'.$dt->id.'')}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="{{ url('/mahasiswa/publikasi/delete/'.$dt->id.'')}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                    @elseif($dt->status_post == 3)
                                         <a href="{{ url('/mahasiswa/publikasi/ulang/'.$dt->id.'')}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                    @else
                                    <label class="badge badge-info">Menunggu review...</label>
                                    @endif
                                   
                                </td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                      
                    </div>
                    
                </div>          
            </div>          
            
        </div>
    </section>
</div>

@endsection