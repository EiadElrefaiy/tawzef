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


Route::get('company/login-form', [App\Http\Controllers\Auth\Company\LoginController::class, 'showLoginForm'])->name('get-company.login');
Route::post('company/login', [App\Http\Controllers\Auth\Company\LoginController::class, 'login'])->name('company.login');
Route::get('company/register-form', [App\Http\Controllers\Auth\Company\RegisterController::class, 'showRegistrationForm'])->name('get-company.register');
Route::post('company/register', [App\Http\Controllers\Auth\Company\RegisterController::class, 'register'])->name('company.register');
Route::get('company/logout', [App\Http\Controllers\Auth\Company\LogoutController::class, 'logout'])->name('company.logout');


Route::get('graduation/login-form', [App\Http\Controllers\Auth\Graduation\LoginController::class, 'showLoginForm'])->name('get-graduation.login');
Route::post('graduation/login', [App\Http\Controllers\Auth\Graduation\LoginController::class, 'login'])->name('graduation.login');
Route::get('graduation/register-form', [App\Http\Controllers\Auth\Graduation\RegisterController::class, 'showRegistrationForm'])->name('get-graduation.register');
Route::post('graduation/register', [App\Http\Controllers\Auth\Graduation\RegisterController::class, 'register'])->name('graduation.register');
Route::get('graduation/logout', [App\Http\Controllers\Auth\Graduation\LogoutController::class, 'logout'])->name('graduation.logout');



/*
Route::get('/',  [App\Http\Controllers\Website\HomeController::class, 'getAllData'])->name('home');
Route::get('locale/{locale}', [App\Http\Controllers\Website\LocaleController::class, 'switchLocale'])->name('locale.switch');
Route::post('/create-newsletter', [App\Http\Controllers\CRUD\CreateController::class, 'createNewsLetter'])->name('newsletter.create');
Route::post('/create-message', [App\Http\Controllers\CRUD\CreateController::class, 'createMessage'])->name('messages.create');
*/

    Route::get('/', function () {
        return view('index');
    })->name('index');

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

Route::get('/jobs/add', [App\Http\Controllers\Jobs\CreateJob::class, 'add'])->name('jobs.add');
Route::get('/jobs/edit/{id}', [App\Http\Controllers\Jobs\UpdateJob::class, 'edit'])->name('jobs.edit');
Route::get('/jobs/company-jobs', [App\Http\Controllers\Jobs\ReadJobs::class, 'index'])->name('jobs.company');
Route::post('/jobs/store', [App\Http\Controllers\Jobs\CreateJob::class, 'create'])->name('jobs.store');
Route::post('/jobs/update/{id}', [App\Http\Controllers\Jobs\UpdateJob::class, 'update'])->name('jobs.update');
Route::delete('/jobs/delete', [App\Http\Controllers\Jobs\DeleteJob::class, 'delete'])->name('jobs.delete');


Route::get('/company/profile', [App\Http\Controllers\Companies\ProfileCompany::class, 'profile'])->name('company.profile');
Route::get('/graduation/info', [App\Http\Controllers\Graduations\ProfileGraduation::class, 'info'])->name('graduation.info');
Route::get('/graduation/profile', [App\Http\Controllers\Graduations\ProfileGraduation::class, 'profile'])->name('graduation.profile');
Route::post('/graduation/update/{id}', [App\Http\Controllers\Graduations\ProfileGraduation::class, 'update'])->name('graduation.update');

