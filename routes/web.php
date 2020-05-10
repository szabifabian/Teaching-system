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

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/subject/list', 'SubjectsController@indexAll')->name('subjectsList'); //majd a diák oldalra fog ez a route kelleni

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');


Route::get('/subject/new', 'SubjectsController@indexAdd')->name('add-new-subject-form');
Route::post('/subject/new', 'SubjectsController@validateAddNewSubject')->name('add-new-subject-post');

//Tárgy módosítása, majd az alapján a frissítése
Route::get('/subject/edit/{id}', 'SubjectsController@edit')->name('edit-subject');
Route::post('/subject/edit', 'SubjectsController@validateEditSubject')->name('update-subject-post');

//Tárgy törlése (soft delete módszerrel)
Route::get('/subject/{id}/delete', 'SubjectsController@delete')->name('delete-subject');

//Tárgy információi 
Route::get('/subject/{id}', 'SubjectsController@info')->name('subject-info');

//Tárgy publikusságán lehet változtatni
Route::get('/subject/{id}/setPublicity', 'SubjectsController@setPublicity')->name('setPublicity');