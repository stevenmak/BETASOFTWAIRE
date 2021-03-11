@extends('layouts.app')

@section('title', 'IndexContact')
@section('module')
    GESTION DES CONTACTS CLIENTS
@endsection
@section('description')
    Module de Gestion des contacts clients
@endsection

@section('content')
                <div class="row">
                    <div class="col-9"><strong>LA LISTE DES CONTACTS CLIENTS</strong></div>
                    <div class="col-3"><a class="btn btn-primary" href="{{ route('contacts.create') }}">AJOUTER</a></div>
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
                            <th>NOM</th>
                            <th>PROFESSION</th>
                            <th>TELEPHONE</th>
                            <th>MOBILE</th>
                            <th>DOMAINE ACTIVITE</th>
                            <th class=" " data-id="17">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($contacts as $key => $contact)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$i }}</td>
                              <td class="flex">{{ $contact->prenomContact }}</td>
                              <td class="flex">{{ $contact->nomContact }}</td>
                              <td class="flex">{{ $contact->professionContact }}</td>
                              <td class="flex">{{ $contact->telephone }}</td>
                              <td class="flex">{{ $contact->mobile }}</td>
                              <td class="flex">{{ $contact->domaineActivite }}</td>
                              <td class="flex">
                                <div class="item-action dropdown">
                                    <a href="#" data-toggle="dropdown" class="text-muted">
                                        <i data-feather="more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('contacts.show',$contact->id) }}">
                                            <i data-feather="eye"></i>
                                            Afficher
                                        </a>
                                        <a class="dropdown-item" href="{{ route('contacts.edit', $contact->id) }}">
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
                      {!! $contacts->render() !!}
                </div>
@endsection
