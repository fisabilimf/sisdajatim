@extends('layouts/addmain')

@section('body')


 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table  class="table table-bordered table-hover">
                    <thead>
                      <tr>
                
           
                <th>Komentar</th>
              
  
               
               
                        <th></th>
            
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($data as $da)
                           
                     <tr>
                        
         
                              <td><b>{{$da->name}} :</b> <br>{{$da->isi}}
                              <br><br>{{$da->email}}</td>
       
                    
                           
                           
                              <td><a href="{{route('beritas.edit',$da->id)}}"class="btn bg-maroon xs" style="color:#fff"><i class="fa fa-trash"></i></a></td>
                      

                            </tr>
                           @endforeach
                    
                    </tbody>
                  
                  </table>
              
       
             
                </div><!-- /.box-body -->
                    <div class="box-body">
                      @if($berita->jenis == "0")
                  <img src="{{asset("asset/berita/".$berita->foto)}}" width="100%">
                  @else
                   <iframe  width="100%" height="400"src="https://www.youtube.com/embed/{{$berita->foto}}">
                                        </iframe>
                  @endif
                   <div class="col-xs-12">
                    <br>
                     <?php echo($berita->kutipan);?>
                    <br><br>
                    <?php echo($berita->isi);?>
                    <br><br>
                    <b>{{$berita->userdata->name}} , {{date('d/m/Y',strtotime($berita->tanggal))}}</b>
                    <br><br>
                    <a class="btn btn-danger" href="{{url('databeritas')}}"> Kembali</a>
                   </div>
                 </div>
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

          @endsection