@extends('layouts/addmain')

@section('body')

  <section class="content-header">
          <h1>
           <a class="btn btn-success" href="{{url('databeritas/create')}}">Tambah data</a> Berita
 
          </h1>
  
        </section>
 <section class="content" style="padding-left:5px;padding-right:5px">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table  class="table table-bordered table-hover">
                    <thead>
                      <tr>
                          <th>Judul</th>
       
                <th>Jenis</th>
    
                <th>Status</th>
                <th>Komentar</th>
               
               
                        <th>Ubah</th>
            
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($data as $da)
                           
                     <tr>
                              <td>{{$da->judul}}</td>
               
                              <td>{{$da->jenis_berita_data->name}}</td>
                 
                               <td>@if($da->status == 0)
                               	 <span class="badge bg-yellow">Biasa</span>
                               	@else
                               	 <span class="badge bg-red">Headline</span>
                               	@endif</td>
                             <td><a href="{{route('databeritas.show',$da->id)}}"class="btn bg-blue xs" style="color:#fff"><i class="fa fa-comment"></i></a></td>
                              <td><a href="{{route('databeritas.edit',$da->id)}}"class="btn bg-maroon xs" style="color:#fff"><i class="fa fa-undo"></i></a></td>
                      

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