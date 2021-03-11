@extends('layouts.app')


@section('title', 'ModifierAgent')
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
                <strong>MODIFIER UN AGENT</strong>
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
                {!! Form::model($agents, ['method' => 'PATCH','route' => ['agents.update', $agents->id]]) !!}
                <div class="row row-sm">
                    <div class="form-group col-6">
                        <label>Prenom</label>
                        {!! Form::text('prenom', null, array('placeholder' => 'Prenom','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Nom</label>
                        {!! Form::text('nom', null, array('placeholder' => 'Nom','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Code Agent</label>
                        {!! Form::text('codeAgent', null, array('placeholder' => 'Code Agent','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Matricule Agent</label>
                        {!! Form::text('matriculeAgent', null, array('placeholder' => 'Matricule Agent','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Genre</label>
                        {!! Form::text('genre', null, array('placeholder' => 'Genre','class' => 'form-control')) !!}
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
                        {!! Form::email('courriel', null, array('placeholder' => 'Courriel','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Titre Agent</label>
                        {!! Form::text('titreAgent', null, array('placeholder' => 'Titre Agent','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Profession</label>
                        {!! Form::text('profession', null, array('placeholder' => 'Profession','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Niveau Etude</label>
                        {!! Form::text('niveauEtude', null, array('placeholder' => 'Niveau Etude','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Etat Civil</label>
                        {!! Form::text('etatCivil', null, array('placeholder' => 'Etat Civil','class' => 'form-control')) !!}
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

                    </div>
                    <div class="form-group col-6">
                        <button type="submit" class="btn btn-primary">Enregistrez</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
