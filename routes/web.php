<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('agents','AgentsController');
    Route::resource('clients','ClientsController');
    Route::resource('contacts','ContactsController');
    Route::resource('departements','DepartementsController');
    Route::resource('depenses','DepensesController');
    Route::resource('devis','DevisController');
    Route::resource('entreprises','EntreprisesController');
    Route::resource('etapes','EtapesController');
    Route::resource('materiels','MaterielsController');
    Route::resource('paiements','PaiementsController');
    Route::resource('projets','ProjetsController');
    Route::resource('roles','RolesController');
    Route::resource('services','ServicesController');
    Route::resource('taches','TachesController');
    Route::resource('echanges','EchangesController');
    Route::resource('users','UserController');
    Route::resource('lignes','LignesController');
    Route::get('projects.index', 'ProjetsController@finis')->name('projetsfinis');
    //Route::post('medias.save', 'MediasController@save');

    //les routes de la methode archiver

    Route::put('archiverAgent/{id}', 'AgentsController@archiverAgent')->name('archiverAgent');
    Route::put('archiverClient/{id}', 'ClientsController@archiverClient');
    Route::put('archiverContact/{id}', 'ContactsController@archiverContact');
    Route::put('archiverDepartement/{id}', 'DepartementsController@archiverDepartement');
    Route::put('archiverDepense/{id}', 'DepensesController@archiverDepense');
    Route::put('archiverDevis/{id}', 'DevisController@archiverDevis');
    Route::put('archiverEchange/{id}', 'EchangesController@archiverEchange');
    Route::put('archiverEtape/{id}', 'EtapesController@archiverEtape');
    Route::put('archiverMateriel/{id}', 'MaterielsController@archiverMateriel');
    Route::put('archiverPaiement/{id}', 'PaiementsController@archiverPaiement')->name('archiverPaiement');
    Route::put('archiverProjet/{id}', 'ProjetsController@archiverProjet');
    Route::put('archiverService/{id}', 'ServicesController@archiverService');
    Route::put('archiverTache/{id}', 'TachesController@archiverTache');
    Route::put('archiverUser/{id}', 'UsersController@archiverUser');
    Route::get('/agenda', function () {return view('agenda');})->name('agenda');
    //les routes pour les rapports

    Route::get('/dailyreport', function(){return view('paiements.dailyreport');})->name('dailyreportentree');
    Route::get('/weeklyreport', function(){return view('paiements.weeklyreport');})->name('weeklyreportentree');
    Route::get('/monthlyreport', function(){return view('paiements.monthlyreport');})->name('monthlyreportentree');
});
