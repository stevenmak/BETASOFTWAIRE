<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    //
    protected $fillable = [
        'codeContact', 'prenomContact','nomContact','titreContact','genreContact','professionContact',
        'telephone','mobile','courriel','adresse', 'ville','province',
        'pays','domaineActivite','client_id','users_id',

    ];
}
