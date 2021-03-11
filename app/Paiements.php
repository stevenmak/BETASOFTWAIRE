<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiements extends Model
{
    //
    protected $fillable = [
        'reference','libelle','description','datepaiement','montant','termespaiement','projet_id','users_id',
     ];

}
