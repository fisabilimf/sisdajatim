<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saranas extends Model
{
    //
    protected $fillable =['name','deskripsi','long','lat','lingkup_id','alamat','pemilik','del','foto'];
       public function lingkup_data()
    {
    return $this->belongsTo('App\Lingkups','lingkup_id','id');
    
    }
}
