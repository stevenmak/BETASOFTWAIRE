@extends('layouts.app')

@section('title', 'Indexprojets')
@section('module')
    PLANIFICATION
@endsection
@section('description')
    Module de planification
@endsection
@section('content')
                <div class="row">
                    <div class="col-9"><strong>LA LISTE DES PROJETS FINIS</strong></div>
                    <div class="col-3 btn-group">
                        <a class="btn btn-primary" href="{{ route('projets.index') }}">RETOUR AUX PROJETS</a>
                    </div>
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
                            <th>ID</th>
                            <th>NOM</th>
                            <th>CLIENT</th>
                            <th>CONTACT</th>
                            <th>DATE DEBUT</th>
                            <th>DATE FIN</th>
                            <th>ETAT</th>
                            <th>ASSIGNE</th>
                            <th>BUDGET</th>
                            <th>ACTION</th>
                            </tr>
                        </thead>
                          @foreach ($projets as $key => $projet)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$i }}</td>
                              <td class="flex">{{ $projet->nomProjet }}</td>
                              <td class="flex">{{ $client =App\Clients::select('prenomClient')->where('id', $projet->client_id)->value('prenomClient') }}</td>
                              <td class="flex">{{ $contact=App\Contacts::select('prenomContact')->where('id',$projet->contact_id)->value('prenomContact') }}</td>
                              <td class="flex">{{ $projet->datedebut }}</td>
                              <td class="flex">{{ $projet->datefin }}</td>
                              <td class="flex">{{ $projet->etatprojet}}</td>
                              <td class="flex">{{ $agent=App\Agents::select('prenom')->where('id',$projet->agent_id)->value('prenom') }}</td>
                              <td class="flex">{{ number_format($projet->BudgetProjet,2, ',', ' ')}}USD</td>
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
                                    </div>
                                </div>

                              </td>
                          </tr>
                          @endforeach
                      </table>
                      {!! $projets->render() !!}
                </div>
@endsection


