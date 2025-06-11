<?php

namespace App\Http\Controllers;

use Request;
use Requestone;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Users;
use App\Links;
use DB;

use Validator;
use Input;
use Excel;

class Link_datasController extends Controller
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
    	$data = Links::where('del','=',0)->get();
    	 // var_dump($data);
      //  exit();
    	return view('links.index',compact('data'));
    }
      public function create()
    {
    	return view('links.create');
    }
       public function store(Request $request)
    {
       $forms=Request::all();
        if(Request::hasFile('foto')) {
                                  $file = Input::file('foto');
                                    $forms['foto'] = "galleri-".$this->__GenerateRandomName()."-".$file->getClientOriginalName();  
                                    $file->move("asset/aplikasi",$forms['foto']);

                            }
       Links::create($forms);
        return redirect('link_data');
       // var_dump($forms);
       // exit();

      }

         public function edit($id)
    {
    	$jb =Links::find($id);
    	return view('links.edit',compact('jb'));
    }

      public function update(Request $request, $id)
    {
        //

         \Session::flash('alert', 'alert-success');
            \Session::flash('message', 'Data Telah Diganti');
      $usUpdate=Request::all();
         $user=Links::find($id);
   $user->update($usUpdate);
   return redirect('link_data');
    }

     public function destroy($id)
    {
    	   DB::table('links')
            ->where('id','=', $id)
            ->update(['del' => 1 ]);
            return redirect('link_data');
    }
}
