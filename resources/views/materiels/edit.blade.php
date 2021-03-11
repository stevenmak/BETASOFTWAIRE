@extends('layouts.app')

@section('title', 'EditerMateriels')
@section('module')
    GESTION DES MATERIAUX
@endsection
@section('description')
    Module de Gestion des materiels de construction
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Ajouter un matériel</strong>
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
                {!! Form::model($materiels, ['method' => 'POST','route' => ['materiels.update', $materiels->id]]) !!}
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <strong>Modifier matériel ou Un Service</strong>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Tous les champs sont obligatoires.</p>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 ">
                                        <label>Le Code matériel</label>
                                        {!! Form::text('codeMateriaux', null, array('placeholder' => 'Entrer le code matériel','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Le Prix</label>
                                        {!! Form::text('prix', null, array('placeholder' => 'Prix','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Désignation</label>
                                        {!! Form::text('designation', null, array('placeholder' => 'Enterez la désignation','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Type de matériel</label>
                                        {!! Form::select('type', ['Materiel' => 'Materiel', 'Service' => 'Service'],null,['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label></label>
                                        <input type="hidden" class="form-control"  name="users_id" required value="{{ auth()->user()->id }}">
                                    </div>
                                    <div class="text-right pt-2 col-sm-6">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
