@extends('layouts.app')

@section('title', 'CreerServices')
@section('module')
    GESTION DES SERVICES
@endsection
@section('description')
    Module de Gestion des service et affectation
@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>ajouter un service</strong>
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
                {!! Form::model($services, ['method' => 'PATCH','route' => ['services.update', $services->id]]) !!}
                    @csrf
                    @method('PUT')
                <div class="row row-sm">
                    <p class="text-muted col-md-12">Remplissez les informations pour continuer</p><br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Désignation</label>
                            {!! Form::text('designation', null, array('placeholder' => 'Designation','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nombre des Agent</label>
                            {!! Form::text('nbreAgent', null, array('placeholder' => 'Nombre des agents','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label>Chef de Service</label>
                            {!! Form::select('chefservice',App\Agents::pluck('prenom','id'), null, array('placeholder' => '','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label>Departement</label>
                            {!! Form::select('departement_id',App\Departements::pluck('designation', 'id'), null, array('placeholder' => '','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label></label>
                            <input type="hidden" class="form-control"  name="users_id" required value="{{ auth()->user()->id }}">
                        </div>
                        <div class="text-right col-md-6">
                            <button type="submit" class="btn btn-primary">Envoyez</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
