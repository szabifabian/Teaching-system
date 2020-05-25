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

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');

Route::get('/public/subjects', 'SubjectsController@indexAll')->name('subjects-list')->middleware('auth'); //a diák oldalra, ahol ki vannak listázva a publikus tárgyak

Route::get('/subject/new', 'SubjectsController@indexAdd')->name('add-new-subject-form')->middleware('auth');
Route::post('/subject/new', 'SubjectsController@validateAddNewSubject')->name('add-new-subject-post')->middleware('auth');

//Tárgy módosítása, majd az alapján a frissítése
Route::get('/subject/edit/{id}', 'SubjectsController@edit')->name('edit-subject')->middleware('auth');
Route::post('/subject/edit', 'SubjectsController@validateEditSubject')->name('update-subject-post')->middleware('auth');

//Tárgy törlése (soft delete módszerrel)
Route::get('/subject/{id}/delete', 'SubjectsController@delete')->name('delete-subject')->middleware('auth');

//Tárgy információi 
Route::get('/subject/{id}', 'SubjectsController@info')->name('subject-info')->middleware('auth');

//Tárgy publikusságán lehet változtatni
Route::get('/subject/{id}/setPublicity', 'SubjectsController@setPublicity')->name('setPublicity')->middleware('auth');


//diák feliratkozik egy tárgyra
Route::get('/subject/{id}/selectSubject', 'SubjectsController@selectSubject')->name('selectSubject')->middleware('auth');

//diák leiratkozik egy tárgyról
Route::get('/subject/{id}/unselectSubject', 'SubjectsController@unselectSubject')->name('unselectSubject')->middleware('auth');


//MÁSODIK FELVONÁSTÓL BEVITT ROUTE-OK

//feladatok oldal
Route::get('/tasks', function () {
    return view('tasks');
})->name('tasks')->middleware('auth');


Route::get('/task/new/{id}', 'TasksController@indexAddTask')->name('add-new-task-form')->middleware('auth');
Route::post('/task/new/{id}', 'TasksController@validateTask')->name('add-new-task-post')->middleware('auth');
