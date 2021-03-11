@extends('layouts.app')

@section('title', 'IndexEntreprise')
@section('module')
DONNEES DE L'ENTREPRISE
@endsection
@section('description')
Affichages des Informations sur l'entreprise
@endsection

@section('content')
            <div class="row">
                <strong>Informations sur l'entreprise</strong>
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
                            <th>ID NAT</th>
                            <th>RCCM</th>
                            <th>NUM IMPOT</th>
                            <th>TELEPHONE</th>
                            <th>MOBILE</th>
                            <th class=" ">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entreprises as $key => $entreprise)
                            <tr class=" " data-id="17">
                                <td class="flex">{{ ++$i }}</td>
                                <td class="flex">{{ $entreprise->nom }}</td>
                                <td class="flex">{{ $entreprise->idNat }}</td>
                                <td class="flex">{{ $entreprise->RCCM }}</td>
                                <td class="flex">{{ $entreprise->numImpot }}</td>
                                <td class="flex">{{ $entreprise->telephone }}</td>
                                <td class="flex">{{ $entreprise->mobile }}</td>
                                <td class="flex">
                                    <div class="item-action dropdown">
                                        <a href="#" data-toggle="dropdown" class="text-muted">
                                            <i data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <a class="dropdown-item" href="{{ route('entreprises.show', $entreprise->id) }}">
                                                <i data-feather="eye"></i>
                                                Afficher
                                            </a>
                                            <a class="dropdown-item" href="{{ route('entreprises.edit', $entreprise->id) }}">
                                                <i data-feather="edit"></i>
                                                Editer
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item">
                                                <i data-feather="archive"></i>
                                                Archiver
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {!! $entreprises->render() !!}
            </div>
@endsection
