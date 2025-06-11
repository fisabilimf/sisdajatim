@extends('layouts/admin-main')

@section('body')

  <section class="content-header">
          <h1>
           <a class="btn btn-success" href="{{url('jenis_beritas/create')}}">Tambah data</a> Jenis Berita
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Data Jenis Berita</a></li>
            
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
                          <th>Jenis Berita</th>
             
               
               
                        <th></th>
            
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($data as $da)
                           
                     <tr>
                              <td>{{$da->name}}</td>
                          
                            
                              <td><a href="{{route('jenis_beritas.edit',$da->id)}}"class="btn bg-maroon xs" style="color:#fff"><i class="fa fa-undo"></i> Ubah</a></td>
                      

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