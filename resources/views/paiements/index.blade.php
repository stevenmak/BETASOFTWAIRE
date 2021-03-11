@extends('layouts.app')
@section('title', 'IndexPaiements')
@section('module')
GESTION COMPTABILITE ET FINANCE
@endsection
@section('description')
    Module de Gestion des paiements
@endsection
@section('content')
                <div class="row">
                    <div class="col-9"><strong></strong></div>
                    <div class="col-3">@can('paiement-create')<a class="btn btn-primary" href="{{ route('paiements.create') }}">AJOUTER </a>@endcan</div>
                </div>

                <div class="row">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="d-flex">
                            <p>{{ $message }}</p>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                     @endif
                </div>
                <div style="margin-top:20px;"></div>
                <div>
                    <table id="table" class="table table-theme v-middle" data-plugin="bootstrapTable" data-toolbar="#toolbar" data-search="true" data-search-align="left" data-show-export="true" data-show-columns="true" data-detail-view="false" data-mobile-responsive="true" data-pagination="true" data-page-list="[10, 25, 50, 100, ALL]" data-plugin="dataTable" >
                        <thead>
                            <tr>
                                <th data-sortable="true" data-field="N°">N°</th>
                                <th data-sortable="true" data-field="reference">REFERENCE</th>
                                <th data-sortable="true" data-field="nomClient">NOM DU CLIENT</th>
                                <th data-sortable="true" data-field="nomProjet">PROJET</th>
                                <th data-sortable="true" data-field="libelle">LIBELLE</th>
                                <th data-sortable="true" data-field="datepaiement">DATE PAIEMENT</th>
                                <th data-sortable="true" data-field="montant">MONTANT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($paiements as $key => $paiement)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$i }}</td>
                              <td class="flex">{{ $paiement->reference }}</td>
                              <td class="flex">{{$projet = DB::table('clients')->join('projets','projets.client_id', '=', 'clients.id')->join('paiements','projets.id', 'paiements.projet_id')->where('paiements.projet_id','=',$paiement->projet_id)->value('nomClient')}}</td>
                              <td class="flex">{{ $contact=App\Projets::select('nomProjet')->where('id',$paiement->projet_id)->value('nomProjet') }}</td>
                              <td class="flex">{{ $paiement->libelle }}</td>
                              <td class="flex">{{ $paiement->datepaiement}}</td>
                              <td class="flex">{{ number_format($paiement->montant,2,',',' ')}}</td>
                              <td class="flex">
                                  <div class="item-action dropdown">
                                    <a href="#" data-toggle="dropdown" class="text-muted">
                                        <i data-feather="more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('paiements.show',$paiement->id) }}">
                                            <i data-feather="eye"></i>
                                            Afficher
                                        </a>
                                        @can('paiement-edit')
                                        <a class="dropdown-item" href="{{ route('paiements.edit', $paiement->id) }}">
                                            <i data-feather="edit"></i>
                                            Editer
                                        </a>

                                        @endcan
                                        <a class="dropdown-item" href="">
                                            <i data-feather="check-square"></i>
                                            Paiment approuvé
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        @can('paiement-delete')
                                        <a class="dropdown-item" href="{{ route('archiverPaiement',$paiement->id) }}">
                                            <i data-feather="archive"></i>
                                            Archiver
                                        </a>
                                        @endcan
                                    </div>
                                </div>

                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                </div>
@endsection
