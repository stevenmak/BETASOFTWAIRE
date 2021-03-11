@extends('layouts.app')

@section('title', 'AfficherAgent')
@section('module')
    GESTION DES AGENTS
@endsection
@section('description')
    Module de Gestion des agents
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Informations personnelles</strong>
            </div>
            <div class="card-body">
                <div class="row row-sm">
                    <div class="form-group col-6">
                        <h5 class="mt-2">{{ $agents->prenom }} {{ $agents->nom }}</h5>
                    </div>
                    <div class="form-group col-6">
                    </div>
                    <div class="form-group col-6">
                        Genre:  {{ $agents->genre }}
                    </div>
                    <div class="form-group col-6">
                        <label>Niveau Etude: </label>
                        {{$agents->niveauEtude}}
                    </div>
                    <div class="form-group col-6">
                        <label>Etat Civil: </label>
                        {{ $agents->etatCivil }}
                    </div>
                    <div class="form-group col-6">
                        <label>Adresse: </label>
                        {{ $agents->adresse }}
                    </div>
                    <div class="form-group col-6">
                        <label>Téléphone: </label>
                        {{ $agents->telephone }}
                    </div>
                    <div class="form-group col-6">
                        <label>Mobile: </label>
                        {{ $agents->mobile }}
                    </div>
                    <div class="form-group col-6">
                        <label>Courriel: </label>
                        {{ $agents->courriel }}
                    </div>
                    <div class="form-group col-6">
                        <label>Ville: </label>
                        {{ $agents->ville }}
                    </div>
                    <div class="form-group col-6">
                        <label>Province: </label>
                        {{ $agents->province }}
                    </div>
                    <div class="form-group col-6">
                        <label>Pays: </label>
                        {{ $agents->pays }}
                    </div>

                </div>
                </div>

    <hr>
            <div class="card-header">
                <strong>Informations professionelles</strong>
            </div>
            <div class="card-body">
                <div class="row row-sm">
                  
                    <div class="form-group col-6">
                        <label>Titre Agent: </label>
                        {{ $agents->titreAgent }}
                    </div>
                    <div class="form-group col-6">
                        <label>Code Agent: </label>
                        {{ $agents->codeAgent }}
                    </div>
                    <div class="form-group col-6">
                        <label>Matricule Agent: </label>
                        {{ $agents->matriculeAgent }}
                    </div>
                    
                    <div class="form-group col-6">
                        <label>Profession: </label>
                        {{ $agents->profession }}
                    </div>
                    
                    <div class="form-group col-6">

                    </div>
                </div>
    

@endsection
