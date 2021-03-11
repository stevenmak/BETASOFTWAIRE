@extends('layouts.app')

@section('title', 'IndexDevis')
@section('module')
GESTION COMPTABILITE ET FINANCE
@endsection
@section('description')
    Module de Gestion des devis
@endsection
@section('content')
                <div class="row">
                    <div class="col-9"><strong>Liste des etats de besoins enregistrés</strong></div>
                    <div class="col-3">@can('devis-create')<a class="btn btn-primary" href="{{ route('devis.create') }}">AJOUTER </a>@endcan</div>
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
                <div class="table-responsive">
                    <table id="datatable" class="table table-theme table-row v-middle" data-plugin="dataTable">
                        <thead>
                            <tr>
                                <th><span class="">N°</span></th>
                                <th><span class="">NOM DU CLIENT</span></th>
                                <th><span class="">PROJET</span></th>
                                <th><span class="">TACHE CONCERNEE</span></th>
                                <th><span class="">DESCRIPTION DEVIS</span></th>
                                <th><span class="">ETAT DEVIS</span></th>
                                <th><span class="">MONTANT</span></th>
                                <th><span class="">ACTION</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($devis as $key => $devi)
                            <tr class=" " data-id="17">
                                <td class="flex">{{ ++$i }}</td>
                                <td class="flex">{{ $client=App\Clients::select('prenomClient')->where('id',$devi->client_id)->value('prenomClient') }} {{ $client=App\Clients::select('nomClient')->where('id',$devi->client_id)->value('nomClient') }}</td>
                                <td class="flex">{{ $projet=App\Projets::select('nomProjet')->where('id',$devi->projet_id)->value('nomProjet') }}</td>
                                <td class="flex">{{ $devi->tacheDevis}}</td>
                                <td class="flex">{{ $devi->descriptiondevis}}</td>
                                <td class="flex">{{ $devi->etatdevis}}</td>
                                <td class="flex">{{ number_format($devi->montantdevis,2,',',' ') }}</td>
                                <td class="flex">
                                    <div class="item-action dropdown">
                                      <a href="#" data-toggle="dropdown" class="text-muted">
                                          <i data-feather="more-vertical"></i>
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                                          <a class="dropdown-item" href="{{ route('devis.show',$devi->id) }}">
                                              <i data-feather="eye"></i>
                                              Afficher
                                          </a>
                                          @can('devis-edit')
                                          <a class="dropdown-item" href="{{ route('devis.edit', $devi->id) }}">
                                              <i data-feather="edit"></i>
                                              Editer
                                          </a>
                                          @endcan
                                          <a class="dropdown-item" href="{{ route('devis.edit', $devi->id) }}">
                                            <i data-feather="check-square"></i>
                                            Valider devis
                                        </a>
                                          <div class="dropdown-divider"></div>
                                          @can('devis-delete')
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
                     {!! $devis->render() !!}
                </div>
@endsection
