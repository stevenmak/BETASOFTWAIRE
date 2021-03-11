@extends('layouts.app')

@section('title', 'CreerAgent')
@section('module')
    GESTION DES AGENTS
@endsection
@section('description')
    Module de Gestion des agents
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>MODIFIER CLIENT</strong>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger dismiss">
                        <strong>Whoops!</strong>Veillez verifié les données saisies<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::model($clients, ['method' => 'PATCH','route' => ['clients.update', $clients->id]]) !!}
                <div class="row row-sm">

                    <div class="form-group col-6">
                        <label>Code Client</label>
                        {!! Form::text('codeClient', null, array('placeholder' => 'Code Client','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Prenom</label>
                        {!! Form::text('prenomClient', null, array('placeholder' => 'Prenom','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Nom Client</label>
                        {!! Form::text('nomClient', null, array('placeholder' => 'Nom','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Nom Entreprise</label>
                        {!! Form::text('nom', null, array('placeholder' => 'Nom','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Genre</label>
                        {!! Form::select('genreClient',DB::table('genres')->pluck('nom','symbole'), null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Titre Client</label>
                        {!! Form::text('titreClient', null, array('placeholder' => 'Titre Client','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Profession</label>
                        {!! Form::select('professionClient',App\Professions::pluck('intituleFR','intituleFR'), null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Adresse Client</label>
                        {!! Form::text('adresseClient', null, array('placeholder' => 'Adresse Client','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Ville Client</label>
                        {!! Form::text('villeClient', null, array('placeholder' => 'Ville Client','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Province Client</label>
                        {!! Form::text('provinceClient', null, array('placeholder' => 'Province Client','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Pays Client</label>
                        {!! Form::text('paysClient', null, array('placeholder' => 'Pays Client','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Domainde d'activité</label>
                        {!! Form::text('domaineActivite', null, array('placeholder' => 'Domaine Activité','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Terme Paiement</label>
                        {!! Form::text('termepaiement', null, array('placeholder' => 'Terme Paiement','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Téléphone</label>
                        {!! Form::text('telephone', null, array('placeholder' => 'Téléphone','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Mobile</label>
                        {!! Form::text('mobile', null, array('placeholder' => 'Mobile','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Courriel</label>
                        {!! Form::email('courriel', null, array('placeholder' => 'Courriel','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Site web</label>
                        {!! Form::text('siteweb', null, array('placeholder' => 'Site web','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Type Client</label>
                        {!! Form::text('typeclient', null, array('placeholder' => 'Type Client','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Créé par</label>
                        {!! Form::select('users_id',App\User::pluck('name', 'id'), null, array('placeholder' => 'Créer par','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                    </div>
                    <div class="form-group col-6">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
