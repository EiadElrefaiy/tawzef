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

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');

/*
Route::get('/',  [App\Http\Controllers\Website\HomeController::class, 'getAllData'])->name('home');
Route::get('locale/{locale}', [App\Http\Controllers\Website\LocaleController::class, 'switchLocale'])->name('locale.switch');
Route::post('/create-newsletter', [App\Http\Controllers\CRUD\CreateController::class, 'createNewsLetter'])->name('newsletter.create');
Route::post('/create-message', [App\Http\Controllers\CRUD\CreateController::class, 'createMessage'])->name('messages.create');
*/
Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [App\Http\Controllers\DashHomeController::class, 'getAllData'])->name('dashboard');
        
    Route::get('dashboard/index', [App\Http\Controllers\CRUD\ReadController::class, 'index'])->name('index');
    Route::get('dashboard/read', [App\Http\Controllers\CRUD\ReadController::class, 'read'])->name('read');
    Route::post('dashboard/create', [App\Http\Controllers\CRUD\CreateController::class, 'create'])->name('create');
    Route::get('dashboard/edit', [App\Http\Controllers\CRUD\UpdateController::class, 'edit'])->name('edit');
    Route::post('dashboard/update', [App\Http\Controllers\CRUD\UpdateController::class, 'update'])->name('update');
    Route::post('dashboard/update-profile', [App\Http\Controllers\Profile\ProfileController::class, 'update'])->name('update_profile');
    Route::post('dashboard/change-password', [App\Http\Controllers\Profile\ProfileController::class, 'changePassword'])->name('update_password');
    Route::post('dashboard/delete', [App\Http\Controllers\CRUD\DeleteController::class, 'delete'])->name('delete');
    Route::post('dashboard/send-emails', [App\Http\Controllers\CRUD\NewsletterController::class, 'sendEmails'])->name('sendEmails');

});