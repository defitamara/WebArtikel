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

// Route::get('/', function () {
//     return view('frontend.home');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/dbpenulis', [App\Http\Controllers\HomeController::class, 'dbpenulis'])->name('dbpenulis');


Route::group(['namespace' => 'Frontend'], function()
{

    Route::get('/', 'HomeController@index');
    Route::get('/{id}/detailartikel','HomeController@detailartikel');

});

Route::group(['namespace' => 'Backend'], function()
{
    // CRUD Data User Admin
    Route::resource('/data_admin', 'DataUserAdminController');
    Route::POST('/data_admin/store','DataUserAdminController@store')->name('data_user.store');
    Route::match(['get','post'], '/data_admin/edit/{id}','DataUserAdminController@edit');
    Route::GET('/data_admin/destroy/{id}','DataUserAdminController@destroy');
    Route::match(['get','post'], '/data_admin/ubahpw/{id}','DataUserAdminController@ubahpw')->name('data_admin.ubahpw');
    Route::PUT('/data_admin/ubahpw/{id}/simpan','DataUserAdminController@ubahpassword')->name('data_admin.ubahpassword');
    Route::get('/cetakpdf/data_admin','DataUserAdminController@cetakpdf')->name('data_admin.cetakpdf');

    // CRUD Data Artikel
    Route::resource('data_artikel','ArtikelController');
    Route::get('/data_artikel/{id}/detail','ArtikelController@detail');
    Route::POST('/data_artikel/store','ArtikelController@store')->name('data_artikel.store');
    Route::match(['get','post'], '/data_artikel/edit/{id}','ArtikelController@edit');
    Route::GET('/data_artikel/destroy/{id}','ArtikelController@destroy');
    Route::get('/cetakpdf/data_artikel','ArtikelController@cetakpdf')->name('data_artikel.cetakpdf');

    // CRUD Data Buku
    // Route::resource('data_buku','BukuController');
    // Route::get('/data_buku/{id}/detail','BukuController@detail');
    // Route::POST('/data_buku/store','BukuController@store')->name('data_buku.store');
    // Route::match(['get','post'], '/data_buku/edit/{id}','BukuController@edit');
    // Route::GET('/data_buku/destroy/{id}','BukuController@destroy');
    // Route::get('/cetakpdf/data_buku','BukuController@cetakpdf')->name('data_buku.cetakpdf');
});

Route::group(['namespace' => 'Penulis'], function()
{
    
    // CRUD Data Artikel
    Route::resource('dt_artikel','ArtikelController');
    Route::get('/dt_artikel/{id}/detail','ArtikelController@detail');
    Route::POST('/dt_artikel/store','ArtikelController@store')->name('dt_artikel.store');
    Route::match(['get','post'], '/dt_artikel/edit/{id}','ArtikelController@edit');
    Route::GET('/dt_artikel/destroy/{id}','ArtikelController@destroy');
    Route::get('/cetakpdf/dt_artikel','ArtikelController@cetakpdf')->name('dt_artikel.cetakpdf');

});
