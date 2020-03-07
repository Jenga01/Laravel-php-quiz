<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Question;

class Answer extends Model
{
    protected $table = 'answers';

    const UPDATED_AT = null;

    const CREATED_AT = null;


    public function question() {
        return $this->hasMany(Answer::class, 'question_id');
    }




}
