<?php

use App\Http\Controllers\FreelanceContentIdeasController as ControllersFreelanceContentIdeasController;
use App\Http\Controllers\FreelanceKeywordsController as ControllersFreelanceKeywordsController;
use App\Http\Controllers\Web\FreelanceContentIdeasController;
use App\Http\Controllers\Web\FreelanceKeywordsController;
use App\Http\Controllers\Web\ContenIdeaController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\FreelanceController;
use App\Http\Controllers\Web\KeywordsController;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class,'index'])->name('login.index');
Route::post('/login', [LoginController::class,'store'])->name('login.store');
Route::post('/logout', [LoginController::class,'logout'])->name('login.logout');
Route::get('/coba', [DashboardController::class,'coba']);


Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class,'admin']);
    Route::resource('/admin/keywords', KeywordsController::class)->names('admin.keywords');
    Route::resource('/admin/content-ideas', ContenIdeaController::class)->names('admin.contents');
    Route::resource('/admin/freelancers', FreelanceController::class)->names('admin.freelancers');
    
    Route::get('/freelance-detail/{id}/keywords', [FreelanceController::class,'detail_keywords']);
    Route::get('/freelance-detail/{id}/content-ideas', [FreelanceController::class,'detail_content']);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});
Route::middleware('freelance')->group(function () {
    Route::get('/freelance/dashboard', [DashboardController::class,'freelance']);
});
Route::resource('/freelance/keywords', ControllersFreelanceKeywordsController::class)->names('freelance');
Route::resource('/freelance/content-ideas', ControllersFreelanceContentIdeasController::class)->names('contents');


