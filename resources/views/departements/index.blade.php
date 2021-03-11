@extends('layouts.app')

@section('title', 'IndexDepartement')
@section('module')
    GESTION DES DEPARTEMENTS
@endsection
@section('description')
    Module de Gestion des departements
@endsection

@section('content')
                <div class="row">
                    <div class="col-9"><strong>La liste des départements</strong></div>
                    <div class="col-3">
                        @can('departement-create')
                        <a class="btn btn-primary" href="{{ route('departements.create') }}">AJOUTER</a>
                        @endcan
                    </div>
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
                <div class="table-responsive">
                    <table id="table" class="table table-theme v-middle" data-plugin="bootstrapTable" data-toolbar="#toolbar" data-search="true" data-search-align="left" data-show-export="true" data-show-columns="true" data-detail-view="false" data-mobile-responsive="true" data-pagination="true" data-page-list="[10, 25, 50, 100, ALL]" data-plugin="dataTable">
                        <thead>
                            <tr>
                            <th data-sortable="true" data-field="ID">ID</th>
                            <th></th>
                            <th data-sortable="true" data-field="nombreagent">NOMBRE DES AGENTS</th>
                            <th>ACTION</th>
                            </tr>
                         </thead>
                         <tbody>
                          @foreach ($departements as $key => $departement)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$i }}</td>
                              <td class="flex">{{ $departement->designation }}</td>
                              <td class="flex">{{ $departement->nbreAgent }}</td>
                              <td class="flex">
                                      <div class="item-action dropdown">
                                        <a href="#" data-toggle="dropdown" class="text-muted">
                                            <i data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">

                                            <a class="dropdown-item" href="{{ route('departements.show',$departement->id) }}">
                                                <i data-feather="eye"></i>
                                                Afficher
                                            </a>
                                            @can('departement-edit')
                                            <a class="dropdown-item" href="{{ route('departements.edit',$departement->id) }}">
                                                <i data-feather="edit"></i>
                                                Editer
                                            </a>
                                            @endcan

                                            <div class="dropdown-divider"></div>
                                            @can('departement-delete')
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
                      {!! $departements->render() !!}
                      <script>$('dt_departement').dataTable();</script>
            </div>
@endsection
