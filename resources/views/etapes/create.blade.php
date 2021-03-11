@extends('layouts.app')

@section('title', 'CreerEtapes')
@section('module')
    GESTION DES ETAPES
@endsection
@section('description')
    Module de Gestion des étapes du projet
@endsection
@section('content')
<div class="title">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Ajouter une étape</strong>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex">
                        <strong>Whoops!</strong>Veillez verifié les données saisies<br><br>
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
                    {!! Form::open(array('route' => 'etapes.store','method'=>'POST')) !!}
                    <div class="card">
                        <div class="card-header">
                            <strong>Etape projet</strong>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Tous les champs sont obligatoires.</p>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 ">
                                        <label>Désignation</label>
                                        <input type="text" class="form-control" placeholder="Entrer la désignation" name="nomEtape" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Séléctionner le Projet</label>
                                        {!! Form::select('projet_id',App\Projets::pluck('nomprojet', 'id'), null, array('placeholder' => '','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Date du début</label>
                                        <input id="event-start-date" type="date" class="form-control" placeholder="Date début" name="debutEtape">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Date de fin</label>
                                        <input id="event-start-date" type="date" class="form-control" placeholder="Date fin" name="debutFin">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Depense estimer</label>
                                        {!! Form::text('depenseEstimer', null, array('placeholder' => 'Depense estimer!','class' => 'form-control','step' => '0.00')) !!}
                                    </div>
                                    <div class="form-group col-sm-6 ">
                                        <label>Temps prévu pour l'étape</label>
                                        <input type="text" class="form-control" placeholder="Entrer le temps prevu" name="tempsprevu" required>
                                    </div>
                                    <div class="form-group col-sm-6 ">
                                        <label>Avancement étape</label>
                                        <input type="text" class="form-control" placeholder="Entrer avancement" name="avancement" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Déscription étape</label>
                                        <textarea id="event-desc" class="form-control" rows="3" name="description" placeholder="Entrer la Déscription du projet" required></textarea>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Etat étape</label>
                                        <select class="form-control" name="etatEtape">
                                            <option value=""></option>
                                            <option value="A faire">A débuter</option>
                                            <option value="En cours">En cours</option>
                                            <option value="Terminer">Terminée</option>
                                            <option value="En pause">En pause</option>
                                            <option value="En pause">Annulée</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Etape prérequis</label>
                                        <input type="text" class="form-control" placeholder="Entrer étape prérequis" name="etapeprerequise" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label></label>
                                        <input type="hidden" class="form-control"  name="users_id" required value="{{ auth()->user()->id }}">
                                    </div>
                                    <div class="text-right pt-2 col-sm-6">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
