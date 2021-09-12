<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
})->name('/');
Route::get('/about', function () {
    return view('about');
})->name('about');

// Route::get('/', [Controller::class, 'index'])->name('/');

// Process Login
Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
Route::post('/login/process', [AuthController::class, 'loginProcess'])->name('login-process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Process Registrasi
Route::get('/register', [AuthController::class, 'indexRegister'])->name('register');
Route::post('registrasi/process', [AuthController::class, 'registrasi'])->name('registrasi-process');


Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['cek_login:1']], function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
        
        Route::get('/admin/list', [AdminController::class, 'listSubmissions'])->name('list-submissions');
        Route::get('/admin/detail/{id}', [AdminController::class, 'show'])->name('detail-submissions');

        // Filter List Submissions
        Route::get('/admin/list/{value}', [AdminController::class, 'submissionsFilter'])->name('submissions-filter');


        // Validation Submissions
        Route::get('/admin/validation/{id}/{status}', [AdminController::class, 'validation'])->name('validation');
        Route::get('/admin/validation/{value}', [AdminController::class, 'validationFilter'])->name('validation-filter');
        
        // print submissions
        Route::get('/admin/print/{id}', [AdminController::class, 'printShow'])->name('print-show');

        // Report Submissions
        Route::get('/admin/report',[AdminController::class, 'report'])->name('report');
        Route::get('/admin/report/pdf', [AdminController::class, 'reportPdf'])->name('report-pdf');
    });

    Route::group(['middleware' => ['cek_login:0']], function () {
        // Show Dashboard User
        Route::get('/user/dashboard', [UserController::class, 'index'])->name('user-dashboard');

        // create submisssion
        Route::post('/submission', [DocumentController::class, 'store'])->name('submission');

        // History Submission
        Route::get('/user/dashboard/history', [DocumentController::class, 'history'])->name('history');

        Route::get('/document/{value}', [DocumentController::class, 'index'])->name('document');

        // Download Document
        Route::get('/user/print/{id}',[DocumentController::class, 'downloadPdf'])->name('download-pdf');
        
    });
});
