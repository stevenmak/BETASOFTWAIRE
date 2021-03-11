<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{
    //
    protected $fillable = [
        'prenom', 'nom','codeAgent','matriculeAgent', 'genre','telephone',
        'mobile', 'courriel','titreAgent','profession', 'niveauEtude','etatCivil',
        'adresse','ville', 'province','pays',

    ];
}
