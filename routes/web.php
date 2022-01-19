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

Route::get('/', function()
{
    return view('utama');
});



Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [App\Http\Controllers\AuthController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
#test
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index']);
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store']);
Route::get('/registersiswa', [App\Http\Controllers\SiteController::class, 'index']);

Route::group(['middleware' => ['auth','checkrole:Admin']],function(){
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index']);
    Route::post('/siswa/create', [App\Http\Controllers\SiswaController::class, 'create']);
    Route::get('/siswa/{siswa}/edit', [App\Http\Controllers\SiswaController::class, 'edit']);
    Route::post('/siswa/{siswa}/update', [App\Http\Controllers\SiswaController::class, 'update']);
    Route::get('/siswa/{id}/delete', [App\Http\Controllers\SiswaController::class, 'delete']);
    Route::get('/siswa/{siswa}/detail', [App\Http\Controllers\SiswaController::class, 'detail']);
    Route::post('/siswa/{id}/addnilai', [App\Http\Controllers\SiswaController::class, 'addnilai']);
    Route::get('/siswa/export', [App\Http\Controllers\SiswaController::class, 'export']);
    Route::get('/siswa/exportpdf', [App\Http\Controllers\SiswaController::class, 'exportpdf'] );

});

Route::group(['middleware' => ['auth','checkrole:Admin,Siswa']],function()
    {
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
        Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index']);
    });
