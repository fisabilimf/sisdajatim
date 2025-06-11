@extends('layouts/admin-main')

@section('body')

  <section class="content-header">
          <h1>
      Kotak Saran Dan Pengaduan
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Saran Pengaduan</a></li>
            
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
                          <th>Email</th>
                <th>Tanggal</th>
                <th>Isi</th>
      
            
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($data as $da)
                           
                     <tr>
                              <td>{{$da->email}}</td>
                              <td>{{date('d/m/Y',strtotime($da->tanggal))}}</td>
                              <td>{{$da->isi}}</td>
                             

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