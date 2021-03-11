@extends('layouts.app')

@section('title', 'Editerprojets')
@section('module')
PLANIFICATION
@endsection
@section('description')
Module de planification
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>AJOUTER UN NOUVEAU PROJET</strong>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger dismiss">
                        <strong>Whoops!</strong>Veillez verifié les données saisies<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::model($projets, ['method' => 'PATCH','route' => ['projets.update', $projets->id]]) !!}
                              <div class="row row-sm">
                    <div class="form-group col-6">
                        <label>Code</label>

                        {!! Form::text('codeProjet', null, array('placeholder' => 'Code du Projet','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Nom du Projet</label>
                        {!! Form::text('nomProjet', null, array('placeholder' => 'Nom du projet','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Client</label>
                        {!! Form::select('client_id',  App\Clients::select(DB::raw("CONCAT(prenomClient,' ', nomClient) AS nomComplet, id"))->pluck('nomComplet','id'), null, array('placeholder' => '','class' => 'form-control'))  !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Contact</label>
                        {!! Form::select('contact_id',  App\Contacts::select(DB::raw("CONCAT(prenomContact,' ', nomContact) AS nomContact, id"))->pluck('nomContact','id'), null, array('placeholder' => '','class' => 'form-control'))  !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Date début</label>
                        {!! Form::date('datedebut', null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Date fin</label>
                        {!! Form::date('datefin', null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Description</label>
                        {!! Form::text('description', null, array('placeholder' => 'Description du projet','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Méthode de paiement</label>
                        <select class="form-control" name="methodepaiement">
                            <option value="Cash">Cash</option>
                            <option value="Banque">Banque</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label>Etat du Projet</label>
                        <select class="form-control" name="etatprojet">
                            <option value="A faire">A faire</option>
                            <option value="En cours">En cours</option>
                            <option value="Terminer">Terminer</option>
                            <option value="En pause">En pause</option>
                            <option value="Annuler">Annuler</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label>Chef du Projet</label>
                        {!! Form::select('agent_id',  App\Agents::select(DB::raw("CONCAT(prenom,' ', nom) AS nomAgent, id"))->pluck('nomAgent','id'), null, array('placeholder' => '','class' => 'form-control'))  !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Budget du Projet</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <div class="input-group-append">
                                {!! Form::text('BudgetProjet', null, array('placeholder' => 'Budget projet','class' => 'form-control','step' => '0.00')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label></label>
                        <input type="hidden" class="form-control"  name="users_id" required value="{{ auth()->user()->id }}">
                    </div>
                    <div class="form-group col-6"></div>
                    <div class="form-group col-6">


                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
