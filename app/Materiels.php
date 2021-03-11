<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiels extends Model
{
    //
    protected $fillable = [
        'codeMateriaux', 'designation', 'prix','type','users_id'
    ];

}
