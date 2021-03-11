@extends('layouts.app')

@section('title', 'IndexDepenses')
@section('module')
GESTION COMPTABILITE ET FINANCE
@endsection
@section('description')
    Module de Gestion des depenses
@endsection
@section('content')
                <div class="row">
                    <div class="col-9"><strong>Liste de depenses </strong></div>
                    <div class="col-3">@can('depense-create')<a class="btn btn-primary" href="{{ route('depenses.create') }}">AJOUTER </a>@endcan</div>
                </div>
                <div class="col-12">
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
            <div>
                <table id="table" class="table table-theme v-middle" data-plugin="bootstrapTable" data-toolbar="#toolbar" data-search="true" data-search-align="left" data-show-export="true" data-show-columns="true" data-detail-view="false" data-mobile-responsive="true" data-pagination="true" data-page-list="[10, 25, 50, 100, ALL]" data-plugin="dataTable" >
                        <thead>
                            <tr>
                                <th data-sortable="true" data-field="ID">ID</th>
                                <th data-sortable="true" data-field="libelle">LIBELLE</th>
                                <th data-sortable="true" data-field="nomProjet">NOM PROJET</th>
                                <th data-sortable="true" data-field="nomEtape">ETAPE</th>
                                <th data-sortable="true" data-field="designation">TACHE</th>
                                <th data-sortable="true" data-field="designation">SERVICE</th>
                                <th data-sortable="true" data-field="montant">MONTANT</th>
                                <th data-sortable="true" data-field="ACTION">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($depenses=App\Depenses::get() as $key => $depense)
                            <tr class=" " data-id="20">
                                <td class="flex">{{ ++$key }}</td>
                                <td class="flex">{{ $depense->libelle }}</td>
                                <td class="flex">{{ $projet=App\Projets::select('nomProjet')->where('id',$depense->projet_id)->value('nomProjet') }}</td>
                                <td class="flex">{{ $etape=App\Etapes::select('nomEtape')->where('id',$depense->etape_id)->value('nomEtape') }}</td>
                                <td class="flex">{{ $tache=App\Taches::select('designation')->where('id',$depense->tache_id)->value('designation') }}</td>
                                <td class="flex">{{ $service=App\Services::select('designation')->where('id',$depense->service_id)->value('designation') }}</td>
                                <td class="flex">{{ number_format($depense->montant,2, ',', ' ')}}</td>
                                <td class="flex">
                                    <div class="item-action dropdown">
                                      <a href="#" data-toggle="dropdown" class="text-muted">
                                          <i data-feather="more-vertical"></i>
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                                          <a class="dropdown-item" href="{{ route('depenses.show',$depense->id) }}">
                                              <i data-feather="eye"></i>
                                              Afficher
                                          </a>
                                          @can('depense-edit')
                                          <a class="dropdown-item" href="{{ route('depenses.edit', $depense->id) }}">
                                              <i data-feather="edit"></i>
                                              Editer
                                          </a>
                                          <a class="dropdown-item" href="{{ route('depenses.edit', $depense->id) }}">
                                            <i data-feather="check-square"></i>
                                            Depenses authorisée
                                            </a>
                                          @endcan
                                          @can('depense-delete')
                                          <div class="dropdown-divider"></div>
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
@endsection

