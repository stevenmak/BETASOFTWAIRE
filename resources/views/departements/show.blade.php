@extends('layouts.app')

@section('title', 'AfficherDepartement')
@section('module')
    GESTION DES DEPARTEMENTS
@endsection
@section('description')
    Module de Gestion des departements
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Afficher les départements</strong>
            </div>
            <div class="card-body">

                <div class="row row-sm">
                    
                <h4>{{ $departements->designation }}</h4>
                    <div class="form-group col-6">
                    </div>
                    <div class="form-group col-6">
                        <label>Nombre des agents: </label>
                        {{ $departements->nbreAgent }}
                    </div>
              <div>      
            <label>Etape créé par: </label>
            <em> 
                {{ $agent=App\Agents::select('prenom')->where('id',$departements->agent_id)->value('prenom') }} {{ $agent=App\Agents::select('nom')->where('id',$departements->agent_id)->value('nom') }}
            </em>
    </div>
@endsection
