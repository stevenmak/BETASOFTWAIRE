@extends('layouts.app')
@section('title', 'Rapport du jours')

@section('content')
<div class="row">
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
    <div class="flex"></div>
    <div class="col-4 text-right">
        <div class="text-sm text-fade"><h4>RAPPORT DE CAISSE</h4></div>
        <div class="text-sm text-fade"><h5>Semaine du: {{ Carbon::now()->startOfWeek()->format('d') }} au {{ Carbon::now()->endOfWeek(Carbon::SATURDAY)->format('d-m-Y') }}</h5></div>
    </div>
</div>
<div class="padding">
    <div class="col-12">
        <h2 class="text-center">RAPPORT DES PAIEMENTS DE LA SEMAINE</h2>
    </div>
</div>
<div class="row py-3">
    <table class="table table-theme v-middle table-hover">
        <thead class="text-muted">
            <tr>
                <th>#</th>
                <th>Date Piement</th>
                <th>Nom Client</th>
                <th><span class="d-none d-sm-block">Pour le Projet</span></th>
                <th><span class="d-none d-sm-block">Libelle</span></th>
                <th><span class="d-none d-sm-block">Montant</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach($entree=DB::table('paiements')->whereBetween('datepaiement',[Carbon::now()
            ->startOfWeek(Carbon::MONDAY),Carbon::now()->endOfWeek(Carbon::SATURDAY)])
            ->get() as $key => $value)
                <tr class=" v-middle" data-id="2">
                    <td style="min-width:30px;text-align:center">
                        <small class="text-muted">{{ ++$key }}</small>
                    </td>
                    <td class="no-wrap">
                        <div class="item-date text-muted text-sm d-none d-md-block">{{ $value->datepaiement }}</div>
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
                        <div class="item-date text-muted text-sm d-none d-md-block">{{ $value->libelle }} $</div>
                    </td>
                    <td class="no-wrap">
                        <div class="item-date text-muted text-sm d-none d-md-block">{{ $value->montant }} $</div>
                    </td>

                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="no-wrap">
                    <div class="text-right">Total de la semaine: {{ $entree=DB::table('paiements')->whereBetween('datepaiement',[Carbon::now()
                        ->startOfWeek(Carbon::MONDAY),Carbon::now()->endOfWeek(Carbon::SATURDAY)])
                        ->get(['montant'])->sum('montant')
                    }} $</div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="row py-3">
    <div class="col-md-4 py-2">
        <div class="">VISA DU RESPONSABLE</div>
    </div>
    <div class="col-md-4 py-2">
        <div class="text-muted text-center">Imprimé le</div>
        <div class="text-center">{{ Carbon::today()->format('d-m-Y') }}</div>
    </div>
    <div class="col-md-4 py-2">
        <div class="text-muted text-right">Imprimé par:</div>
        <div class="text-right">{{ Auth::user()->name }} </div>
    </div>
</div>
<div class="row py-3">
    <div class="flex"></div>
    <a href="#" class="btn btn-sm btn-primary d-print-none" onClick="window.print();">IMPRIMER RAPPORT</a>
</div>
@endsection
