<?php

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
    return view('welcome');
});

Route::get('/template', function () {
    return view('template');
});

Route::resource('professeur', 'ProfesseurController');

Route::delete('professeur/force/{professeur}', 'ProfesseurController@forceDestroy')->name('professeur.force.destroy');
Route::put('professeur/restore/{professeur}', 'ProfesseurController@restore')->name('professeur.restore');

Route::get('category/{slug}/professeur', 'ProfesseurController@index')->name('professeur.category');

Route::get('/catShow', function () {
    return view('catShow');
});