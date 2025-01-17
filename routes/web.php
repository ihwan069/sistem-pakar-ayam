<?php

use App\Http\Controllers\ConsultationcfController;
use App\Http\Controllers\ConsultationdsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\EvidencedsController;
use App\Http\Controllers\HypothesisController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HypothesisdsController;
use App\Http\Controllers\RoledsController;
use App\Http\Controllers\WellcomeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::group(['middleware' => ['level:admin,user', 'auth']], function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::resource('/evidence', EvidenceController::class);
  Route::resource('/evidence_ds', EvidencedsController::class);

  Route::resource('/hypothesis', HypothesisController::class);
  Route::resource('/hypothesis_ds', HypothesisdsController::class);

  Route::get('/role', [RoleController::class, 'index'])->name('role.index');
  Route::post('/store-role', [RoleController::class, 'store'])->name('role.store');


  Route::get('/role-ds', [RoledsController::class, 'index'])->name('role_ds.index');
  Route::post('/store-role-ds', [RoledsController::class, 'store'])->name('role_ds.store');

  Route::get('/role-data', [RoledsController::class, 'index_ds'])->name('role_data.index');
  Route::get('/role-create', [RoledsController::class, 'create'])->name('role_ds.create');
  Route::get('/role-edit/{id}', [RoledsController::class, 'edit'])->name('role_ds.edit');
  Route::put('/role-update/{id}', [RoledsController::class, 'update'])->name('role_ds.update');
  Route::post('/store-role-data', [RoledsController::class, 'store_ds'])->name('role_data.store');
  Route::delete('/role-data/{id}', [RoledsController::class, 'destroy'])->name('role_ds.destroy');

  Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
  Route::post('/setting', [SettingController::class, 'save'])->name('setting.save');
  Route::post('/value', [SettingController::class, 'saveValue'])->name('value.save');
  Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
  Route::patch('/profile/{user}', [DashboardController::class, 'profile_update'])->name('profile.update');

  Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
  Route::get('/history_ds', [HistoryController::class, 'index_ds'])->name('history_ds.index');
  Route::delete('/history_ds/{id}', [HistoryController::class, 'destroy_ds'])->name('history_ds.destroy');
  Route::delete('/history_cf/{id}', [HistoryController::class, 'destroy_cf'])->name('history_cf.destroy');

  Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['level:admin', 'auth']], function () {
  Route::resource('/user', UserController::class);
});

Route::middleware(['guest'])->group(function () {
  Route::get('/login', [DashboardController::class, 'login'])->name('login');
  Route::post('/login-process', [DashboardController::class, 'login_process'])->name('login_process');
});

Route::get('/', [WellcomeController::class, 'index'])->name('spakarayam');

Route::get('/expert-system', [DashboardController::class, 'expert_system'])->name('expert-system');
Route::post('/expert-system', [DashboardController::class, 'expert_system_post'])->name('expert-system-post');

Route::get('/consultation_cf', [ConsultationcfController::class, 'expert_system'])->name('expert-system-consultation');
Route::post('/consultation_cf_result', [ConsultationcfController::class, 'expert_system_post'])->name('expert-system-post-consultation');

Route::get('/consultation_ds', [ConsultationdsController::class, 'index'])->name('consultation-dempster');
Route::post('/consultation_ds_result', [ConsultationdsController::class, 'prosesDiagnosa'])->name('consultation-diagnosa');
