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
Route::post('/addd','EmployeeController@store')->name('add');
Route::get('/alllist','EmployeeController@index')->name('alllist');

Route::post('/update/{id}', 'EmployeeController@update')->name('update');
Route::get('/edit/{id}', 'EmployeeController@edit')->name('edit');
Route::post('/delete/{id}', 'EmployeeController@delete')->name('delete');


Route::get('login', 'AuthController@login');
Route::post('loginstore','AuthController@loginstore')->name('loginstore');


Route::group(['middleware' => 'checkloggedin'], function(){
    // YOUR ROUTES HERE
    Route::get('dashboard','AuthController@dashboard');
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::group(['middleware' => 'isteacher'], function(){
    // YOUR ROUTES HERE
	    Route::get('teacher','AuthController@dashboard')->name('teacher.index');
	});
	Route::group(['middleware' => 'isstudent'], function(){
    // YOUR ROUTES HERE
	     Route::get('student','AuthController@dashboard')->name('student.index');
	});

	Route::group(['middleware' => 'isadmin'], function(){
    // YOUR ROUTES HERE
	    Route::get('admin','AuthController@admin')->name('admin.index');
	    Route::get('admin/table','AuthController@admin_table')->name('admin.table');
	    Route::get('admin/chart','AuthController@admin_chart')->name('admin.chart');
	    Route::get('admin/addstudentform','AuthController@formview')->name('admin.form');
	    Route::get('admin/addstudentpp','AuthController@imageadd')->name('student.photo');

	    //excel
	    Route::get('admin/excel','AuthController@excel')->name('excel.index');
	    Route::post('admin/import','EmployeeController@import')->name('excel.import');
	    Route::get('admin/exceldownload/{id}','EmployeeController@export')->name('student.export');
	    Route::get('admin/exceldownload/{id}','EmployeeController@export')->name('teacher.export');
	    Route::get('admin/exceldownload/{id}','EmployeeController@export')->name('admin.export');

	    Route::post('admin/addstudent','EmployeeController@store')->name('student.add');
	    Route::post('admin/storestudentpp','EmployeeController@addphoto')->name('student.photo.add');

      //PDF
        Route::get('admin/pdf/', 'EmployeeController@pdfindex')->name('pdf.index');
        Route::get('admin/pdf/{id}', 'EmployeeController@generateInvoice')->name('admin.employee.pdf');

	});
});
