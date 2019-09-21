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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','PagesController@index')->name('index');
Route::get('/about','PagesController@about')->name('about');
Route::get('/contact','PagesController@contact')->name('contact');
Route::get('/team','PagesController@team')->name('team');
Route::get('/add','PagesController@addemployee')->name('addemployee');
Route::post('/add','EmployeeController@store')->name('add');
Route::get('/alllist','EmployeeController@index')->name('alllist');

 Route::post('/update/{id}', 'EmployeeController@update')->name('update');
  Route::get('/edit/{id}', 'EmployeeController@edit')->name('edit');
  Route::post('/delete/{id}', 'EmployeeController@delete')->name('delete');