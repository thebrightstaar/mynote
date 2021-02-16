<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {   return $request->user();  });
//register and login
    Route::post('register', 'API\AuthController@register');
    Route::post('login', 'API\AuthController@login');




Route::middleware('auth:api')->group( function (){
//profile
    Route::get('/profile', 'API\ProfileController@index');
    Route::get('/profile/update', 'API\ProfileController@update');
//notes

    Route::resource('notes', 'API\NotesController');
/*
//tasks

    Route::resource('tasks', 'API\ToDoListController');

//brithday
   // Route::resource('brithdays', 'API\brithdayController');
//event
   // Route::resource('events', 'API\eventController');

    //Tag
    Route::resource('tag', 'API\TagController');
    //notebook
    Route::resource('notebook', 'API\NoteBookController');*/
});
