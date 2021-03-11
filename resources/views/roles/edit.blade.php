@extends('layouts.app')

@section('title', 'EditerRoles')
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
                <strong>Mettre à jour un role utilisateur</strong>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong>Veillez verifié les données saisies<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                <div class="row row-sm">
                    <div class="col-3">
                        <label>Nom roles</label>
                    </div>
                    <div class="col-6">
                        {!! Form::text('name', null, array('placeholder' => 'Nom roles','class' => 'form-control')) !!}
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permission:</strong>
                        <br/>
                        @foreach($permission as $value)
                            <label class="col-xs-2 col-sm-2 col-md-2">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        @endforeach
                        
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
