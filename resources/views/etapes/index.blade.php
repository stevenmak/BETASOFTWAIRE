@extends('layouts.app')

@section('title', 'IndexEtapes')
@section('module')
    GESTION DES ETAPES
@endsection
@section('description')
    Module de Gestion des étapes du projet
@endsection
@section('content')
                <div class="row">
                    <div class="col-8"><strong>La liste des étapes projets</strong></div>
                    <div class="col-4">@can('etape-create')<a class="btn btn-primary" href="{{ route('etapes.create') }}">AJOUTER ETAPE</a>@endcan</div>
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
                    <table id="table" class="table table-theme v-middle" data-plugin="bootstrapTable" data-toolbar="#toolbar" data-search="true" data-search-align="left" data-show-export="true" data-show-columns="true" data-detail-view="false" data-mobile-responsive="true" data-pagination="true" data-page-list="[10, 25, 50, 100, ALL]" data-plugin="dataTable">
                        <thead>
                            <tr>
                            <th data-sortable="true" data-field="ID">ID</th>
                            <th data-sortable="true" data-field=" nomEtape">NOM ETAPE</th>
                            <th data-sortable="true" data-field="nomProjet">NOM PROJET</th>
                            <th data-sortable="true" data-field="debutEtape">DEBUT</th>
                            <th data-sortable="true" data-field="debutFin">FIN</th>
                            <th data-sortable="true" data-field="depenseEstimer">ESTIMATION</th>
                            <th data-sortable="true" data-field="montant">Dep.ACTUELLE</th>
                            <th data-sortable="true" data-field="variance">VARIANCE</th>
                            <th data-sortable="true" data-field="tempsprevu">TIMING</th>
                            <th data-sortable="true" data-field="avancement">AVANCEMENT</th>
                            <th data-sortable="true" data-field="etatEtape">ETAT</th>
                            <th data-sortable="true" data-field="etapeprerequise">PREREQUIS</th>
                            <th>ACTION</th>
                            </tr>
                       </thead>
                       <tbody>
                          @foreach ($etapes as $key => $etape)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$i }}</td>
                              <td class="flex">{{ $etape->nomEtape }}</td>
                              <td class="flex">{{ $projets=App\Projets::select('nomProjet')->where('id',$etape->projet_id)->value('nomProjet') }}</td>
                              <td class="flex">{{ $etape->debutEtape }}</td>
                              <td class="flex">{{ $etape->debutFin }}</td>
                              <td class="flex">{{ number_format($det=$etape->depenseEstimer,2,',',' ') }} $</td>
                              <td class="flex">{{ number_format($montant=DB::table('depenses')
                                ->join('etapes','etapes.id','=','depenses.etape_id')
                                ->select('depenses.montant')->where('depenses.etape_id',$etape->id)
                                ->get(['montant'])->sum('montant' ),2,',',' ')}}</td>
                              <td class="flex">{{ number_format($variance=$det-$montant,2,',',' ')}}</td>
                              <td class="flex">{{ $etape->tempsprevu }} H</td>
                              <td class="flex">{{ $etape->avancement }}  %</td>
                              <td class="flex">{{ $etape->etatEtape }}</td>
                              <td class="flex">{{ $etape->etapeprerequise }}</td>
                              <td class="flex">
                                <div class="item-action dropdown">
                                    <a href="#" data-toggle="dropdown" class="text-muted">
                                        <i data-feather="more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('etapes.show',$etape->id) }}">
                                            <i data-feather="eye"></i>
                                            Afficher
                                        </a>
                                        @can('etape-edit')
                                        <a class="dropdown-item" href="{{ route('etapes.edit',$etape->id) }}">
                                            <i data-feather="edit"></i>
                                            Editer
                                        </a>
                                        @endcan
                                        <div class="dropdown-divider"></div>
                                        @can('etape-delete')
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
                      {!! $etapes->render() !!}
                      <script>$('dt_etape').dataTable();</script>
                </div>
@endsection
