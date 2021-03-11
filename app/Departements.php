<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departements extends Model
{
    //
    protected $fillable = [
        'designation', 'nbreAgent','users_id',
    ];
}
