<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Developer\DeveloperController;
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\Employer\RecruitmentController;
use App\Http\Controllers\Developer\ProfileController;
use App\Http\Controllers\Admin\AdminController;


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
});

Auth::routes();

//Route::namespace('Auth')->group(function() {
//    Route::get('/', [DeveloperControll::class, 'index'])->name('developer');
//    Route::get('/empl', [EmployerController::class, 'index'])->name('empl');
//    Route::get('/login',[AuthController::class,'showFormLogin'])->name('show-form-login');
//    Route::post('/login',[AuthController::class,'login'])->name('login');

//});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth'])->group(function () {
    Route::get('tai-khoan',[DeveloperController::class,'showAccount'])->name('show-account');
    Route::put('tao',[DeveloperController::class,'account'])->name('account');

    Route::get('viec-da-luu',[DeveloperController::class,'save_post'])->name('save-post');

    Route::post('apply',[DeveloperController::class,'apply'])->name('apply');

    Route::post('remove-notify',[DeveloperController::class,'removeNotify'])->name('remove-notify');

    Route::resource('/cv',ProfileController::class);
    Route::delete('delete-exp',[ProfileController::class,'deleteExp'])->name('delete-exp');
    Route::get('cv/pdf/{id}',[ProfileController::class,'print_profile'])->name('print-pdf');

});

Route::get('/', [DeveloperController::class, 'index'])->name('developer');
Route::get('tim-viec/{slug}',[DeveloperController::class,'post_info'])->name('show-post-info');

Route::post('tim-kiem',[DeveloperController::class,'search'])->name('search');
Route::post('tim-kiem-nc',[DeveloperController::class,'search_high'])->name('search_high');

Route::get('get-more-post',[DeveloperController::class,'getMorePost'])->name('get-more-post');



Route::prefix('employer')->group(function (){

    Route::middleware('empl')->group(function (){
        Route::get('/', [EmployerController::class, 'index'])->name('empl');
        Route::get('tai-khoan',[EmployerController::class,'showAccount'])->name('show-account-epl');
        Route::put('update_account_employer',[EmployerController::class,'account'])->name('account-epl');

        Route::resource('/post',RecruitmentController::class);

        Route::get('/update-status-candidate',[EmployerController::class,'statusCandidate'])->name('update-status-candidate');
//        Route::get('/search-candidate',[EmployerController::class,'searchCandidate'])->name('search-candidate');
        Route::get('/filer-status',[EmployerController::class,'filterStatus'])->name('filter-status');
        Route::post('/xuat-excel',[EmployerController::class,'exportExcel'])->name('export-excel');

        Route::get('/ung-vien',[EmployerController::class,'showCandidate'])->name('show-candidate');
        Route::delete('/delete-candidate/{id}',[EmployerController::class,'deleteCandidate'])->name('delete-candidate');

        Route::get('/thong-ke',[EmployerController::class,'showStatistic'])->name('show-statistic');
        Route::post('/statistics-candidate',[EmployerController::class,'statisticsCandidate'])->name('statistics-candidate');


        Route::get('logout',[AuthController::class,'logout'])->name('logout-emp');
    });

    Route::get('login',[AuthController::class,'showFormLogin'])->name('show-login-emp');
    Route::post('login',[AuthController::class,'login'])->name('login-emp');

    Route::get('register',[AuthController::class,'showFormRegister'])->name('show-register-emp');
    Route::post('register',[AuthController::class,'register'])->name('register-emp');

});

Route::prefix('adm')->group(function (){
    Route::middleware('admin')->group(function (){
        Route::get('/',[AdminController::class,'index'])->name('admin');
        Route::get('/tai-khoan-nguoi-tim-viec',[AdminController::class,'showUserDeveloper'])->name('show-user-developer');
        Route::get('/tai-khoan-nha-tuyen-dung',[AdminController::class,'showUserEmployer'])->name('show-user-employer');

        Route::get('/update-status',[AdminController::class,'updateStatus'])->name('update-status');
        Route::get('/tai-khoan-nha-tuyen-dung/{id}',[AdminController::class,'infoUserEmployer'])->name('info-user-employer');


        Route::get('logout',[AuthController::class,'logoutAdmin'])->name('logout-admin');

    });

    Route::get('login',[AuthController::class,'showFormLoginAdmin'])->name('show-login-admin');
    Route::post('login',[AuthController::class,'loginAdmin'])->name('login-admin');


});


