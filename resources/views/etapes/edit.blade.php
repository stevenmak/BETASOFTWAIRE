
@extends('layouts.app')

@section('title', 'EditerEtapes')
@section('module')
    GESTION DES ETAPES
@endsection
@section('description')
    Module de Gestion des étapes du projet
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Ajouter une étape projet</strong>
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
                {!! Form::model($etapes, ['method' => 'PATCH','route' => ['etapes.update', $etapes->id]]) !!}
                    <div class="card">
                        <div class="card-header">
                            <strong>Modifier une étape projet</strong>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Tous les champs sont obligatoires.</p>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 ">
                                        <label>L'étape projet</label>
                                        {!! Form::text('nomEtape', null, array('placeholder' => 'Entrer la désignation pour étape projet','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Le nom du projet</label>
                                        {!! Form::select('projet_id',App\Projets::pluck('nomprojet', 'id'), null, array('placeholder' => '','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Date début</label>
                                        {!! Form::text('debutEtape', null, array('placeholder' => 'Enterez la date du début!','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Date Fin</label>
                                        {!! Form::text('debutFin', null, array('placeholder' => 'Enterez la date Fin!','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Depense estimer</label>
                                        {!! Form::text('depenseEstimer', null, array('placeholder' => 'Depense estimer!','class' => 'form-control','step' => '0.00')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Temps prevu</label>
                                        {!! Form::text('tempsprevu', null, array('placeholder' => 'Enterez le temps prévu!','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Avancement étape en %</label>
                                        {!! Form::text('avancement',  null, array('placeholder' => 'Avancement étape en %!','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Déscription étape</label>
                                        {!! Form::textarea('description', null, array('placeholder' => 'Déscription étape!','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Etat étape</label>
                                        {!! Form::select('etatEtape', ['etape' => 'A débuter', 'En cours','Terminé','En pause','Annulée', 'Entrez étape!' => 'Service'],null,['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Etape requise</label>
                                        {!! Form::select('etapeprerequise', ['etape' => 'etape', 'Entrez la date fin étape!' => 'Service'],null,['class' => 'form-control']) !!}

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
