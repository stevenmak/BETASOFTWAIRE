@extends('layouts.app')

@section('title', 'AfficherRoles')
@section('module')
    GESTION DES ROLES UTILISATEUR
@endsection
@section('description')
    Module de Gestion des roles utisateurs et leurs privilèges
@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Afficher un role</strong>
            </div>
            <div class="card-body">
                <div class="row row-sm">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nom:</strong>
                            {{ $role->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permissions:</strong>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <label class="label label-success">{{ $v->name }},</label>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
           </div> 
           </div> 
    </div>
@endsection
