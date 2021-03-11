@extends('layouts.app')

@section('title', 'AfficherEntreprise')
@section('module')
    DONNEES DE L'ENTREPRISE
@endsection
@section('description')
    Affichages des Informations sur l'entreprise
@endsection
@section('content')
<div class="title">
<div class="page-hero page-container " id="page-hero">
    <div class="padding d-flex">
        <div class="page-title">
            <h2 class="text-md text-highlight">GESTION DE L'ENTREPRISE</h2>
        </div>
        <div class="flex"></div>
        <div class="pull-left">
        </div>
    </div>
</div>
</div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Info sur l'entreprise</strong>
            </div>
            <div class="card-body">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('entreprises.index') }}"> Retour</a>
                </div>
                <div>
                    <h5 class="card-title">Nom {{ $entreprise->nom }}</h5>
                    <h4 class="card-text">idNat:  {{ $entreprise->idNat }}</h4>
                    <h4 class="card-text">RCCM: {{ $entreprise->RCCM }}</h4>
                    <h4 class="card-text">Numéro d'impo:  {{ $entreprise->numImpot }}</h4>
                    <h4 class="card-text">Téléphone: {{ $entreprise->telephone }}</h4>
                    <h4 class="card-text">Mobile:  {{ $entreprise->mobile }}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
