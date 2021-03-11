@extends('layouts.app')

@section('title', 'IndexAgent')
@section('module')
    GESTION DES AGENTS
@endsection
@section('description')
    Module de Gestion des agents
@endsection

@section('content')
                <div class="row">
                    <div class="col-9"><strong>LA LISTE DES AGENTS BETA ENGENEERING</strong></div>
                    <div class="col-3"> @can('agent-create')<a class="btn btn-primary" href="{{ route('agents.create') }}">AJOUTER</a>@endcan</div>
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
                            <th>PRENOM</th>
                            <th>NOM AGENT</th>
                            <th>TELEPHONE</th>
                            <th>MOBILE</th>
                            <th>PROFESSION</th>
                            <th>GENRE</th>
                            <th class=" " data-id="17">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($agents as $key => $agent)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$i }}</td>
                              <td class="flex">{{ $agent->prenom }}</td>
                              <td class="flex">{{ $agent->nom }}</td>
                              <td class="flex">{{ $agent->telephone }}</td>
                              <td class="flex">{{ $agent->mobile }}</td>
                              <td class="flex">{{ $agent->profession }}</td>
                              <td class="flex">{{ $agent->genre }}</td>
                              <td class="flex">
                                <div class="item-action dropdown">
                                    <a href="#" data-toggle="dropdown" class="text-muted">
                                        <i data-feather="more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('agents.show',$agent->id) }}">
                                            <i data-feather="eye"></i>
                                            Afficher
                                        </a>
                                        @can('agent-edit')
                                        <a class="dropdown-item" href="{{ route('agents.edit', $agent->id) }}">
                                            <i data-feather="edit"></i>
                                            Editer
                                        </a>
                                        @endcan

                                        <div class="dropdown-divider"></div>
                                        @can('agent-delete')
                                        {!! Form::open(['method' => 'PUT','route' => ['archiverAgent', $agent],'style'=>'display:inline']) !!}
                                        {!! Form::submit('<i data-feather="archive">Archiver</i>', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        @endcan
                                    </div>
                                </div>

                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {!! $agents->render() !!}
                </div>
@endsection
