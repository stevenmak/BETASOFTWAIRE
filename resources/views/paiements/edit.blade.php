@extends('layouts.app')

@section('title', 'editerpaiements')
@section('module')
    GESTION DES PAIEMENTS
@endsection
@section('description')
    Module de Gestion des paiemets
@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Modifier un Paiement</strong>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex">
                        <strong>Whoops!</strong>Veillez verifier les données saisies<br><br>
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
            <div class="card-body">
                {!! Form::model($paiements, ['method' => 'PATCH','route' => ['paiements.update', $paiements->id]]) !!}
                <div class="row row-sm">
                    <div class="form-group col-6">
                        <label>Code</label>

                        {!! Form::text('reference', null, array('placeholder' => 'Référence Paiement','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Libélé</label>
                        {!! Form::text('libelle', null, array('placeholder' => 'Libélé','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Déscription</label>
                        {!! Form::text('description', null, array('placeholder' => 'Déscription','class' => 'form-control'))  !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Date Paiement</label>
                        {!! Form::text('datepaiement', null, array('class' => 'form-control','type'=>'datetime-local','id'=>'example-datetime-local-input'))  !!}
                    </div>
                    <div class="form-group col-6">
                            <label>Montant</label>
                            {!! Form::text('montant', null, array('placeholder' => 'Montant','class' => 'form-control','step' => '0.00')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Nom du projet</label>
                        {!! Form::select('projet_id', App\Projets::pluck('nomProjet','id') , null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label></label>
                        <input type="hidden" class="form-control"  name="users_id" required value="{{ auth()->user()->id }}">
                    </div>
                    <div class="form-group col-6"></div>
                    <div class="form-group col-6">

                        <button type="submit" class="btn btn-primary">Envoyez</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
