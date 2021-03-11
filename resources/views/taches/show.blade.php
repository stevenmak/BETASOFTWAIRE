@extends('layouts.app')


@section('title', 'AfficherTaches')
@section('module')
    GESTION DES TACHES DU PROJET
@endsection
@section('description')
    Module de Gestion des taches du projet
@endsection
@section('content')

<div class="row">
        <div class="col-8">
            <div class="d-flex align-items-center">
                <svg width="48" height="48" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                    <g class="loading-spin" style="transform-origin: 256px 256px">
                        <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"></path>
                    </g>
                </svg>
                <strong>
                <span class="text-md mx-2">{{ $entreprise=App\entreprises::select('nom')->value('nom') }}</span>
            </div>
            <div class="text-sm">IDNAT {{ $entreprise=App\entreprises::select('idNat')->value('idNat') .'-'.'RCCM'.
            $entreprise=App\entreprises::select('RCCM')->value('RCCM') }}</div>
            <div class="text-sm">NUMERO IMPOT: {{ $entreprise=App\entreprises::select('numImpot')->value('numImpot')}}</div>
            <div class="text-sm">TELEPHONE {{ $entreprise=App\entreprises::select('telephone')->value('telephone') .'-'.
                $entreprise=App\entreprises::select('mobile')->value('mobile') }}</div>
            <span class="text-sm">EMAIL: {{ $entreprise=App\entreprises::select('courriel')->value('courriel') }}</span>
            </strong>

        </div>
        <div class="flex"></div>
        <div class="col-4 text-right">
            <div class="text-sm text-fade"><h4>IMPRIMER</h4></div>
            <div class="text-sm">Date:{{date('m-d-Y')}} </div>

        </div>
    </div>
</div>

<div class="title">
<div class="page-hero page-container " id="page-hero">
    <div class="padding d-flex">
        <div class="flex"></div>
        <div class="pull-left">
        </div>
    </div>
</div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
            <center><strong class="list-group-item active"><h3>Information sur la tache</h3></strong></center>
            </div>
            <div class="card-body">

                <div class="row row-sm">

                        <div class="form-group col-12 list-group-item">
                            <center><h4>{{ $taches->designation }}</h4></center>
                        </div>
                            <div class="form-group col-6 list-group-item">
                                <em><label>Déscription: </label>{{ $taches->description }}</em>
                            </div>
                        <div class="form-group col-6 list-group-item">
                            <label>Date du début: </label>{{ $taches->dateDebut }}
                        </div>
                        <div class="form-group col-6 list-group-item">
                            <label>Date de fin: </label>
                            {{ $taches->dateFin }}
                        </div>
                        <div class="form-group col-6 list-group-item">
                            <label>Estimation: </label>
                            {{ $taches->depenseEstimerTache }}
                        </div>
                        <div class="form-group col-6 list-group-item">
                            <label>Priorité de la tache: </label>
                            {{ $taches->priorite }}
                        </div>
                        <div class="form-group col-6 list-group-item">
                            <label>Avancement: </label>
                        {{ $taches->avancement }}
                        </div>
                        <div class="form-group col-6 list-group-item">
                            <label>Etape: </label>
                            {{ $etapes =App\Etapes::select('nomEtape')->where('id', $taches->etape_id)->value('nomEtape') }}
                        </div>


                        <div class="form-group col-6 list-group-item">
                            <label>Etat de la tache: </label>
                            {{ $taches->etat }}
                        </div>

                        <div class="text-muted text-sm text-center list-group-item">
                            <label>Etape créé par: </label>
                            <em>
                                {{ $users=App\User::select('name')->where('id',$taches->users_id)->value('name') }}
                            </em>
                    </div>
            </div>
        </div>
    </div>

    </div>
@endsection
