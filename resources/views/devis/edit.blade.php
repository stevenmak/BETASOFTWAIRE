@extends('layouts.app')
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
            <div class="text-sm text-fade"><h4>DEVIS</h4></div>
            <div class="text-highlight">REFERENCE:  {{ $devis->reference }}</div>
            <div class="text-sm">Date: {{ $devis->datedevis }}</div>
            <div class="text-sm">Description: {{ $devis->descriptiondevis }}</div>
            <td class="flex"><h6>Maitre d'Ouvrage: {{ $client=App\Clients::select('nomClient')->where('id',$devis->client_id)->value('nomClient') }}</h6></td>

        </div>
    </div>
    <div class="padding">
        <div class="col-12">
            <h2 class="text-align-center">PROJET:
                {{ $projet=App\Projets::select('nomProjet')->where('id',$devis->projet_id)->value('nomProjet') }} </h2>
        </div>
    </div>
    <table class="table table-theme table-rows v-middle">
        <thead>
            <tr>
                <th class="text-muted">Matériaux/Services</th>
                <th class="text-muted">Quantite</th>
                <th class="text-muted">Prix Unitaire</th>
                <th class="text-muted">Montant total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lignes=App\Lignes::select('*')->where('devis_id',$devis->id)->get() as $key => $ligne)
                <tr>
                    <td> {{ $designation=App\Materiels::select('designation')->where('id',$ligne->materiaux_id)->value('designation') }}</td>
                    <td><input type="number" name='quantite[]'
                        value='{{ $ligne->quantite }}' class="form-control qty"
                        step="0" min="0"/></td>
                    <td><input type="number" name='prix[]'
                        value='{{ $ligne->prix }}' class="form-control price"
                        step="0.00" min="0"/></td>
                    <td><input type="number" name='total[]' value='{{ $ligne->quantite*$ligne->prix }}' class="form-control total" readonly/>
                        </td>
                    <td>   {!! Form::open(['method' => 'DELETE','route' => ['devis.destroy', $ligne->id]]) !!}
                        {!! Form::submit('SUPPRIMER', ['class' => 'btn btn-white']) !!}
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <div class="col-md-12">
          <table class="table table-bordered table-hover" id="tab_logic_total">
            <tbody>
              <tr>
                <th class="text-center"> <button id="add_row" class="btn btn-primary pull-left" type="button">Ajouter Ligne</button></th>
                <td class="text-center"><input type="number" name='devis[montantdevis]' value='{{ $devis->montantdevis }}' class="form-control" id="sub_total" readonly/></td>
              </tr>
            </tbody>
          </table>
        </div>

    <div class="row py-3">
        <div class="col-md-4 py-2">
            <div class="text-muted">Service Demandeur</div>
            <div>{{ $cree=App\Services::select('designation')->where('id',$devis->service_id)->value('designation') }} </h2></div>
        </div>
        <div class="col-md-4 py-2">
            <div class="text-muted">Etat du Devis</div>
            <div>{{ $devis->etatdevis }}</div>
        </div>
        <div class="col-md-4 py-2">
            <div class="text-muted">Crée par</div>
            <div>{{ $service=App\User::select('name')->where('id',$devis->users_id)->value('name') }} </h2></div>
        </div>
    </div>
    <div class="d-flex py-3">
        <div class="flex"></div>
        <a href="#" class="btn btn-sm btn-primary">Modifiez Devis</a>
    </div>
@endsection


