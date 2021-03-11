@extends('layouts.app')

@section('title', 'CreerUtilisateurs')
@section('module')
    GESTION DES UTILISATEURS
@endsection
@section('description')
    Module de Gestion des utilisateurs du système
@endsection
@section('content')

                    <div class="row">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="d-flex">
                                    <strong>Whoops!</strong>Veillez verifié les données saisies<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                    <div class="card">
                        <div class="card-header">
                            <strong>Ajouter un nouvel utilisateur</strong>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Tous les champs sont obligatoires.</p>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 ">
                                        <label>Nom utilisateur</label>
                                        {!! Form::text('name', null, array('placeholder' => 'Nom utilisateur','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Adresse Email</label>
                                        {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Mot de passe</label>
                                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Confirmez Password</label>
                                        {!! Form::password('confirm-password', array('placeholder' => 'Confirmez Password','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Nom de l'agent</label>
                                        {!! Form::select('agent_id',  App\Agents::select(DB::raw("CONCAT(prenom,' ', nom) AS nomComplet, id"))->pluck('nomComplet','id'), null, array('placeholder' => '','class' => 'form-control'))  !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Roles Agent</label>
                                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="text-right pt-2 col-sm-6">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
@endsection
