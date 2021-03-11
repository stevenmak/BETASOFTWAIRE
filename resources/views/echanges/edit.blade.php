@extends('layouts.app')

@section('title', 'Editertaux')
@section('module')
    GESTION DES TAUX D'ECHANGES
@endsection
@section('description')
    Module de Gestion des taux d'echanges
@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Modifié taux echanges</strong>
            </div>
            <div class="card-body">
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
                {!! Form::model($echanges, ['method' => 'PATCH','route' => ['echanges.update', $echanges->id]]) !!}
                <div class="row row-sm">
                    <div class="col-3">
                        <label>Valeur Taux</label>
                    </div>
                    <div class="col-6">
                        {!! Form::text('valeurEchanges', null, array('placeholder' => 'Valeur Taux','class' => 'form-control')) !!}
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary">Envoyez</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
