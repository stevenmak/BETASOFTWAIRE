@extends('layouts.app')
@section('content')
{!! Form::open(array('route' => 'devis.store','method'=>'POST')) !!}
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
            <div class="text-highlight"> {!! Form::text('devis[reference]', null, array('placeholder' => 'Reference devis','class' => 'form-control')) !!}</div>
            <div class="text-sm">{!! Form::date('devis[datedevis]', \Carbon\Carbon::now(), array('class' => 'form-control')) !!}</div>
            <div class="text-sm">{!! Form::text('devis[descriptiondevis]', null, array('placeholder' => 'Description devis','class' => 'form-control')) !!}</div>
            <td class="flex"><h6>Maitre d'Ouvrage:  {!! Form::select('devis[client_id]',  App\Clients::select(DB::raw("CONCAT(prenomClient,' ', nomClient) AS nomComplet, id"))
            ->pluck('nomComplet','id'), null, array('placeholder' => '','class' => 'form-control'))  !!}</h6></td>
        </div>
    </div>
    <div class="padding">
        <div class="col-12">
            <h2 class="text-center">PROJET:
                {!! Form::select('devis[projet_id]', App\Projets::pluck('nomProjet','id') , null, array('class' => 'form-control')) !!}</h2>
        </div>
    </div>
    <table class="table table-theme table-rows v-middle" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center"><input id="checkAll" class="formcontrol" type="checkbox"></th>
            <th class="text-center">MATERIELS/ SERVICE</th>
            <th class="text-center"> QUANTITE </th>
            <th class="text-center"> PRIX </th>
            <th class="text-center"> MONTANT </th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>1</td>
            <td><input class="itemRow" type="checkbox"></td>
            <td> {!! Form::select('materiaux_id[]', App\Materiels::pluck('designation','id') , null, array('class' => 'form-control')) !!}</td>
            <td><input type="number" name='quantite[]' placeholder='Entrez quantite' class="form-control qty" step="0" min="0"/></td>
            <td><input type="text" name='prix[]' placeholder='Prix unitaire' class="form-control price" step="0.00" min="0"/></td>
            <td><input type="text" name='total[]' placeholder='0.00' class="form-control total" step="0.00" readonly/></td>
          </tr>
          <tr id='addr1'></tr>
        </tbody>
      </table>
      <div class="row clearfix">
        <div class="col-md-8">
          <button id="add_row" class="btn btn-primary pull-left" type="button">Ajouter Ligne</button>
          <button id='delete_row' class="pull-right btn btn-danger" type="button">Supprimer Ligne</button>
        </div>
        <div class="pull-left col-md-4">
            <table class="table table-bordered table-hover" id="tab_logic_total">
              <tbody>
                <tr>
                  <th class="text-center">Total General</th>
                  <td class="text-center"><input type="text" name='devis[montantdevis]' placeholder='0.00' class="form-control" id="sub_total" step="0.00" readonly/></td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
    <div class="row py-3">
        <div class="col-md-3 py-2">
            <div class="text-muted">Service Demandeur</div>
            <div>{!! Form::select('devis[service_id]', App\Services::pluck('designation','id') , null, array('class' => 'form-control')) !!}</h2></div>
        </div>
        <div class="col-md-3 py-2">
            <div class="text-muted">Etat d'un devis</div>
            <div>{!! Form::select('devis[etatdevis]', DB::table('approbation')->pluck('intitule','intitule') , null, array('class' => 'form-control')) !!}</div>
        </div>
        <div class="col-md-3 py-2">
            <div class="text-muted">Concerne la tache de:</div>
            <div>{!! Form::select('devis[tacheDevis]', DB::table('taches')->pluck('designation','designation') , null, array('class' => 'form-control')) !!}</div>
        </div>
        <div class="col-md-3 py-2 text-right">
            <input type="hidden" class="form-control"  name="devis[users_id]" required value="{{ auth()->user()->id }}">
        </div>
    </div>
    <div class="d-flex py-3">
        <input class="btn btn-primary" type="submit" value="Enregistrez Devis"/>
    </div>
    {!! Form::close() !!}
    <script type="text/javascript" src="{{ asset('libs/jquery/dist/jquery.min.js') }}" >
    <script type="text/javascript" src="{{ asset('js/custom.js') }}" >
    </script>
@endsection

