<?php

namespace App;
use App\Flight;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    //
    protected $fillable = [
        'reference', 'descriptiondevis','datedevis','projet_id', 'client_id','service_id','tacheDevis',
        'etatdevis', 'montantdevis','modalite','users_id',

    ];

    public function lignes()
    {
        return $this->hasMany('App\Lignes');
    }

}
