<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Developer\DeveloperController;
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\Employer\RecruitmentController;
use App\Http\Controllers\Developer\ProfileController;

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



    Route::resource('/cv',ProfileController::class);
    Route::delete('delete-exp',[ProfileController::class,'deleteExp'])->name('delete-exp');
    Route::get('cv/pdf/{id}',[ProfileController::class,'print_profile'])->name('print-pdf');
});

Route::get('/', [DeveloperController::class, 'index'])->name('developer');
Route::get('tim-viec/{slug}',[DeveloperController::class,'post_info'])->name('show-post-info');


Route::prefix('employer')->group(function (){

    Route::middleware('empl')->group(function (){
        Route::get('/', [EmployerController::class, 'index'])->name('empl');
        Route::get('tai-khoan',[EmployerController::class,'showAccount'])->name('show-account-epl');
        Route::put('tao',[EmployerController::class,'account'])->name('account-epl');

        Route::resource('/post',RecruitmentController::class);


        Route::get('logout',[AuthController::class,'logout'])->name('logout-emp');
    });


    Route::get('login',[AuthController::class,'showFormLogin'])->name('show-login-emp');
    Route::post('login',[AuthController::class,'login'])->name('login-emp');

    Route::get('register',[AuthController::class,'showFormRegister'])->name('show-register-emp');
    Route::post('register',[AuthController::class,'register'])->name('register-emp');

});
