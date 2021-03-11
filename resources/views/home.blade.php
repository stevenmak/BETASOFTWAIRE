@extends('layouts.app')
@section('title', 'CreerUtilisateurs')
@section('module')
    TABLEAU DE BORD
@endsection
@section('description')
    Bienvenue Mr (Mme)  <span>{{ Auth::user()->name }}</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4 d-flex">
        <div class="card flex">
            <div class="card-body">
                <div class="d-flex align-items-center text-hover-success">
                    <div class="avatar w-56 m-2 no-shadow gd-success">
                        <i data-feather="trending-up"></i>
                    </div>
                    <div class="px-4 flex">
                        <div>RAPPORT JOURNALIER</div>
                        <div class="text-primary mt-2">
                            Entré(es) :  {{ $entree=DB::table('paiements')->whereDate('datepaiement','=',Carbon\Carbon::today())->get(['montant'])->sum('montant')
                            }} $
                        </div>
                        <div class="text-danger mt-2">
                            Sortie(s) :   {{ $sortie=DB::table('depenses')->whereDate('datedepense','=',Carbon\Carbon::today())->get(['montant'])->sum('montant')
                        }} $
                        </div>
                    </div>
                    <div class="item-action dropdown">
                        <a href="#" data-toggle="dropdown" class="text-muted">
                            <i data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a class="dropdown-item" href="{{ route('dailyreportentree') }}">
                                <i data-feather="printer"></i>
                                Rapport Entrée
                            </a>
                            <a class="dropdown-item" href="">
                                <i data-feather="printer"></i>
                                Rapport Sortie
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item">
                                <i data-feather="printer"></i>
                                Rapport Global
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 d-flex">
        <div class="card flex">
            <div class="card-body">
                <div class="d-flex align-items-center text-hover-success">
                    <div class="avatar w-56 m-2 no-shadow gd-primary">
                        <i data-feather="trending-up"></i>
                    </div>
                    <div class="px-4 flex">
                        <div>RAPPORT DE LA SEMAINE</div>
                        <div class="text-success mt-2">
                            Entré(es) :  {{ $entree=DB::table('paiements')->whereBetween('datepaiement',[Carbon::now()
                            ->startOfWeek(Carbon::MONDAY),Carbon::now()->endOfWeek(Carbon::SATURDAY)])
                            ->get(['montant'])->sum('montant')
                        }} $

                        </div>
                        <div class="text-danger mt-2">
                            Sortie(s) :   {{ $sortie=DB::table('depenses')->whereBetween('datedepense',[Carbon::now()
                            ->startOfWeek(Carbon::MONDAY),Carbon::now()->endOfWeek(Carbon::SATURDAY)])
                            ->get(['montant'])->sum('montant')
                        }} $
                        </div>
                    </div>
                    <div class="item-action dropdown">
                        <a href="#" data-toggle="dropdown" class="text-muted">
                            <i data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a class="dropdown-item" href="{{ route('weeklyreportentree') }}">
                                <i data-feather="printer"></i>
                                Rapport Entrée
                            </a>
                            <a class="dropdown-item" href="">
                                <i data-feather="printer"></i>
                                Rapport Sortie
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item">
                                <i data-feather="printer"></i>
                                Rapport Global
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 d-flex">
        <div class="card flex">
            <div class="card-body">
                <div class="d-flex align-items-center text-hover-success">
                    <div class="avatar w-56 m-2 no-shadow gd-warning">
                        <i data-feather="trending-up"></i>
                    </div>
                    <div class="px-4 flex">
                        <div>RAPPORT MENSUEL</div>
                        <div class="text-success mt-2">
                            Entré(es) :  {{ $entree=DB::table('paiements')->whereMonth('datepaiement','=',Carbon\Carbon::now()->month)
                            ->get(['montant'])->sum('montant')
                        }} $
                        </div>
                        <div class="text-danger mt-2">
                            Sortie(s) :   {{ $sortie=DB::table('depenses')->whereMonth('datedepense','=',Carbon\Carbon::now()->month)->get(['montant'])->sum('montant')
                        }} $
                        </div>
                    </div>
                    <div class="item-action dropdown">
                        <a href="#" data-toggle="dropdown" class="text-muted">
                            <i data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a class="dropdown-item" href="{{ route('monthlyreportentree') }}">
                                <i data-feather="printer"></i>
                                Rapport entrée
                            </a>
                            <a class="dropdown-item" href="">
                                <i data-feather="printer"></i>
                                Rapport Sortie
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item">
                                <i data-feather="printer"></i>
                                Rapport Global
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="b-b">
            <div class="nav-active-border b-success px-3">
                <ul class="nav" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="paiement-tab" data-toggle="tab" href="#paiement" role="tab" aria-controls="paiement" aria-selected="true">PAIEMENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="depense-tab" data-toggle="tab" href="#depense" role="tab" aria-controls="depense" aria-selected="false">DEPENSES</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content p-3">
            <div class="tab-pane fade show active" id="paiement" role="tabpanel" aria-labelledby="paiement-tab">
                <div>LES ENTREES DU JOUR</div>
                <table class="table table-theme v-middle table-hover">
                    <thead class="text-muted">
                        <tr>
                            <th>#</th>
                            <th>Nom Client</th>
                            <th><span class="d-none d-sm-block">Pour le Projet</span></th>
                            <th><span class="d-none d-sm-block">Montant</span></th>
                            <th><span class="d-none d-sm-block">Receptionné par</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $paiement = App\paiements::whereDate('datepaiement','=',Carbon\Carbon::today())->get() as $key => $value)
                            <tr class=" v-middle" data-id="2">
                                <td style="min-width:30px;text-align:center">
                                    <small class="text-muted">{{ ++$key }}</small>
                                </td>
                                <td class="flex">
                                    <a href="{{ route('paiements.index') }}" class="item-title text-color h-1x"> {{$projet = DB::table('clients')->join('projets','projets.client_id', '=', 'clients.id')
                                        ->join('paiements','projets.id', 'paiements.projet_id')
                                        ->where('paiements.projet_id','=',$value->projet_id)->value('prenomClient')}}
                                        {{$projet = DB::table('clients')->join('projets','projets.client_id', '=', 'clients.id')
                                        ->join('paiements','projets.id', 'paiements.projet_id')
                                        ->where('paiements.projet_id','=',$value->projet_id)->value('nomClient')}}
                                    </a>
                                </td>
                                <td>
                                    <span class="item-amount d-none d-sm-block text-sm ">{{ $projet=App\Projets::select('nomProjet')->where('id',$value->projet_id)->value('nomProjet') }}</span>
                                </td>
                                <td class="no-wrap">
                                    <div class="item-date text-muted text-sm d-none d-md-block">{{ $value->montant }} $</div>
                                </td>
                                <td class="no-wrap">
                                    <div class="item-date text-muted text-sm d-none d-md-block">{{ $percupar=App\User::select('name')->where('id',$value->users_id)->value('name') }}</div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="depense" role="tabpanel" aria-labelledby="depense-tab">
                <div>DEPENSES DU JOUR</div>
                <table class="table table-theme v-middle table-hover">
                    <thead class="text-muted">
                        <tr>
                            <th>#</th>
                            <th>Nom Pojet (Etape du projet)</th>
                            <th><span class="d-none d-sm-block">Tache concernée</span></th>
                            <th><span class="d-none d-sm-block">Service Demandeur</span></th>
                            <th><span class="d-none d-sm-block">Montant</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $depenses = App\Depenses::whereDate('datedepense','=',Carbon\Carbon::today())->get() as $key => $value)
                            <tr class=" v-middle" data-id="2">
                                <td style="min-width:30px;text-align:center">
                                    <small class="text-muted">{{ ++$key }}</small>
                                </td>
                                <td class="flex">
                                    <a href="{{ route('depenses.index') }}" class="item-title text-color h-1x">{{ $projet=App\Projets::select('nomProjet')->where('id',$value->projet_id)->value('nomProjet') }}</a>
                                    <a href="#" class="item-company text-muted h-1x">{{ $etape=DB::table('etapes')
                                    ->where('etapes.id','=',$value->etape_id)->value('nomEtape')
                                    }}
                                    </a>
                                </td>
                                <td>
                                    <span class="item-amount d-none d-sm-block text-sm ">{{ $tache=DB::table('taches')
                                        ->where('taches.id','=',$value->tache_id)->value('designation')
                                        }}</span>
                                </td>
                                <td class="no-wrap">
                                    <div class="item-date text-muted text-sm d-none d-md-block">{{ $service=DB::table('services')
                                        ->where('services.id','=',$value->service_id)->value('designation')
                                        }}</div>
                                </td>
                                <td class="no-wrap">
                                    <div class="item-date text-muted text-sm d-none d-md-block">{{ $value->montant }}$</div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
