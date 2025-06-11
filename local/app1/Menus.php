<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    //
   
    public function jenis_berita_id()
    {
    return $this->belongsTo('App\Jenis_beritas','from_id','id');
    
    }
     public function jenis_dokumen_id()
    {
    return $this->belongsTo('App\Jenis_dokumens','from_id','id');
    
    }
  
}
