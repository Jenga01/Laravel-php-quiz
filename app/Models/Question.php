<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    protected $table = 'questions';


   public function answers(){

       return $this->hasMany('App\Models\Answer');
   }

}
