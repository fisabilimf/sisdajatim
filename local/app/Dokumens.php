<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumens extends Model
{
    //
    protected $fillable = ['judul','file','jenis_dokumen_id','link','user_by','del','sub_jenis_dokumen_id'];

      public function jenis_dokumen_data()
    {
    return $this->belongsTo('App\Jenis_dokumens','jenis_dokumen_id','id');
    
    }
    
      public function sub_jenis_dokumen_data()
    {
    return $this->belongsTo('App\Sub_jenis_dokumens','sub_jenis_dokumen_id','id');
    
    }
}
