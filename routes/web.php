<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\BranchB\BranchBController;
use App\Http\Controllers\BranchB\TechnicianBController;
//use App\Http\Controllers\BranchB\TechnicianBController;
use App\Http\Controllers\Technician\ScheduleController;
use App\Http\Controllers\AdminPanel\AdminUserController;
use App\Http\Controllers\BranchB\MaintenanceBController;
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
    Route::resource('/profile', AdminProfileController::class)->middleware('admin');


    //USER ROUTES------------------------------- -----------------------  ------------------------


    Route::prefix('/user')->name('user')->controller(AdminUserController::class)->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('/edit/{id}', 'show')->name('edit');
        Route::get('/show/{id}', 'show')->name('show');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
});


//BRANCH 2 ROUTES------------------------------- -----------------------  ------------------------



Route::prefix('bayawanBranch')->group(function () {



    Route::get('/register', [BranchBController::class, 'Register'])->name('branchb_registerForm');

    Route::post('/registered/create', [BranchBController::class, 'BranchBRegisterCreate'])->name('branchb.register.create');


    Route::get('/login', [BranchBController::class, 'Index'])->name('branchb_loginform');

    Route::post('/login/branchb', [BranchBController::class, 'Login'])->name('branchb.login');

    Route::get('/dashboard', [BranchBController::class, 'Dashboard'])->name(
        'branchb.dashboard'
    )->middleware('branchb');


    Route::get('/logout', [BranchBController::class, 'BranchBLogout'])->name(
        'branchb.logout'
    )->middleware('branchb');
});




Route::prefix('bsecretary')->group(function () {



    Route::get('/register', [TechnicianBController::class, 'Register'])->name('bsec_registerForm');

    Route::post('/registered/create', [TechnicianBController::class, 'BsecRegisterCreate'])->name('bsec.register.create');


    Route::get('/login', [TechnicianBController::class, 'Index'])->name('bsec_loginform');

    Route::post('/login/bsec', [TechnicianBController::class, 'Login'])->name('bsec.login');

    Route::get('/dashboard', [TechnicianBController::class, 'Dashboard'])->name(
        'bsec.dashboard'
    )->middleware('bsecretary');


    Route::get('/logout', [TechnicianBController::class, 'BsecBLogout'])->name(
        'bsec.logout'
    )->middleware('bsecretary');


    //Route::get('/mrequest', [MaintenanceController::class, 'BIndex'])->name('bmrequest')->middleware('bsecretary');




//MAINTENANCE ROUTE


Route::get('maintenance-req', [MaintenanceBController::class, 'index'])->name('mreqb');
Route::get('/delete-req/{id}', [MaintenanceBController::class, 'deleteReq'])->name('deleteReqb');
Route::get('accept-req', [MaintenanceBController::class, 'accept'])->name('acceptb');
Route::get('/update-req/{id}', [MaintenanceBController::class, 'updateReq'])->name('updateReqb');
Route::get('/up-req/{id}', [MaintenanceBController::class, 'upReq'])->name('upReqb');


Route::resource('/maintenanceb', MaintenanceBController::class)->middleware('bsecretary');


//END OF MAINTENANCE




});




//TECHNICIAN ROUTES

Route::prefix('btechnician')->group(function () {

    Route::get('/dashboard', [TechnicianBController::class, 'index'])->name(
        'btec.dashboard'
    )->middleware('btechnician');


    Route::get('/logout', [TechnicianBController::class, 'BtecLogout'])->name(
        'btec.logout'
    )->middleware('btechnician');
});






//TECHNICIAN PROFILE ROUTES



Route::group(['prefix' => 'technicianb', 'middleware' => ['btechnician', 'PreventBackHistory']], function () {

    //Route::get('dashboard', [TechnicianBController::class, 'index'])->name('secretary.dashboard');
    Route::get('profile', [TechnicianBController::class, 'profile'])->name('technicianb.profile');
    Route::get('settings', [TechnicianBController::class, 'settings'])->name('secretary.settings');


    Route::post('update-secretary-info', [TechnicianBController::class, 'btecUpdateInfo'])->name('btecnicianUpdateInfo');

    Route::post('change-password', [TechnicianBController::class, 'btecChangePassword'])->name('tecbChangePass');
    Route::put('update-photo', [TechnicianBController::class, 'update'])->name('update.tecb.photo');




});





//END OF TECHNICIAN PROFILE ROUTES

















//END OF TECHNICIAN ROUTES






//PROFILE ROUTES




