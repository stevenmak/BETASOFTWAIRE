@extends('layouts.app')

@section('title', 'Showpaiements')
@section('module')
    GESTION DES PAIEMENTS
@endsection
@section('description')
    Module de Gestion des paiements
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
                    <h3 class="card-title text-center">BON D'ENTREE CAISSE N° {{ $paiements->reference }}</h3>
                    <hr>

                


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
                                        
                        <h5 class="card-text">Montant    : {{ number_format($paiements->montant,2, ',',' ') }} $</h5>
                        
                                        </td>
                                        <td class="text-right"><h5 class="card-text">POUR LE COMPTE DE :
                        {{ $prenomclient=DB::table('clients')->join('projets','clients.id','=','projets.client_id')
                        ->select('clients.prenomClient')->where('projets.id',$paiements->projet_id)->value('prenomClient') }} {{ $nomclient=DB::table('clients')->join('projets','clients.id','=','projets.client_id')
                        ->select('clients.nomClient')->where('projets.id',$paiements->projet_id)->value('nomClient') }}
                    </h5>
                <h5 class="card-text">
                    Projet : {{ $nomprojet=App\projets::select('nomProjet')->where('id',$paiements->projet_id)->value('nomProjet') }}
                </h5></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="card-title">Montant (en lettres):<em> {{ NumConvert::word($paiements->montant) }} dollars.</em></h5>
                                            <h5 class="card-text">Motif paiement : {{ $paiements->description }}</h5>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-sm text-muted">                    
                                                <h5 class="card-text">RESPONSABLE</h5>
                                            </div>
                                             <div class="text-sm text-muted">                    
                                                Noms :  
                                                @php ($idagent=DB::table('services')->select('chefservice')->value('chefservice'))
                                                {{ $prenomagent=DB::table('agents')->select('prenom')->where('agents.id',$idagent)->value('prenom')}}
                                                {{ $nomagent=DB::table('agents')->select('nom')->where('agents.id',$idagent)->value('nom')}}
                                            </div>
                                            <div class="text-sm text-muted">                    
                                                Date : {{ $paiements->datepaiement }}
                                            </div>
                                            <div class="text-sm text-muted">                    
                                                Signature : 
                                            </div>
                                        </td>
                                        <td class="text-center">                                            
                                            <div class="text-sm text-muted" border="3px solid gray">                    
                                                <h5 class="card-text"><p class="bg-light border border-secondary">CAISSE</p></h5>   


                                            </div></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-right no-border">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>



                </div>
            </div>
        </div>
    </div>
@endsection
