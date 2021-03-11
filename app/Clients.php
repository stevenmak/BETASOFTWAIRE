<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
        //
    protected $fillable = [
        'codeClient', 'nom','prenomClient','nomClient','titreClient','genreClient',
        'professionClient', 'adresseClient','villeClient','provinceClient', 'paysClient','domaineActivite','termepaiement','telephone', 'mobile','courriel','siteweb','typeclient',
        'users_id',

    ];
}