Route::group(['prefix' => 'secretaryb', 'middleware' => ['bsecretary', 'PreventBackHistory']], function () {

    //Route::get('dashboard', [TechnicianBController::class, 'index'])->name('secretary.dashboard');
    Route::get('profile', [TechnicianBController::class, 'profile'])->name('secretaryb.profile');
    Route::get('settings', [TechnicianBController::class, 'settings'])->name('secretary.settings');


    Route::post('update-secretary-info', [TechnicianBController::class, 'bsecUpdateInfo'])->name('bsecretaryUpdateInfo');

    Route::post('change-password', [TechnicianBController::class, 'bsecChangePassword'])->name('secbChangePass');
    Route::put('update-photo', [TechnicianBController::class, 'update'])->name('update.secb.photo');




});





//END OF PROFILE ROUTES


//END OF BRANCH 2 ROUTES------------------------------- -----------------------  ------------------------




//ADMIN PROFILE ROUTES------------------------------- -----------------------  ------------------------

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'PreventBackHistory']], function () {
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');


    Route::post('update-admin-info', [AdminController::class, 'adminupdateInfo'])->name('adminUpdateInfo');

    Route::post('change-password', [AdminController::class, 'adminChangePassword'])->name('adminCpass');
    Route::put('update-photo', [AdminController::class, 'update'])->name('cphoto');
});



//SECRETARY PROFILE ROUTES------------------------------- -----------------------  ------------------------

Route::group(['prefix' => 'secretary', 'middleware' => ['secretary', 'auth', 'PreventBackHistory']], function () {

    Route::get('dashboard', [SecretaryController::class, 'index'])->name('secretary.dashboard');
    Route::get('profile', [SecretaryController::class, 'profile'])->name('secretary.profile');
    Route::get('settings', [SecretaryController::class, 'settings'])->name('secretary.settings');


    Route::post('update-secretary-info', [SecretaryController::class, 'updateInfo'])->name('secretaryUpdateInfo');

    Route::post('change-password', [SecretaryController::class, 'changePassword'])->name('cpass');
    Route::put('update-photo', [SecretaryController::class, 'update'])->name('cphoto');



    //MAINTENANCE REQUESTS ROUTES------------------------------- -----------------------  ------------------------   

    Route::resource('/maintenance', MaintenanceController::class)->middleware('secretary');


    Route::get('m-req', [MaintenanceController::class, 'index'])->name('mreq');
    Route::get('accept', [MaintenanceController::class, 'accept'])->name('accept');
    Route::get('/delete-req/{id}', [MaintenanceController::class, 'deleteReq'])->name('deleteReq');
    Route::get('/update-req/{id}', [MaintenanceController::class, 'updateReq'])->name('updateReq');
    Route::get('/up-req/{id}', [MaintenanceController::class, 'upReq'])->name('upReq');
    Route::post('/save-up-req', [MaintenanceController::class, 'saveReq'])->name('saveReq');
});





//TEST ROUTES//--------------------------------------------------------------------------------------




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::get('/mgrdashboard', function () {
    return view('mgrdashboard');
})->middleware(['auth', 'verified'])->name('mgrdashboard')->middleware('manager');





Route::get('/secdashboard', function () {
    return view('secdashboard');
})->middleware(['auth', 'verified'])->name('secdashboard')->middleware('secretary');












//SECRETARY PROFILE ROUTES------------------------------- -----------------------  ------------------------

Route::group(['prefix' => 'technician', 'middleware' => ['technician', 'auth']], function () {

    Route::get('dashboardx', [TechnicianController::class, 'index'])->name('technician.dashboard');

    Route::get('schedule', [ScheduleController::class, 'Index'])->name('tech.sched');

    Route::get('/update/{id}', [ScheduleController::class, 'updateD'])->name('updateD');

    Route::resource('/maintenances', ScheduleController::class)->middleware('technician');
});

/*
Route::get('/tecdashboard', function () {
   
   
   
   
    return view('tecdashboard');

    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');




})->middleware(['auth', 'verified'])->name('tecdashboard')->middleware('technician');



*/

Route::get('/mecdashboard', function () {
    return view('mecdashboard');
})->middleware(['auth', 'verified'])->name('mecdashboard')->middleware('mechanic');




Route::get('/bmgrdashboard', function () {
    return view('bmgrdashboard');
})->middleware(['auth', 'verified'])->name('bmgrdashboard')->middleware('manager');




Route::get('/bsecdashboard', function () {
    return view('bsecdashboard');
})->middleware(['auth', 'verified'])->name('bsecdashboard')->middleware('secretary');






require __DIR__ . '/auth.php';
