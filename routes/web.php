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

Route::get('/', 'Index\IndexController@index')->name('index');
/**
 * V2
 */
Route::get('article/{link}', 'User\Article\ArticleController@articleByLink')->name('show.article');
Route::get('artikel/{link}', 'User\Article\ArticleController@articleByLink');

/**
 * v1
 */
Route::get('login', function () {
    return view('user.registration.login');
})->name('login.get');
Route::post('login', 'User\UserController@loginPost');
Route::get('logout', 'User\UserController@logout');


Route::get('register', function () {
    return view('user.registration.create_account');
})->name('register.get');
Route::post('register-user', 'User\UserController@registerPost');

Route::get('register-scholarship', 'Scholarship\ScholarshipController@getRegisterScholarship');
Route::post('register-empowerment', 'Scholarship\ScholarshipController@registerEmpowermentPost');
Route::post('register-scholarship', 'Scholarship\ScholarshipController@registerScholarshipPost');

Route::get('test', 'Scholarship\ScholarshipController@test');

Route::get('participant-print', function () {
    return view('print.participant_pdf');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['role:admin']], function () {

    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('list', 'AdminController@list')->name('list');
    Route::get('detail/{id}', 'AdminController@detailUser');
    Route::get('download-zip/{id}/{name}', 'AdminController@downloadZip');
    Route::get('download-all-files', 'AdminController@downloadall');
    Route::get('search', 'AdminController@search');
    //Print to PDF
    Route::get('print-to-pdf/{id}', 'AdminController@printToPdf');

    //print to Printer
    Route::get('print-to-printer/{id}', 'AdminController@printToPrinter');

    //Export to Excel
    Route::get('export-pemberdayaan-to-excel', 'AdminController@exportPemberdayaanToExcel');
    Route::get('export-beasiswa-to-excel', 'AdminController@exportScholarshipToExcel');

    //new features
    Route::get('banner', 'BannerController@index')->name('banner');
    Route::post('banner', 'BannerController@addBanner');
    Route::get('banner/show/{id}', 'BannerController@viewBanner');
    Route::get('banner/unshow/{id}', 'BannerController@unViewBanner');
    Route::delete('banner', 'BannerController@delete')->name('banner.destroy');
    Route::post('banneredit', 'BannerController@updateBanner')->name('bannerupdate');
    Route::get('banner/edit/{id}', 'BannerController@getEdit');

    //Kegitana
    Route::get('kegiatan', 'Kegiatan\KegiatanController@index');
    Route::post('kegiatan', 'Kegiatan\KegiatanController@store')->name('kegiatan.add');
    Route::get('kegiatan/add', function (){
        return view('admin.kegiatan.add_kegiatan');
    });

    //Informasi
    Route::get('informasi', 'Informasi\InformasiController@index');
    Route::post('informasi', 'Informasi\InformasiController@store')->name('informasi.add');
    Route::get('informasi/add', function (){
        return view('admin.informasi.add_informasi');
    })->name('informasi.get.add');

    //Pendaftaran
    Route::get('pendaftaran', 'Pendaftaran\PendaftaranController@index')->name('pendaftaran');
    Route::post('pendaftaran/open', 'Pendaftaran\PendaftaranController@openPendaftaran')->name('pendaftaran.open');
    Route::post('pendaftaran/close', 'Pendaftaran\PendaftaranController@closePendaftaran')->name('pendaftaran.close');
    Route::post('pendaftaran', 'Pendaftaran\PendaftaranController@store')->name('pendaftaran.store');
    Route::get('pendaftaran/add', function (){
        return view('admin.pendaftaran.add_pendaftaran');
    })->name('pendaftaran.get.add');


    //UPLOAD FILES
    Route::get('files', 'UploadFileFdf\UploadFileFdfController@index')->name('files.get');
    Route::post('files', 'UploadFileFdf\UploadFileFdfController@updloadFile')->name('uploadfile');
    Route::get('files/download', 'UploadFileFdf\UploadFileFdfController@download')->name('files.download');
    Route::get('files/del', 'UploadFileFdf\UploadFileFdfController@deleteFile')->name('files.delete');
    Route::get('files/hide/{id}', 'UploadFileFdf\UploadFileFdfController@hideFile')->name('files.hide');

});

//Route::get('/home', 'HomeController@index')->name('home');
