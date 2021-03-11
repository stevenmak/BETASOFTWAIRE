@extends('layouts.app')

@section('title', 'AfficherServices')
@section('module')
    GESTION DES SERVICES
@endsection
@section('description')
    Module de Gestion des services
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Afficher les services</strong>
            </div>
            <div class="card-body">
                <div class="row row-sm">

                    <h4>Service {{ $service->designation }} du département {{ $departements=App\Departements::select('designation')->value('designation') }}</h4>
                    <div class="form-group col-6">
                    </div>
                    <div class="form-group col-6">
                        <label>Nombre agents: </label>
                        {{ $service->nbreAgent }}
                    </div>
                    <div class="form-group col-6">
                        <label>Chef de service: </label>
                        {{ $agent=App\Agents::select('prenom')->where('id',$service->chefservice)->value('prenom') }} {{ $agent=App\Agents::select('nom')->where('id',$service->chefservice)->value('nom') }}
                    </div>
            </div>
        </div>
    </div>

@endsection
