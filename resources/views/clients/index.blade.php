@extends('layouts.app')

@section('title', 'IndexClient')
@section('module')
    GESTION DES CLIENTS
@endsection
@section('description')
    Module de Gestion des clients
@endsection
@section('content')

                <div class="row">
                    <div class="col-9"><strong>La liste des clients</strong></div>
                    <div class="col-3"> @can('client-create')<a class="btn btn-primary" href="{{ route('clients.create') }}">Ajouter un Client</a>@endcan</div>
                </div>
                <div style="margin-top: 20px;"></div>
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
                <div class="table-responsive">
                    <table id="table" class="table table-theme v-middle" data-plugin="bootstrapTable" data-toolbar="#toolbar" data-search="true" data-search-align="left" data-show-export="true" data-show-columns="true" data-detail-view="false" data-mobile-responsive="true" data-pagination="true" data-page-list="[10, 25, 50, 100, ALL]" data-plugin="dataTable">
                        <thead>
                            <tr>
                            <th data-sortable="true" data-field="ID">ID</th>
                            <th data-sortable="true" data-field="nom">ENTREPRISE</th>
                            <th data-sortable="true" data-field="prenomClient">PRENOM</th>
                            <th data-sortable="true" data-field="nomClient">NOM</th>
                            <th data-sortable="true" data-field="titreClient">TITRE</span></th>
                            <th data-sortable="true" data-field="villeClient">ADRESSE</th>
                            <th data-sortable="true" data-field="telephone">TELEPHONE</th>
                            <th data-sortable="true" data-field="mobile">MOBILE</th>
                            <th data-sortable="true" data-field="courriel">COURRIEL</th>
                            <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($clients as $key => $client)
                          <tr class=" " data-id="17">
                              <td>{{ ++$i }}</td>
                              <td>{{ $client->nom }}</td>
                              <td>{{ $client->prenomClient }}</td>
                              <td>{{ $client->nomClient }}</td>
                              <td>{{ $client->titreClient }}</td>
                              <td>{{ $client->villeClient }}</td>
                              <td>{{ $client->telephone }}</td>
                              <td>{{ $client->mobile }}</td>
                              <td>{{ $client->courriel }}</td>
                              <td>
                                    <div class="item-action dropdown">
                                        <a href="#" data-toggle="dropdown" class="text-muted">
                                            <i data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <a class="dropdown-item" href="{{ route('clients.show',$client->id) }}">
                                                <i data-feather="eye"></i>
                                                Afficher
                                            </a>
                                            @can('client-edit')
                                            <a class="dropdown-item" href="{{ route('clients.edit',$client->id) }}">
                                                <i data-feather="edit"></i>
                                                Editer
                                            </a>
                                            @endcan

                                            <div class="dropdown-divider"></div>
                                            @can('client-delete')
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
                      {!! $clients->render() !!}
                </div>
@endsection
