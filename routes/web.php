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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//profile

Route::get('/profile', 'Web\ProfileController@index' )->name('profile');
Route::put('/profile/update', 'Web\ProfileController@update' )->name('profile.update');


//notes

Route::get('/notes', 'Web\NoteController@index' )->name('notes');
Route::post('/note/create', 'Web\NoteController@create' )->name('note.create');
Route::post('/note/store', 'Web\NoteController@store' )->name('note.store');
Route::get('/note/show/{id}', 'Web\NoteController@show' )->name('note.show');
Route::get('/note/edit/{id}', 'Web\NoteController@edit' )->name('note.edit');
Route::put('/note/update/{id}', 'Web\NoteController@update' )->name('note.update');
Route::get('/note/destroy/{id}', 'Web\NoteController@destroy' )->name('note.destroy');

/*
//task

Route::resource('/tasks', 'Web\ToDoListController' );

//brithday

    Route::resource('brithdays', 'Web\brithdayController');
//event

    Route::resource('events', 'Web\eventController');

 //Tag
    
    Route::resource('tag', 'Web\TagController');

    //notbook
    
   // Route::resource('notebook', 'Web\NoteBookController');
 
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
