<?php

namespace App\Http\Controllers;

use Request;
use Requestone;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Users;
use App\Jenis_dokumens;
use DB;

use Validator;
use Input;
use Excel;

class Jenis_dokumensController extends Controller
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
    	$data = Jenis_dokumens::where('del','=',0)->get();
    	 // var_dump($data);
      //  exit();
    	return view('jenis_dokumens.index',compact('data'));
    }
      public function create()
    {
    	return view('jenis_dokumens.create');
    }
       public function store(Request $request)
    {
       $forms=Request::all();
       Jenis_dokumens::create($forms);
        return redirect('jenis_dokumens');
       // var_dump($forms);
       // exit();

      }

         public function edit($id)
    {
    	$jd =Jenis_dokumens::find($id);
    	return view('jenis_dokumens.edit',compact('jd'));
    }

      public function update(Request $request, $id)
    {
        //

         \Session::flash('alert', 'alert-success');
            \Session::flash('message', 'Data Telah Diganti');
      $usUpdate=Request::all();
         $user=Jenis_dokumens::find($id);
   $user->update($usUpdate);
   return redirect('jenis_dokumens');
    }

     public function destroy($id)
    {
    	   DB::table('jenis_dokumens')
            ->where('id','=', $id)
            ->update(['del' => 1 ]);
            return redirect('jenis_dokumens');
    }
}
