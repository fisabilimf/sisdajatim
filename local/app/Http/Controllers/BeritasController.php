<?php

namespace App\Http\Controllers;

use Request;
use Requestone;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Users;
use App\Beritas;
use App\Jenis_beritas;
use App\Kotak_sarans;
use App\Komentars;
use DB;

use Validator;
use Input;
use Excel;

class BeritasController extends Controller
{
    //

     private function __GenerateRandomName($length = 10) {
            $validCharacters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefdhijklmnopqrstuvwxyz";
            $validCharNumber = strlen($validCharacters);
            $result = "";

            for ($iStr = 0; $iStr < $length; $iStr++) {
                $index = mt_rand(0, $validCharNumber - 1);
                $result .= $validCharacters[$index];
            }

            return $result;
        }

         public function index()
    {
    	$data = Beritas::where('del','=',0)->orderBy('tanggal','DESC')->get();
    	return view('beritas.index',compact('data'));
    }
       public function create()
    {
    	$jenis = Jenis_beritas::where('del','=',0)->lists('name','id');
    	return view('beritas.create',compact('jenis'));
    }
      public function store(Request $request)
    {
       $forms=Request::all();
       if($forms["jenis"] == "0"){
       if(Request::hasFile('foto')) {
                                  $file = Input::file('foto');
                                    $forms['foto'] = $this->__GenerateRandomName()."-".$file->getClientOriginalName();  
                                    $file->move("asset/berita",$forms['foto']);

                            }
       }
       $forms['tanggal'] = date('Y-m-d',strtotime($forms['tanggal']));
       $forms['user_by'] = Auth::User()->id;
       Beritas::create($forms);
        return redirect('beritas');
       // var_dump($forms);
       // exit();

      }

        public function edit($id)
    {
    	$jenis = Jenis_beritas::where('del','=',0)->lists('name','id');
    	$jberita =Beritas::find($id);
    	return view('beritas.edit',compact('jberita','jenis'));
    }
     public function update(Request $request, $id)
    {
        //

         \Session::flash('alert', 'alert-success');
            \Session::flash('message', 'Data Telah Diganti');
      $usUpdate=Request::all();
      if($usUpdate["jenis"] == "0"){
       if(Request::hasFile('foto1')) {
                                  $file = Input::file('foto1');
                                    $usUpdate['foto'] = $this->__GenerateRandomName()."-".$file->getClientOriginalName();  
                                    $file->move("asset/berita",$usUpdate['foto']);

                            }
      }
      $usUpdate['tanggal'] = date('Y-m-d',strtotime($usUpdate['tanggal']));
         $user=Beritas::find($id);
   $user->update($usUpdate);
   return redirect('beritas');
    }

     public function destroy($id)
    {
    	   DB::table('beritas')
            ->where('id','=', $id)
            ->update(['del' => 1 ]);
            return redirect('beritas');
    }
     public function kotak()
    {
      $data = Kotak_sarans::where('del','=',0)->orderBy('tanggal','DESC')->get();
      return view('beritas.kotak',compact('data'));
    }
     public function show($id)
    {
      $berita = Beritas::find($id);
      $data = Komentars::where('berita_id','=',$id)->where('del','=',0)->get();
      return view('beritas.show',compact('data','berita'));
    }
}
