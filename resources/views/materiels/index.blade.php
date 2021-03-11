@extends('layouts.app')

@section('title', 'IndexMateriels')
@section('module')
    GESTION DES MATERIAUX
@endsection
@section('description')
    Module de Gestion des materiels de construction
@endsection

@section('content')
                <div class="row">
                    <div class="col-9"><strong>La liste des materiaux et services dejà enregistrés</strong></div>
                    <div class="col-3">@can('materiel-create')<a class="btn btn-primary" href="{{ route('materiels.create') }}">AJOUTER MATERIEL</a>@endcan</div>
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
                    <table id="dt_materiel" class="table table-theme table-row v-middle" data-plugin="dataTable">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>CODE MATERIAUX</span></th>
                            <th>DESIGNATION</span></th>
                            <th>PRIX MATERIAUX</span></th>
                            <th>TYPE SERVICE</span></th>
                            <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materiels as $key => $materiel)
                            <tr class=" " data-id="17">
                                <td class="flex">{{ ++$i }}</td>
                                <td class="flex">{{ $materiel->codeMateriaux }}</td>
                                <td class="flex">{{ $materiel->designation }}</td>
                                <td class="flex">{{ $materiel->prix }}  $</td>
                                <td class="flex">{{ $materiel->type }}</td>
                                <td class="flex">
                                        <div class="item-action dropdown">
                                            <a href="#" data-toggle="dropdown" class="text-muted">
                                                <i data-feather="more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                <a class="dropdown-item" href="{{ route('materiels.show',$materiel->id) }}">
                                                    <i data-feather="eye"></i>
                                                    Afficher
                                                </a>
                                                @can('materiel-edit')
                                                <a class="dropdown-item" href="{{ route('materiels.edit',$materiel->id) }}">
                                                    <i data-feather="edit"></i>
                                                    Editer
                                                </a>
                                                @endcan
                                                <div class="dropdown-divider"></div>
                                                @can('materiel-delete')
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
                      {!! $materiels->render() !!}
                      <script>$('dt_materiel').dataTable();</script>

                </div>
@endsection
