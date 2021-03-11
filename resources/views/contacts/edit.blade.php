@extends('layouts.app')

@section('title', 'EditerContact')
@section('module')
    GESTION DES CONTACTS CLIENTS
@endsection
@section('description')
    Module de Gestion des contacts clients
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>MODIFIER CONTACT CLIENT</strong>
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
                {!! Form::model($contacts, ['method' => 'PATCH','route' => ['contacts.update', $contacts->id]]) !!}
                <div class="row row-sm">
                    <div class="form-group col-6">
                        <label>Code Contact</label>
                        {!! Form::text('codeContact', null, array('placeholder' => 'Code Contact','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Prenom Contact</label>
                        {!! Form::text('prenomContact', null, array('placeholder' => 'Prenom Contact','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Nom Contact</label>
                        {!! Form::text('nomContact', null, array('placeholder' => 'Nom Contact','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Titre Contact</label>
                        {!! Form::text('titreContact', null, array('placeholder' => 'Titre Contact','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Genre</label>
                        {!! Form::select('genreContact',DB::table('genres')->pluck('nom','symbole'), null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Profession</label>
                        {!! Form::select('professionContact',App\Professions::pluck('intituleFR','intituleFR'), null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Telephone</label>
                        {!! Form::text('telephone', null, array('placeholder' => 'Telephone','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Mobile</label>
                        {!! Form::text('mobile', null, array('placeholder' => 'Mobile','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Courriel</label>
                        {!! Form::text('courriel', null, array('placeholder' => 'Courriel','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Adresse</label>
                        {!! Form::text('adresse', null, array('placeholder' => 'Adresse','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Ville</label>
                        {!! Form::text('ville', null, array('placeholder' => 'Ville','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Province</label>
                        {!! Form::text('province', null, array('placeholder' => 'Province','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Pays</label>
                        {!! Form::text('pays', null, array('placeholder' => 'Pays','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Domaine Activite</label>
                        {!! Form::text('domaineActivite', null, array('placeholder' => 'Domaine Activite','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Client</label>
                        {!! Form::select('client_id',  App\Clients::select(DB::raw("CONCAT(prenomClient,' ', nomClient) AS nomComplet, id"))
                        ->pluck('nomComplet','id'), null, array('placeholder' => 'Clients','class' => 'form-control'))  !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Créé par</label>
                        {!! Form::text('users_id', null, array('placeholder' => 'Créé par','readonly','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">

                    </div>
                    <div class="form-group col-6">
                        <button type="submit" class="btn btn-primary">Modifiez</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
