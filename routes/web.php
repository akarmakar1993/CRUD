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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create_ticket/{id?}', 'TicketController@create');
Route::post('/add_ticket', 'TicketController@store')->name('add_ticket');
Route::get('/list_ticket', 'TicketController@index')->name('list_ticket');
Route::get('/show_ticket/{id}', 'TicketController@show')->name('show_ticket');
Route::get('/delete_ticket/{id}', 'TicketController@destroy')->name('delete_ticket');
Route::post('/update_ticket/{id}', 'TicketController@update')->name('update_ticket');

//------------ User Routes ------------//

Route::get('/user_profile', 'UserController@showUser')->name('user_profile');
Route::get('/create/edit_profile/{id?}', 'UserController@createEdit')->name('create_edit');


//------------ Admin Routes -----------//

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
