@extends('layouts.app')

@section('title', 'AfficherDepenses')
@section('module')
    GESTION DES DEPENSES
@endsection
@section('description')
    Module de Gestion des dépenses
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="col-8">
                    <div class="d-flex align-items-center">
                        <svg width="48" height="48" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <g class="loading-spin" style="transform-origin: 256px 256px">
                                <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"></path>
                            </g>
                        </svg>
                        <span class="text-md mx-2">{{ $entreprise=App\entreprises::select('nom')->value('nom') }}</span>
                    </div>
                    <div class="text-sm">IDNAT {{ $entreprise=App\entreprises::select('idNat')->value('idNat') .'-'.'RCCM'.
                    $entreprise=App\entreprises::select('RCCM')->value('RCCM') }}</div>
                    <div class="text-sm">NUMERO IMPOT: {{ $entreprise=App\entreprises::select('numImpot')->value('numImpot')}}</div>
                    <div class="text-sm">TELEPHONE {{ $entreprise=App\entreprises::select('telephone')->value('telephone') .'-'.
                        $entreprise=App\entreprises::select('mobile')->value('mobile') }}</div>
                    <span class="text-sm">EMAIL: {{ $entreprise=App\entreprises::select('courriel')->value('courriel') }}</span>
                </div>
            <div class="card-body">
                <div class="">
                    <h3 class="card-title text-center">BON DE SORTIE CAISSE N°: {{ $depenses->reference }}</h3>
                    <hr>
                    
<!--********************************************************************************************************************************-->
        <table class="table table-theme table-rows v-middle">
                                <thead>
                                    <tr>
                                        <th class="text-muted"></th>
                                        <th class="text-muted text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>              
                                        
                        <h5 class="card-text">Date sortie: {{ $depenses->datedepense }}</h5>
                        
                                        </td>
                                        <td class="text-right"><h5 class="card-text">Pour le compte du projet: {{ $projet=App\Projets::select('nomProjet')->where('id',$depenses->projet_id)->value('nomProjet') }}</h5>
                                        <div class="text-sm text-muted">
                <h5 class="card-text">
                    <h5 class="card-text">Pour l'étape:    {{ $etape=App\Etapes::select('nomEtape')->where('id',$depenses->etape_id)->value('nomEtape') }}</h5>
                </h5>
                    
                </div>
                                    </tr>
                                        <tr>
                                        <td>
                                            <div class="text-sm text-muted">
                                                <h5 class="card-title">Montant sortie  : {{ number_format($depenses->montant,2, ',', ' ')}} $</h5></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-sm text-muted"><h5 class="card-title">Montant (en lettres):<em> {{ NumConvert::word($depenses->montant) }} dollars.</em></h5></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-sm text-muted">
                                                <h5 class="card-text">Motif paiement:   {{ $depenses->libelle }}</h5>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-right no-border">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="row py-3">
                        <div class="col-md-6 py-2">
                            <div class="text-muted">Pour Acquit (Chef Service concerné):</div>
                            <div>{{ $nomchef=DB::table('agents')->join('services','agents.id','=','services.chefservice')
                                ->select('agents.prenom')->where('services.id',$depenses->service_id)->value('prenom') }} {{ $nomchef=DB::table('agents')->join('services','agents.id','=','services.chefservice')
                                ->select('agents.nom')->where('services.id',$depenses->service_id)->value('nom') }}</div>
                        </div>
                        <div class="col-md-6 py-2">
                            <div class="text-muted">Caisse</div>
                            <div class="text-left">{{ $service=App\User::select('name')->where('id',$depenses->users_id)->value('name') }}</div>
                        </div>

<!--********************************************************************************************************************************-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
