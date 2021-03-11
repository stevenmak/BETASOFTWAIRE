@extends('layouts.app')

@section('title', 'IndexUtilisateurs')
@section('module')
    GESTION DES UTILISATEURS
@endsection
@section('description')
    Module de Gestion des utilisateurs du système
@endsection
@section('content')
                <div class="row">
                    <div class="col-9"><strong>La liste des utilisateurs ayant un compte</strong></div>
                    <div class="col-3"><a class="btn btn-primary" href="{{ route('users.create') }}">AJOUTER </a></div>
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
                    <table id="t_users" class="table table-theme table-row v-middle" data-plugin="dataTable">
                        <thead>
                            <tr>
                                <th><span class="">ID</span></th>
                                <th><span class="">NOM</span></th>
                                <th><span class="">COURRIEL</span></th>
                                <th><span class="">AGENT</span></th>
                                <th><span class="">ETAT</span></th>
                                <th><span class="">ROLES</span></th>
                                <th><span class="">ACTION</span></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $key => $user)
                          <tr class=" " data-id="17">
                              <td>{{ ++$i }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $agent =App\Agents::select('prenom')->where('id', $user->agent_id)->value('prenom') }}</td>
                              <td>{{ $user->etat }}</td>
                              <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                             </td>
                              <td>
                                        <div class="item-action dropdown">
                                            <a href="#" data-toggle="dropdown" class="text-muted">
                                                <i data-feather="more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                <a class="dropdown-item" href="{{ route('users.show',$user->id) }}">
                                                    <i data-feather="eye"></i>
                                                    Afficher
                                                </a>
                                                <a class="dropdown-item" href="{{ route('users.edit',$user->id) }}">
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
                      {!! $users->render() !!}
                </div>
@endsection
