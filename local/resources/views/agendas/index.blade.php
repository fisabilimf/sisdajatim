@extends('layouts/admin-main')

@section('body')

  <section class="content-header">
          <h1>
           <a class="btn btn-success" href="{{url('agendas/create')}}">Tambah data</a> Agenda
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Data Agenda</a></li>
            
          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                          <th>Judul</th>
                <th>Deskripsi</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Tempat</th>
               
               
                        <th></th>
            
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($data as $da)
                           
                     <tr>
                              <td>{{$da->judul}}</td>
                              <td>{{$da->deskripsi}}</td>
                              <td>{{date('d/m/Y',strtotime($da->tanggal_mulai))}}</td>
                              <td>{{date('d/m/Y',strtotime($da->tanggal_selesai))}}</td>
                              <td>{{$da->tempat}}</td>
                            
                            
                              <td><a href="{{route('agendas.edit',$da->id)}}"class="btn bg-maroon xs" style="color:#fff"><i class="fa fa-undo"></i> Ubah</a></td>
                      

                            </tr>
                           @endforeach
                    
                    </tbody>
                  
                  </table>
              
       
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

          @endsection