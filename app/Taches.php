<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taches extends Model
{
    //
    protected $fillable = [
        'designation', 'description','dateDebut','dateFin','depenseEstimerTache','priorite','avancement','etat','etape_id','users_id','service_id',
    ];
}
