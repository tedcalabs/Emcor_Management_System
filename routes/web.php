<?php

use App\Models\Technician;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Admin\TechnicianController;
use App\Http\Controllers\AdminPanel\AdminUserController;


/*---------Admin Route---------*/


Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'Index'])->name('login_form');

    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');

    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name(
        'admin.dashboard'
    )->middleware('admin');




    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name(
        'admin.logout'
    )->middleware('admin');

    Route::get('/registered', [AdminController::class, 'Register'])->name('registeredA');

    Route::post('/registered/create', [AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');



    Route::resource('/categories', CategoryController::class)->middleware('admin');
    Route::resource('/requests', RequestController::class)->middleware('admin');
    Route::resource('/sales', SalesController::class)->middleware('admin');
    Route::resource('/services', ServiceController::class)->middleware('admin');
    Route::resource('/technicians', TechnicianController::class)->middleware('admin');
    Route::resource('/secretaries', TechnicianController::class)->middleware('admin');
    Route::resource('/users', UserController::class)->middleware('admin');













    //USER ROUTES------------------------------- -----------------------  ------------------------


    Route::prefix('/user')->name('user')->controller(AdminUserController::class)->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('/edit/{id}', 'show')->name('edit');
        Route::get('/show/{id}', 'show')->name('show');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
});


/*---------End  Admin Route---------*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




//Route::get('/admin/dashboard', function () {
// return view('admin.dashboard');
//})->middleware(['auth', 'auth:admin', 'verified'])->name('admin.dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';




















//USER ROUTES------------------------------- -----------------------  ------------------------
/*

Route::prefix('/user')->name('user')->controller(AdminUserController::class)->group(function () {

  Route::get('/','index')->name('index');
  Route::get('/edit/{id}','show')->name('edit');
  Route::get('/show/{id}','show')->name('show');
  Route::post('/update/{id}','update')->name('update');
  Route::get('/destroy/{id}','destroy')->name('destroy');
});*/
