@extends('layouts.app')

@section('title', 'AfficherContactClient')
@section('module')
    GESTION DES CONTACTS CLIENTS
@endsection
@section('description')
    Module de Gestion des contacts clients
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Afficher les Contacts Clients</strong>
            </div>
            <div class="card card-body bg-skyblue">
            <div class="row row-sm">

                    <div class="form-group col-6">

                        <h4>{{ $contacts->prenomContact }} {{ $contacts->nomContact }}</h4>
                    </div>
                    <div class="form-group col-6">

                    </div>
                    <div class="form-group col-6">
                        <label>Code: </label>
                        {{ $contacts->codeContact }}
                    </div>
                    <div class="form-group col-6">
                        <label>Genre: </label>
                        {{ $contacts->genreContact }}
                    </div>
                    
                    <div class="form-group col-6">
                        <label>Adresse: </label>
                        {{ $contacts->adresse }}
                    </div>
                    <div class="form-group col-6">
                        <label>Ville: </label>
                        {{ $contacts->ville }}
                    </div>
                    <div class="form-group col-6">
                        <label>Province: </label>
                        {{ $contacts->province }}
                    </div>
                    <div class="form-group col-6">
                        <label>Pays: </label>
                        {{ $contacts->pays }}
                    </div>
                    
                    <div class="form-group col-6">
                        <label>Titre: </label>
                        {{ $contacts->titreContact }}
                    </div>

                    <div class="form-group col-6">
                        <label>Téléphone: </label>
                        {{ $contacts->telephone }}
                    </div>
                    <div class="form-group col-6">
                        <label>Mobile: </label>
                        {{ $contacts->mobile }}
                    </div>
                    <div class="form-group col-6">
                        <label>Courriel: </label>
                        {{ $contacts->courriel }}
                    </div>
                    <div class="form-group col-6">
                        <label>Profession: </label>
                        {{ $contacts->professionContact }}
                    </div>
                    <div class="form-group col-6">
                        <label>Domaine d'activité: </label>
                        {{ $contacts->domaineActivite }}
                    </div>
                    <div class="form-group col-6">
                        <label>Contact du Client: </label>
                        {{($client=App\Clients::select('prenomClient')->where('id',$contacts->client_id)->value('prenomClient')) }}
                    </div>      

            </div>
        </div>
@endsection

