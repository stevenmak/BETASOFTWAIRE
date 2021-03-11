@extends('layouts.app')

@section('title', 'IndexTaches')
@section('module')
    GESTION DES TACHES DU PROJET
@endsection
@section('description')
    Module de Gestion des taches du projet
@endsection

@section('content')
                <div class="row">
                    <div class="col-9"><strong>LA LISTE DES TACHES</strong></div>
                    <div class="col-3">@can('taches-create')<a class="btn btn-primary" href="{{ route('taches.create') }}">AJOUTER</a>@endcan</div>
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
                                <th data-sortable="true" data-field="designation">DESIGNATION</th>
                                <th data-sortable="true" data-field="description">DESCRIPTION</th>
                                <th data-sortable="true" data-field="dateDebut">DATE DEBUT</th>
                                <th data-sortable="true" data-field="dateFin">DATE FIN</th>
                                <th data-sortable="true" data-field="depenseEstimerTache">ESTIMATION</th>
                                <th data-sortable="true" data-field="priorite">PRIORITE</th>
                                <th data-sortable="true" data-field="avancement">AVANCEMENT</th>
                                <th data-sortable="true" data-field="montant">DEP. ACTUELLE</th>
                                <th data-sortable="true" data-field="variance">VARIANCE</th>
                                <th data-sortable="true" data-field="etat">ETAT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($taches as $key => $tache)
                          <tr class=" " data-id="17">
                              <td>{{ ++$i }}</td>
                              <td>{{ $tache->designation }}</td>
                              <td>{{ $tache->description }}</td>
                              <td>{{ $tache->dateDebut }}</td>
                              <td>{{ $tache->dateFin }}</td>
                              <td>{{ number_format($det=$tache->depenseEstimerTache,2,',',' ') }}</td>
                              <td>{{ $tache->priorite }}</td>
                              <td>{{ $tache->avancement }}  %</td>
                              <td>{{ number_format($montant=DB::table('depenses')
                                ->join('taches','taches.id','=','depenses.tache_id')
                                ->select('depenses.montant')->where('depenses.tache_id',$tache->id)
                                ->get(['montant'])->sum('montant' ),2,',',' ')}}
                              </td>
                              <td>{{number_format($variance=$det-$montant,2,',',' ')}}</td>
                              
                              <td>{{ $tache->etat }}</td>
                              <td>
                                <div class="item-action dropdown">
                                    <a href="#" data-toggle="dropdown" class="text-muted">
                                        <i data-feather="more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('taches.show',$tache->id) }}">
                                            <i data-feather="eye"></i>
                                            Afficher
                                        </a>
                                        @can('taches-edit')
                                        <a class="dropdown-item" href="{{ route('taches.edit',$tache->id) }}">
                                            <i data-feather="edit"></i>
                                            Editer
                                        </a>
                                        @endcan
                                        <div class="dropdown-divider"></div>
                                        @can('taches-delete')
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
                      {!! $taches->render() !!}
                </div>
@endsection


