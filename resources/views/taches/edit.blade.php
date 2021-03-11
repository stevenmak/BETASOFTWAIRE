@extends('layouts.app')

@section('title', 'Editertache')
@section('module')
    GESTION DES TACHES
@endsection
@section('description')
    Module de Gestion des tâches
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Modifier Tâche</strong>
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
                {!! Form::model($taches, ['method' => 'PATCH','route' => ['taches.update', $taches->id]]) !!}
                    @csrf
                    @method('PUT')
                <div class="row row-sm">
                    <div class="form-group col-6">
                        <label>Designation</label>

                        {!! Form::text('designation', null, array('placeholder' => 'Designation','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Description</label>
                        {!! Form::text('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Date début</label>
                        {!! Form::date('dateDebut', null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Date fin</label>
                        {!! Form::date('dateFin', null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Depense Estimer</label>
                        {!! Form::text('depenseEstimerTache', null, array('placeholder' => '','class' => 'form-control','step' => '0.00')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Priorité</label>
                        {!! Form::text('priorite', null, array('placeholder' => 'Priorite(1,2,3,4)','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Avancement</label>
                        {!! Form::text('avancement', null, array('placeholder' => 'Avancement(%)','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Etat</label>
                        <select class="form-control" name="etat">
                            <option value="A faire">A faire</option>
                            <option value="En cours">En cours</option>
                            <option value="Terminer">Terminer</option>
                            <option value="En pause">En pause</option>
                            <option value="Annuler">Annuler</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label>Etape</label>
                        {!! Form::select('etape_id',App\Etapes::pluck('nomEtape', 'id'), null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Service</label>
                        {!! Form::select('service_id',App\Services::pluck('designation', 'id'), null, array('placeholder' => 'Services','class' => 'form-control')) !!}
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
