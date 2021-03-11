@extends('layouts.app')

@section('title', 'Showprojets')
@section('module')
PLANIFICATION
@endsection
@section('description')
Module de planification
@endsection
@section('content')
<?php
    $totald=0.0;
    $totalp=0.0;
    $montantdtampo=0.0;
    $montantptampo=0.0;
    $soldebudget=0.0;
    $soldepaiement=0.0;
    $i=0;
    ?>
    <div class="col-lg-12 list-group-item">
        <div class="card">
            <div class="card-header">
                <center><strong class="list-group-item active"><h4>Information sur le Projet</h4></strong></center>
            </div>
            <div class="card-body">
<div class="row row-sm" style="padding-top:10px">
                        <div style="margin-top: 20px;"></div>

                    <div class="form-group col-12">
                        <center>
                            <h5>
                                {{ $projets->nomProjet }} Pour Mr,(Mme) {{ $client =App\Clients::select('prenomClient')->where('id', $projets->client_id)->value('prenomClient') }} {{ $client =App\Clients::select('nomClient')->where('id', $projets->client_id)->value('nomClient') }}
                            </h5>
                        </center>
                    </div>

                    <div class="form-group col-6 list-group-item">
                        <label>Contact: </label>
                        {{ $contact=App\Contacts::select('prenomContact')->where('id',$projets->contact_id)->value('prenomContact') }}
                    </div>
                    <div class="form-group col-6 list-group-item">
                        <label>Code Projet: </label>
                        {{ $projets->codeProjet }}
                    </div>
                    <div class="form-group col-6 list-group-item">
                        <label>Déscription: </label>
                        {{ $projets->nomProjet }}
                    </div>
                    <div class="form-group col-6 list-group-item">
                        <label>Budget du projet: </label>
                        <strong><mark>{{ number_format($projets->BudgetProjet,2, ',', ' ') }} USD</mark></strong>
                    </div>
                    <div class="form-group col-6 list-group-item">
                        <label>Paiements déjà effectués: </label>
                @foreach ($paiement=App\Paiements::select('montant')->where('projet_id',$projets->id)->get() as $key => $paiement)
                    @php ($montantptampo=$totalp=$totalp+$paiement->montant)
                @endforeach
                <strong><mark>{{ number_format($montantptampo,2, ',',' ')}} USD</mark></strong>
                </div>
                    <div class="form-group col-6 list-group-item">
                        <label>Solde du Budget: </label>
                        @php($soldebudget=number_format(($projets->BudgetProjet)-((double)$montantptampo),2, ',', ' '))
                        <strong><mark>{{ $soldebudget }} USD</mark></strong>
                    </div>
                    <div class="form-group col-6 list-group-item">
                        <label>Dépenses effectués: </label>
                @foreach ($depense=App\Depenses::select('montant')->where('projet_id',$projets->id)->get() as $key => $depense)
                    @php ( $montantdtampo=$totald=$totald+$depense->montant)
                @endforeach
                <strong><mark>{{number_format($montantdtampo,2, ',',' ')}} USD</mark></strong>
                    </div>

                    <div class="form-group col-6 list-group-item">
                        <label>Etat du projet: </label>
                        {{ $projets->etatprojet}}
                    </div>
                                        <div class="form-group col-6 list-group-item">
                        <label>Solde des Paiements après dépenses: </label>
                        @php ($soldepaiement=(double)$montantptampo-(double)$montantdtampo)
                        <strong><mark>{{ number_format($soldepaiement,2, ',',' ') }} USD</mark></strong>
                    </div>

                    <div class="form-group col-6 list-group-item">
                        <label>Date du lancement: </label>
                        {{ $projets->datedebut }}
                    </div>

                    <div class="form-group col-6 list-group-item">
                        <label>Date fin: </label>
                        {{ $projets->datefin }}
                    </div>
                <div class="table-responsive" data-show-columns="true">
                    <table id="table" class="table table-theme v-middle" data-plugin="bootstrapTable" data-toolbar="#toolbar" data-search="true" data-search-align="left" data-show-export="true" data-show-columns="true" data-detail-view="false" data-mobile-responsive="true" data-pagination="true" data-page-list="[10, 25, 50, 100, ALL]">
                    <thead>
                            <tr>
                                <th data-sortable="true" data-field="ID">ID</th>
                                <th data-sortable="true" data-field="nomEtape">Etape</th>
                                <th data-sortable="true" data-field="avancement">Avancement</th>
                                <th></th>
                            </tr>
                    </thead>
                <tbody>
                    
                @foreach ($etape=App\Etapes::select('nomEtape','description','avancement','id')->where('projet_id',$projets->id)->get() as $key => $etape)
                @php($id=$etape->id)
                <tr class=" " data-id="20">
                    <td style="min-width:30px;text-align:center">
                        <small class="text-muted">{{ ++$i }}</small>
                    </td>
                <td class="flex">
                    <a class="item-title text-colo" href="{{ route('etapes.show',$etape->id) }}">
                        {{$etape->nomEtape}}
                    </a>
                    <div class="item-except text-muted text-sm h-1x">
                        {{$etape->description}}
                    </div>
                </td>

                <td>
                    <span class="item-amount d-none d-sm-block text-sm ">
                            {{$etape->avancement}}
                    </span>
                </td>
                </tr>
                
                @endforeach
            
             </tbody>
            </table>
                    <div class="form-group col-12">
                        <label>Liste des taches: </label>

                        {{$taches=App\Taches::join('etapes','taches.etape_id', '=','etapes.id')
                        ->select('taches.designation')
                        ->get()}}

                    </div>
                    <div class="form-group col-6 list-group-item">
                        <label>Projet créé par: </label>
                            <em>
                                {{ $agent=App\Agents::select('prenom')->where('id',$projets->agent_id)->value('prenom') }} {{ $agent=App\Agents::select('nom')->where('id',$projets->agent_id)->value('nom') }}
                            </em>
                    </div>
            </div>
            </div>
        </div>
    </div>
    </div>

@endsection
