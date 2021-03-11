@extends('layouts.app')

@section('title', 'CeerDepartement')
@section('module')
    GESTION DES DEPARTEMENTS
@endsection
@section('description')
    Module de Gestion des departements
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>ajouter un departement</strong>
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
                {!! Form::open(array('route' => 'departements.store','method'=>'POST')) !!}
                <div class="row row-sm">
                    <div class="form-group col-sm-6">
                        <label>Designation</label>

                        {!! Form::text('designation', null, array('placeholder' => 'Designation','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Nombre Agent</label>
                        {!! Form::number('nbreAgent', null, array('placeholder' => 'Nombre agent','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        <label></label>
                        <input type="hidden" class="form-control"  name="users_id" required value="{{ auth()->user()->id }}">
                    </div>
                    <div class="form-group col-sm-6">
                        <button type="submit" class="btn btn-primary">Envoyez</button>
                    </div>
                </div>
                {!! Form::close() !!}


            </div>
        </div>
    </div>
@endsection
