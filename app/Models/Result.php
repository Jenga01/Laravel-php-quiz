<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model

{

    public function results(){
        return $this->hasMany('tests');
// You are missing the return above.
    }

    protected $table = 'results';

    const UPDATED_AT = null;

    const CREATED_AT = null;


}
