<?php

namespace App\Http\Controllers;

use Request;
use Requestone;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Users;
use App\Galleri_datas;
use DB;

use Validator;
use Input;
use Excel;

class Galleri_datasController extends Controller
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
    	$data = Galleri_datas::where('del','=',0)->get();
    	 // var_dump($data);
      //  exit();
    	return view('galleri_datas.index',compact('data'));
    }
      public function create()
    {
        //  var_dump("sdfdfsdf");
        // exit();
    	return view('galleri_datas.create');
    }
       public function store(Request $request)
    {
        //  var_dump("jhghgj");
        // exit();
       $forms=Request::all();
          
        if(Request::hasFile('foto')) {
                                  $file = Input::file('foto');
                                    $forms['foto'] = "galleri-".$this->__GenerateRandomName()."-".$file->getClientOriginalName();  
                                    $file->move("asset/berita",$forms['foto']);

                            }
       Galleri_datas::create($forms);
      //  return redirect('galleri_datas');
    

      }

         public function edit($id)
    {
    	$jb =Galleri_datas::find($id);
    	return view('galleri_datas.edit',compact('jb'));
    }

      public function update(Request $request, $id)
    {
        //

         \Session::flash('alert', 'alert-success');
            \Session::flash('message', 'Data Telah Diganti');
      $usUpdate=Request::all();
         $user=Galleri_datas::find($id);
            if(Request::hasFile('foto1')) {
                                  $file = Input::file('foto1');
                                    $usUpdate['foto'] = "galleri-".$this->__GenerateRandomName()."-".$file->getClientOriginalName();  
                                    $file->move("asset/berita",$usUpdate['foto']);

                            }
   $user->update($usUpdate);
   return redirect('galleri_datas');
    }

     public function destroy($id)
    {
    	   DB::table('galleri_datas')
            ->where('id','=', $id)
            ->update(['del' => 1 ]);
            return redirect('galleri_datas');
    }
}
