@extends('layouts.app')

@section('title', 'IndexRoles')
@section('module')
    GESTION DES ROLES UTILISATEUR
@endsection
@section('description')
    Module de Gestion des roles utisateurs et leurs privilèges
@endsection


@section('content')
                <div class="row">
                    <div class="col-9"><strong>LA LISTE DES ROLES</strong></div>
                    <div class="col-3">@can('role-create')<a class="btn btn-primary" href="{{ route('roles.create') }}">AJOUTER</a>@endcan</div>
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
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td class="">{{ ++$i }}</td>
                                <td class="">{{ $role->name }}</td>
                                <td class="">
                                        <div class="item-action dropdown">
                                            <a href="#" data-toggle="dropdown" class="text-muted">
                                                <i data-feather="more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                <a class="dropdown-item" href="{{ route('roles.show',$role->id) }}">
                                                    <i data-feather="eye"></i>
                                                    Afficher
                                                </a>
                                                @can('role-edit')
                                                <a class="dropdown-item" href="{{ route('roles.edit',$role->id) }}">
                                                    <i data-feather="edit"></i>
                                                    Editer
                                                </a>
                                                @endcan
                                                <div class="dropdown-divider"></div>
                                                @can('role-delete')
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
                      {!! $roles->render() !!}
                </div>
@endsection
