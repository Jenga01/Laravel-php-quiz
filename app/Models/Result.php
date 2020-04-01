<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model

{

    public function results()
    {
        return $this->hasMany('tests');

    }

    protected $table = 'results';

    const UPDATED_AT = null;

    const CREATED_AT = null;


}
