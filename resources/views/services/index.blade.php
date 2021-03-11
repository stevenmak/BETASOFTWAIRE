@extends('layouts.app')

@section('title', 'IndexServices')
@section('module')
    GESTION DES SERVICES
@endsection
@section('description')
    Module de Gestion des service et affectation
@endsection

@section('content')
                <div class="row">
                    <div class="col-9"><strong>La liste des services</strong></div>
                    <div class="col-3">@can('service-create')<a class="btn btn-primary" href="{{ route('services.create') }}">AJOUTER</a>@endcan</div>
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
                    <table id="dataTable" class="table table-theme table-row v-middle" data-plugin="dataTable">
                        <thead>
                            <tr>
                                <th>NUMERO</th>
                                <th>NOM SERVICE</th>
                                <th>NOMBRE AGENTS</th>
                                <th>CHEF SERVICE</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($services as $key => $service)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$i }}</td>
                              <td class="flex">{{ $service->designation }}</td>
                              <td class="flex">{{ $service->nbreAgent }}</td>
                              <td class="flex">{{ $agent=App\Agents::select('prenom')->where('id',$service->chefservice)->value('prenom') }} {{ $agent=App\Agents::select('nom')->where('id',$service->chefservice)->value('nom') }}</td>
                              <td class="flex">

                                <div class="item-action dropdown">
                                    <a href="#" data-toggle="dropdown" class="text-muted">
                                        <i data-feather="more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('services.show',$service->id) }}">
                                            <i data-feather="eye"></i>
                                            Afficher
                                        </a>
                                        @can('service-edit')
                                        <a class="dropdown-item" href="{{ route('services.edit',$service->id) }}">
                                            <i data-feather="edit"></i>
                                            Editer
                                        </a>
                                        @endcan
                                        <div class="dropdown-divider"></div>
                                        @can('service-delete')
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
                      {!! $services->render() !!}
                </div>
@endsection
