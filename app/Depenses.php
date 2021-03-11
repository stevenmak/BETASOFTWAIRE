<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depenses extends Model
{
    //
    protected $fillable = [
        'reference','devis_id','datedepense','projet_id','etape_id','service_id',
        'tache_id','montant','libelle','description','users_id',
    ];
}

