@extends('layouts.app')

@section('title', 'Creerprojets')
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
                <strong>Ajouter un Projet</strong>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex">
                        <strong>Whoops!</strong>Veillez verifier les données saisies<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                </div>
            @endif
            <div class="card-body">
                {!! Form::open(array('route' => 'projets.store','method'=>'POST')) !!}
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
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="BudgetProjet" step="0.00">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label></label>
                        <input type="hidden" class="form-control"  name="users_id" required value="{{ auth()->user()->id }}">
                    </div>
                    <div class="form-group col-6"></div>
                    <div class="form-group col-6">

                        <button type="submit" class="btn btn-primary">Envoyez</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
