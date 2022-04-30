<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Developer\DeveloperController;
use App\Http\Controllers\Employer\EmployerController;

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
//    Route::get('/employer', [EmployerController::class, 'index'])->name('employer');
//    Route::get('/login',[AuthController::class,'showFormLogin'])->name('show-form-login');
//    Route::post('/login',[AuthController::class,'login'])->name('login');

//});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth'])->group(function () {
    Route::get('tai-khoan',[DeveloperController::class,'showAccount'])->name('show-account');
    Route::put('tao',[DeveloperController::class,'account'])->name('account');


    Route::get('tao-cv',[DeveloperController::class,'createCV'])->name('createCV');
});

Route::get('/', [DeveloperController::class, 'index'])->name('developer');


Route::prefix('employer')->group(function (){
    Route::get('/', [EmployerController::class, 'index'])->name('employer');

    Route::get('login',[AuthController::class,'showFormLogin'])->name('show-login-emp');
    Route::post('login',[AuthController::class,'login'])->name('login-emp');

    Route::get('register',[AuthController::class,'showFormRegister'])->name('show-register-emp');
    Route::post('register',[AuthController::class,'register'])->name('register');

    Route::get('logout',[AuthController::class,'logout'])->name('logout-emp');
});
