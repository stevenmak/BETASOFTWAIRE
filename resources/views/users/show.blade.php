@extends('layouts.app')

@section('title', 'AfficherUsers')
@section('module')
    GESTION DES UTILISATEURS
@endsection
@section('description')
    Module de Gestion des utilisateur
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Afficher les Utilisateurs</strong>
            </div>
            <div class="card-body">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Retour</a>
                </div>
                <div>
                    <h5 class="card-title">Nom Utilisateur:{{ $user->name }}</h5>
                    <h4 class="card-text">E-mail:  {{ $user->email }}</h4>
                    <h4 class="card-text">Crée le: {{ $user->created_at }}</h4>
                    <h4 class="card-text">Modié le: {{ $user->updated_at }}</h4>

                </div>
            </div>
        </div>
    </div>
@endsection