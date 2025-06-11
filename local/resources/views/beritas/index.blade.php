@extends('layouts/admin-main')

@section('body')

  <section class="content-header">
          <h1>
           <a class="btn btn-success" href="{{url('beritas/create')}}">Tambah data</a> Berita
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Data Berita</a></li>
            
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
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Jenis Berita</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Komentar</th>
                       
                        <th></th>
            
                      </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                       @foreach($data as $da)
                           
                     <tr>
                              <td>{{$no}}</td>
                              <td>{{$da->judul}}</td>
                              <td>{{date('d/m/Y',strtotime($da->tanggal))}}</td>
                              <td>{{$da->jenis_berita_data->name}}</td>
                              <td>{{$da->userdata->name}}</td>
                               <td>@if($da->status == 0)
                               	 <span class="badge bg-yellow">Biasa</span>
                               	@else
                               	 <span class="badge bg-red">Headline</span>
                               	@endif</td>
                             <td><a href="{{route('beritas.show',$da->id)}}"class="btn bg-blue xs" style="color:#fff"><i class="fa fa-comment"></i> Lihat</a></td>
                              <td><a href="{{route('beritas.edit',$da->id)}}"class="btn bg-maroon xs" style="color:#fff"><i class="fa fa-undo"></i> Ubah</a></td>
                      

                            </tr>
                            <?php $no++; ?>
                           @endforeach
                    
                    </tbody>
                  
                  </table>
              
       
             
                </div><!-- /.box-body -->
             
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

          @endsection