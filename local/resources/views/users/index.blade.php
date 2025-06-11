@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
           <a class="btn btn-success" href="{{url('users/create')}}">Tambah data</a> Data Pengguna
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Data Pengguna</a></li>
            
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
                <th>Email</th>
           
               
                        <th></th>
            
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($user as $da)
                           
                     <tr>
                              <td>{{$da->name}}</td>
                           
                              <td>{{$da->email}}</td>
                         
                              <td><a href="{{route('users.edit',$da->id)}}"class="btn bg-maroon xs" style="color:#fff"><i class="fa fa-undo"></i> Ubah</a></td>
                      

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