@extends('layouts/admin-main')

@section('body')

  <section class="content-header">
          <h1>
           <a class="btn btn-success" href="{{url('file_datas/create/'.$id.'/0')}}"><i class="fa fa-plus"></i> Tambah File</a>
           <a class="btn btn-primary" href="{{url('file_datas/create/'.$id.'/1')}}"><i class="fa fa-folder"></i> Tambah Folder</a>
           @if($id != 0)
           <a class="btn btn-danger" href="{{url("file_datas/".$find->parent_id)}}">Kembali</a>
           @endif
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#" style="font-size: 15px;"><i class="fa fa-users"></i> {{$name}}</a></li>
            
          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
                @if (Session::has('message'))
      <div class="alert {{ Session::get('alert') }} fade in" style="margin-bottom: 5px;">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><strong>{{ Session::get('message') }}</strong>
      </div>
    @endif 
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                          <th style="width:30px">No.</th>
                          <th>Nama File/Folder</th>
             
               
               
                        <th>Tipe</th>
                        <th style="width:200px"></th>
            
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?> 
                       @foreach($data as $da)
                           
                     <tr>
                         <td>{{$i}}</td>
                              <td>{{$da->name}}</td>
                              <td>
                                  @if($da->tipe == 0)
                                  <a class="badge bg-blue">File/Dokumen</a>
                                  @else
                                  <a class="badge bg-maroon">Folder</a>
                                  @endif
                              </td>
                          
                            
                              <td>
                                   <a  href="{{route('file_datas.edit',$da->id)}}" class="btn bg-red xs" style="color:#fff"><i class="fa fa-edit"></i> Edit</a>
                                  @if($da->tipe == 0)
                                  <a href="{{asset('asset/bank_dokumen/'.$da->file)}}"class="btn bg-blue xs" style="color:#fff"><i class="fa fa-eye"></i> View</a>
                                  @else
                                  <a href="{{url('file_datas/'.$da->id)}}"class="btn bg-maroon xs" style="color:#fff"><i class="fa fa-folder"></i> Lihat Folder</a>
                                  @endif
                                  
                                 
                                  
                                  </td>
                      

                            </tr>
                            <?php $i++; ?>
                           @endforeach
                    
                    </tbody>
                  
                  </table>
              
       
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

          @endsection