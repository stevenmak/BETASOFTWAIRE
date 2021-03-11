<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    //
    protected $fillable = [
        'designation', 'nbreAgent','chefservice','users_id','departement_id',
    ];
}
