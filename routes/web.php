<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminxController;
use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\AdminPanel\AdminUserController;
use App\Http\Controllers\Secretary\MaintenanceController;




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


/*---------End Admin Route---------*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




//Route::get('/admin/dashboard', function () {
// return view('admin.dashboard');
//})->middleware(['auth', 'auth:admin', 'verified'])->name('admin.dashboard');

/*

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


*/

/*---------End of Admin Route---------*/


/*
//_____________------------------------ADMIN X (DUMAGUETE BRANCH ROUTE)-------------------------

Route::prefix('adminx')->group(function () {

    Route::get('/loginx', [AdminxController::class, 'Index'])->name('login_formx');

    Route::post('/loginx/ownerx', [AdminxController::class, 'Loginx'])->name('adminx.loginx');

    Route::get('/dashboardx', [AdminxController::class, 'Dashboardx'])->name(
        'adminx.dashboardx'
    )->middleware('adminx');




    Route::get('/logoutx', [AdminxController::class, 'AdminLogoutx'])->name(
        'admin.logoutx'
    )->middleware('adminx');

    Route::get('/registeredx', [AdminxController::class, 'Registerx'])->name('registeredAx');

    Route::post('/registeredx/createx', [AdminxController::class, 'AdminRegisterCreatex'])->name('adminx.registerx.createx');



    Route::resource('/categoriesx', CategoryxController::class)->middleware('adminx');
    Route::resource('/requestsx', RequestxController::class)->middleware('adminx');
    Route::resource('/servicesx', ServicexController::class)->middleware('adminx');
    Route::resource('/techniciansx', TechnicianxController::class)->middleware('adminx');
    Route::resource('/secretariesx', TechnicianxController::class)->middleware('adminx');
    Route::resource('/usersx', UserController::class)->middleware('adminx');

    //USER ROUTES------------------------------- -----------------------  ------------------------


    Route::prefix('/user')->name('user')->controller(AdminUserxController::class)->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('/edit/{id}', 'show')->name('edit');
        Route::get('/show/{id}', 'show')->name('show');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
});

*/

// OFDUMAGUETE SECRETARY ROUTE//--------------------------------------------------------------------------------------


Route::prefix('secretary')->group(function () {


    Route::get('/dashboard', [SecretaryController::class, 'index'])->name(
        'secretary.dashboard'
    )->middleware('secretary');



    Route::resource('/maintenance', MaintenanceController::class)->middleware('secretary');


});


//END OFDUMAGUETE SECRETARY ROUTE//--------------------------------------------------------------------------------------




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::get('/mgrdashboard', function () {
    return view('mgrdashboard');
})->middleware(['auth', 'verified'])->name('mgrdashboard')->middleware('manager');





Route::get('/secdashboard', function () {
    return view('secdashboard');
})->middleware(['auth', 'verified'])->name('secdashboard')->middleware('secretary');



Route::get('/tecdashboard', function () {
    return view('tecdashboard');
})->middleware(['auth', 'verified'])->name('tecdashboard')->middleware('technician');

Route::get('/mecdashboard', function () {
    return view('mecdashboard');
})->middleware(['auth', 'verified'])->name('mecdashboard')->middleware('mechanic');

//Route::get('/admin/dashboard', function () {
// return view('admin.dashboard');
//})->middleware(['auth', 'auth:admin', 'verified'])->name('admin.dashboard');

Route::get('/bmgrdashboard', function () {
    return view('bmgrdashboard');
})->middleware(['auth', 'verified'])->name('bmgrdashboard')->middleware('manager');




Route::get('/bsecdashboard', function () {
    return view('bsecdashboard');
})->middleware(['auth', 'verified'])->name('bsecdashboard')->middleware('secretary');




/*

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Profile1Controller::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Profile1Controller::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Profile1Controller::class, 'destroy'])->name('profile.destroy');
});
*/

//_____________------------------------END OF ADMIN X (DUMAGUETE BRANCH ROUTE)-------------------------



/*

_____________------------------------ADMIN Y (BAYAWAN BRANCH ROUTE)-------------------------

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


_____________------------------------END OF ADMIN Y (BAYAWAN BRANCH ROUTE)-------------------------*/
























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
