<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Answer extends Model
{
    protected $table = 'answers';

    const UPDATED_AT = null;

    const CREATED_AT = null;


    public function question() {
        return $this->hasMany('App\Models\Answer', 'question_id');
    }




}
