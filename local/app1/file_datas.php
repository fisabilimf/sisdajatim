<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file_datas extends Model
{
    //
    protected $fillable = ['name','parent_id','del','tipe','file'];
}
