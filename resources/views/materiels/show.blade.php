@section('title', 'AfficherMateriel')
@section('module')
    GESTION DES MATERIAUX
@endsection
@section('description')
    Module de Gestion des matériels de construction
@endsection

@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Information sur le Matériel</strong>
            </div>
            <div class="card-body">

            <div class="row row-sm">
                <div class="form-group col-6">
                    <h4><label>Code matériel: </label>
                    {{ $materiel->codeMateriaux }}</h4>
                </div>
                <div class="form-group col-6">
                    <h4><label>Déscription: </label>
                    {{ $materiel->designation }}</h4>
                </div>
                <div class="form-group col-6">
                   <label> Prix en USD:</label>
                    <sup class="text-sm" style="top: -0.5em;">$</sup><span class="h1">{{ $materiel->prix }}</span>          
                </div>
                <div class="form-group col-6">
                    <label>Matériel créé ou modifié par: </label>
                    <em>
                        {{ $users=App\User::select('name')->where('id',$materiel->users_id)->value('name') }}<br />Le {{ $materiel->updated_at }}<br />    
                    </em>
                </div>
           </div> 
           </div> 
    </div>
@endsection
