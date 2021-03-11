@extends('layouts.app')

@section('title', 'Indexprojets')
@section('module')
PLANIFICATION
@endsection
@section('description')
Module de planification
@endsection

@section('content')
    <div class="col-lg-12 list-group-item">
                <div class="row">
                    <div class="col-9"><strong>LA LISTE DES PROJETS</strong></div>
                    <div class="col-3 btn-group" style="margin-bottom: 20px;">
                        @can('projet-create')<a class="btn btn-primary" href="{{ route('projets.create') }}">AJOUTER</a>@endcan
                        <a class="btn btn-warning" href="{{ route('projetsfinis') }}">PROJETS FINIS</a>
                </div>

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
            <div style="margin-top:20px"></div>

            <div class="page-content page-container" id="page-content">

              <div>
                <table id="table" class="table table-theme v-middle" data-plugin="bootstrapTable" data-toolbar="#toolbar" data-search="true" data-search-align="left" data-show-export="true" data-show-columns="true" data-detail-view="false" data-mobile-responsive="true" data-pagination="true" data-page-list="[10, 25, 50, 100, ALL]" data-plugin="dataTable">
                    <thead>
                            <tr>
                                <th data-sortable="true" data-field="ID">ID</th>
                                <th data-sortable="true" data-field="nomProjet">NOM</th>
                                <th data-sortable="true" data-field="prenomClient">CLIENT</th>
                                <th data-sortable="true" data-field="prenomContact">CONTACT</th>
                                <th data-sortable="true" data-field="datedebut">DATE DEBUT</th>
                                <th data-sortable="true" data-field="datefin">DATE FIN</th>
                                <th data-sortable="true" data-field="etatprojet">ETAT</th>
                                <th data-sortable="true" data-field="prenom">ASSIGNE</th>
                                <th data-sortable="true" data-field="BudgetProjet">BUDGET</th>
                                <th data-sortable="true" data-field="description">Déscription</th>
                                <th data-sortable="true" data-field="ACTION">ACTION</th>
                                
                            </tr>
                    </thead>
                    <tbody>
                          @foreach ($projets as $key => $projet)
                          <tr class=" " data-id="20">
                              <td style="min-width:30px;text-align:center">
                                <small class="text-muted">{{ ++$i }}</small>
                              </td>
                              <td class="flex">{{ $projet->nomProjet }}</td>
                              <td class="flex">{{ $client =App\Clients::select('prenomClient')->where('id', $projet->client_id)->value('prenomClient') }}</td>
                              <td class="flex">{{ $contact=App\Contacts::select('prenomContact')->where('id',$projet->contact_id)->value('prenomContact') }}
                              </td>
                              <td class="flex">{{ $projet->datedebut }}</td>
                              <td class="flex">{{ $projet->datefin }}</td>
                              <td class="flex">{{ $projet->etatprojet}}</td>
                              <td class="flex">{{ $agent=App\Agents::select('prenom')->where('id',$projet->agent_id)->value('prenom') }}
                              </td>
                              <td class="flex">{{ number_format($projet->BudgetProjet,2, ',', ' ')}}USD</td>
                              <td class="flex">{{ $projet->description}}</td>
                              <td class="flex">
                                  <div class="item-action dropdown">
                                    <a href="#" data-toggle="dropdown" class="text-muted">
                                        <i data-feather="more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('projets.show',$projet->id) }}">
                                            <i data-feather="eye"></i>
                                            Afficher
                                        </a>
                                        @can('projet-edit')
                                        <a class="dropdown-item" href="{{ route('projets.edit', $projet->id) }}">
                                            <i data-feather="edit"></i>
                                            Editer
                                        </a>
                                        @endcan
                                        <div class="dropdown-divider"></div>
                                        @can('projet-delete')
                                        <a class="dropdown-item">
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
            </div>
        </div>
      </div>
                      {!! $projets->render() !!}

               
@endsection


