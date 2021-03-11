<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etapes extends Model
{
    //
        //
    protected $fillable = [
        'id', 'nomEtape','projet_id','debutEtape', 'debutFin','depenseEstimer','tempsprevu',
        'avancement', 'description','etatEtape','etapeprerequise', 'users_id',
    ];
}
