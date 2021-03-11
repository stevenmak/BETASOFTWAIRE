@extends('layouts.app')

@section('title', 'Indextaux')
@section('module')
    GESTION DES TAUX D'ECHANGES
@endsection
@section('description')
    Module de Gestion des taux d'echanges
@endsection

@section('content')
                <div class="row">
                    <div class="col-8"><strong>Le taux afficher correspond l'equivalent d' 1$ en FC</strong></div>
                    <div class="col-4">@can('echange-create')<a class="btn btn-primary" href="{{ route('echanges.create') }}">AJOUTER TAUX</a>@endcan</div>
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
                    <table id="datatable" class="table table-theme table-row v-middle" data-plugin="dataTable">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>VALEUR TAUX</th>
                            <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($echanges as $key => $echange)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$i }}</td>
                              <td class="flex">{{ $echange->valeurEchanges }}</td>
                              <td class="flex">
                                <div class="item-action dropdown">
                                    <a href="#" data-toggle="dropdown" class="text-muted">
                                        <i data-feather="more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('echanges.show',$echange->id) }}">
                                            <i data-feather="eye"></i>
                                            Afficher
                                        </a>
                                        @can('echange-edit')
                                        <a class="dropdown-item" href="{{ route('echanges.edit', $echange->id) }}">
                                            <i data-feather="edit"></i>
                                            Editer
                                        </a>
                                        @endcan
                                        <div class="dropdown-divider"></div>
                                        @can('echange-delete')
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
                      {!! $echanges->render() !!}
                </div>
@endsection

