<?php

namespace App\Http\Controllers;

use Request;
use Requestone;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Users;
use App\Saranas;
use App\Lingkups;
use DB;

use Validator;
use Input;
use Excel;

class SaranasController extends Controller
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
    	$data = Saranas::where('del','=',0)->orderBy('lingkup_id','ASC')->get();
    	return view('saranas.index',compact('data'));
    }
      public function create()
    {
    	$jenis = Lingkups::where('del','=',0)->lists('name','id');
    	return view('saranas.create',compact('jenis'));
    }
     public function store(Request $request)
    {
       $forms=Request::all();
       if(Request::hasFile('foto')) {
                                  $file = Input::file('foto');
                                    $forms['foto'] = $this->__GenerateRandomName()."-".$file->getClientOriginalName();  
                                    $file->move("asset/sarana",$forms['foto']);

                            }
       Saranas::create($forms);
        return redirect('saranas');
      }
         public function edit($id)
    {
    	$jenis = Lingkups::where('del','=',0)->lists('name','id');
    	$jberita =Saranas::find($id);
    	return view('saranas.edit',compact('jberita','jenis'));
    }
      public function update(Request $request, $id)
    {
        //

         \Session::flash('alert', 'alert-success');
            \Session::flash('message', 'Data Telah Diganti');
      $usUpdate=Request::all();
         $user=Saranas::find($id);
          if(Request::hasFile('foto1')) {

                                  $file = Input::file('foto1');
                                    $usUpdate['foto'] = $this->__GenerateRandomName()."-".$file->getClientOriginalName();  
                                    $file->move("asset/sarana",$usUpdate['foto']);

                            }
            //                    var_dump($usUpdate);
           // exit();
   $user->update($usUpdate);
   return redirect('saranas');
    }
      public function destroy($id)
    {
    	   DB::table('saranas')
            ->where('id','=', $id)
            ->update(['del' => 1 ]);
            return redirect('saranas');
    }
}
