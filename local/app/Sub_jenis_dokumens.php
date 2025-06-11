<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_jenis_dokumens extends Model
{
    //
     protected $fillable =['name','del','jenis_dokuen_id'];
     
       public function jenis_dokumen_data()
    {
    return $this->belongsTo('App\Jenis_dokumens','jenis_dokumen_id','id');
    
    }
}
