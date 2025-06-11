<?php

namespace App\Http\Controllers;

use Request;
use Requestone;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Users;
use App\Lingkups;
use DB;

use Validator;
use Input;
use Excel;

class LingkupsController extends Controller
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
      $data = Lingkups::where('del','=',0)->get();
       // var_dump($data);
      //  exit();
      return view('lingkups.index',compact('data'));
    }
      public function create()
    {
      return view('lingkups.create');
    }
       public function store(Request $request)
    {
       $forms=Request::all();
       Lingkups::create($forms);
        return redirect('lingkups');
       // var_dump($forms);
       // exit();

      }

         public function edit($id)
    {
      $jb =Lingkups::find($id);
      return view('lingkups.edit',compact('jb'));
    }

      public function update(Request $request, $id)
    {
        //

         \Session::flash('alert', 'alert-success');
            \Session::flash('message', 'Data Telah Diganti');
      $usUpdate=Request::all();
         $user=Lingkups::find($id);
   $user->update($usUpdate);
   return redirect('lingkups');
    }

     public function destroy($id)
    {
         DB::table('lingkups')
            ->where('id','=', $id)
            ->update(['del' => 1 ]);
            return redirect('lingkups');
    }
}
