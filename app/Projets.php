<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projets extends Model
{
    //
    protected $fillable = [
        'codeProjet','nomProjet','client_id','contact_id','datedebut','datefin','description','methodepaiement','etatprojet','agent_id','BudgetProjet','users_id',
     ];
}
