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
    return view('home');
});

Route::get('login', function () {
    return view('auth.login');
});
Route::post('login', 'User\UserController@loginPost');
Route::get('logout', 'User\UserController@logout');


Route::get('register', function () {
    return view('auth.register');
});
Route::post('register-user', 'User\UserController@registerPost');

Route::get('register-scholarship', 'Scholarship\ScholarshipController@getRegisterScholarship');
Route::post('register-empowerment', 'Scholarship\ScholarshipController@registerEmpowermentPost');
Route::post('register-scholarship', 'Scholarship\ScholarshipController@registerScholarshipPost');

Route::get('test', 'Scholarship\ScholarshipController@test');

Route::get('participant-print', function(){
    return view('print.participant_pdf');
});


Route::get('search', 'Admin\AdminController@search');
Route::group(['prefix' => 'admin', 'namespace'=>'Admin', 'middleware'=> ['role:admin']], function (){
   Route::get('/', function (){
      return view('admin_home');
   });
   Route::get('detail/{id}', 'AdminController@detailUser');
   Route::get('download-zip/{id}/{name}', 'AdminController@downloadZip');
   Route::get('download-all-files', 'AdminController@downloadall');

   //Print to PDF
    Route::get('print-to-pdf/{id}', 'AdminController@printToPdf');

    //Export to Excel
    Route::get('export-pemberdayaan-to-excel', 'AdminController@exportPemberdayaanToExcel');
    Route::get('export-beasiswa-to-excel', 'AdminController@exportScholarshipToExcel');
});

//Route::get('/home', 'HomeController@index')->name('home');
