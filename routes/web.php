<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/$$$', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
// tout sur les utilisateurs
Route::resource('pole', 'PoleController');
Route::post('/agent_store', 'UserController@user_store')->name('user.store');
Route::get('/agent', 'UserController@index')->middleware('can:manage-users')->name('agent');
Route::get('/profil', 'UserController@profil')->name('profil');
Route::post('/photo', 'UserController@image_update')->name('image.update');
Route::post('/password', 'UserController@password')->name('password.update');
Route::get('/edit/{user}', 'UserController@edit')->name('edit');
Route::put('/update/{user}', 'UserController@update')->name('update');
Route::put('/update_agent/{user}', 'UserController@update_agent')->name('agent.update');
Route::get('/show/{pole}/{user}', 'UserController@user_show')->name('user.show');
Route::put('/delete/{user}', 'UserController@destroy')->name('destroy');
Route::put('/activer-user/{user}', 'UserController@activer_user')->name('activer.user');
Route::get('/archive-agent', 'UserController@archive_agent')->name('archive-agent');
 //tout sur les depenses

Route::get('/depense', 'DepenseController@index')->name('depense');
Route::get('/create_td', 'DepenseController@create_type_depense')->name('td.create');
Route::post('/store_td', 'DepenseController@store_type_depense')->name('td.store');
Route::delete('/destroy_td/{typeDepense}', 'DepenseController@destroy_type_depense')->name('td.destroy');
Route::put('/update_td/{typeDepense}', 'DepenseController@update_type_depense')->name('td.update');
Route::get('/detail_td/{typeDepense}', 'DepenseController@show_type_depense')->name('td.show');
Route::get('/create_d', 'DepenseController@create_depense')->name('d.create');
Route::post('/store_d', 'DepenseController@store_depense')->name('d.store');
Route::get('/list_d', 'DepenseController@list_depense')->name('d.list');
Route::delete('/destroy_d/{depense}', 'DepenseController@destroy_depense')->name('d.destroy');
Route::get('/depense/{depense}', 'DepenseController@show_depense')->name('d.show');
// Route::get('/edit_d/{depense}', 'DepenseController@edit_depense')->name('d.edit');
Route::put('/update_d/{depense}', 'DepenseController@update_depense')->name('d.update');

//tout sur les recettes
Route::get('/recette', 'RecetteController@index')->name('recette');
Route::get('/create_tr', 'RecetteController@create_type_recette')->name('tr.create');
Route::post('/store_tr', 'RecetteController@store_type_recette')->name('tr.store');
Route::delete('/destroy_tr/{tr}', 'RecetteController@destroy_type_recette')->name('tr.destroy');
Route::put('/update_tr/{tr}', 'RecetteController@update_type_recette')->name('tr.update');
Route::get('/detail_tr/{tr}', 'RecetteController@show_type_recette')->name('tr.show');
Route::get('/create_r', 'RecetteController@create_recette')->name('r.create');
Route::post('/store_r', 'RecetteController@store_recette')->name('r.store');
Route::get('/list_r', 'RecetteController@list_recette')->name('r.list');
// Route::get('/edit_r/{recette}', 'RecetteController@edit_recette')->name('r.edit');
Route::put('/update_r/{recette}', 'RecetteController@update_recette')->name('r.update');
Route::delete('/destroy_r/{recette}', 'RecetteController@destroy_recette')->name('r.destroy');

//tout sur la caisse
Route::get('/ouverture', 'CaisseController@compte')->name('ouverture');
Route::post('/compte/ouvert', 'CaisseController@ouvertureCompte')->name('ouverture.compte');
Route::get('/fermeture', 'CaisseController@fermeture')->name('fermeture');
Route::post('/bilan-compte', 'CaisseController@fermer_compte')->name('compte.fermer');
Route::get('/etat-caisse', 'CaisseController@etat_caisse')->name('etat.caisse');
Route::get('/etat_depense/{typeDepense}/{depense}', 'DepenseController@etat_show_depense')->name('etat_depense.show');

//tiut sur les projets
Route::get('/projet', 'ProjetController@index')->name('projet');

// validations depenses

Route::get('/validate-depense/{id}', 'DepenseController@validate_depense')->name('depense.validate');
Route::get('/rejet-depense/{id}', 'DepenseController@rejet_depense')->name('depense.rejet');
Route::get('/list_d_invalid', 'DepenseController@list_depense_invalid')->name('d.invalid');
Route::get('/invalid_detail/{depense}', 'DepenseController@show_depense_invalid')->name('invalid_dep.show');

// validations recettes
Route::get('/invalid_r', 'RecetteController@list_recette_invalid')->name('recette.invalid');
Route::get('/validate-recette/{id}', 'RecetteController@validate_recette')->name('recette.validate');
Route::get('/rejet-recette/{id}', 'RecetteController@rejet_recette')->name('recette.rejeter');
Route::get('/invalid_show/{recette}', 'RecetteController@show_recette_invalid')->name('invalid.show');
