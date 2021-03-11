@extends('layouts.app')

@section('title', 'Affichertaux')
@section('module')
    GESTION DES TAUX D'ECHANGES
@endsection
@section('description')
    Module de Gestion des taux d'echanges
@endsection


@section('content')
<div class="title">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Afficher le  TAUX du jours</strong>
            </div>
            <div class="card-body">
            <div class="row row-sm">
                <div class="form-group col-6">
                    <h4><label>Le taux de change: </label>
                    {{ $echanges->valeurEchanges }}</h4>
                </div>
                <div class="form-group col-6">
                    <em>
                        Taux créé le {{ $echanges->created_at }}<br />
                        La dernière modification le {{ $echanges->updated_at }}<br />    
                    </em>
                </div>
           </div> 
           </div> 
    </div>
@endsection
