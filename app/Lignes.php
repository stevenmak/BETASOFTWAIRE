<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lignes extends Model
{
    protected $fillable = [
        'quantite', 'prix','devis_id','materiaux_id',
    ];

    public function devis()
    {
        return $this->belongsTo('App\Devis');
    }
}
