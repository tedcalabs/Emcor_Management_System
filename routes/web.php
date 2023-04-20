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
use App\Http\Controllers\BranchB\BSecretaryController;
use App\Http\Controllers\DumagueteB\ManagerController;
use App\Http\Controllers\BranchB\TechnicianBController;
use App\Http\Controllers\DumagueteB\MechanicController;
use App\Http\Controllers\Technician\ScheduleController;
use App\Http\Controllers\AdminPanel\AdminUserController;
use App\Http\Controllers\BranchB\BrownlinesTController;
use App\Http\Controllers\BranchB\MaintenanceBController;
use App\Http\Controllers\DumagueteB\WorkExpertController;
use App\Http\Controllers\Secretary\MaintenanceController;
use App\Http\Controllers\DumagueteB\BrowlinesTechController;
use App\Http\Controllers\Technician\WorkEScheduleController;
use App\Http\Controllers\Mechanic\MechanicScheduleController;
use App\Http\Controllers\Technician\BlTechnicianScheduleController;

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

    Route::get('profile', [AdminProfileController::class, 'profile'])->name('admin.profile')->middleware('admin');
    Route::put('update-admin-photo', [AdminProfileController::class, 'update'])->name('admin.profile.update')->middleware('admin');
    Route::post('update-admin-info', [AdminProfileController::class, 'updateInfo'])->name('UpdateInfo')->middleware('admin');
    Route::post('update-admin-password', [AdminProfileController::class, 'changePassword'])->name('UpdateAdminPass')->middleware('admin');

    //USER ROUTES------------------------------- -----------------------  ------------------------


});


//MANAGER ROUTES



// Route::group(['prefix' => 'manager', 'middleware' => ['manager']], function () {

//     Route::get('/managerDashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
//     Route::get('/managerProfile', [ManagerController::class, 'profile'])->name('manager.profile');


//     Route::get('/emSec', [ManagerController::class, 'emSec'])->name('secretary.employees');
//     Route::get('/emWl', [ManagerController::class, 'emWl'])->name('whitelinestec.employees');
//     Route::get('/emBl', [ManagerController::class, 'emBl'])->name('bltec.employees');
//     Route::get('/emWe', [ManagerController::class, 'emWe'])->name('workex.employees');
//     Route::get('/emMec', [ManagerController::class, 'emMec'])->name('mechanic.employees');

//     Route::get('/whitelines-tran', [ManagerController::class, 'getwhitelines'])->name('whitelines.tansaction');
//     Route::get('/brownlines-tran', [ManagerController::class, 'getBrownlines'])->name('brownlines.tansaction');

//     Route::get('/customers-list', [ManagerController::class, 'getCustomerList'])->name('customerslist');
//     Route::post('update-manager-info', [ManagerController::class, 'updateInfo'])->name('manager.UpdateInfo');
//     Route::post('change-password', [ManagerController::class, 'changePassword'])->name('manager.changepass');
// });






Route::group(['prefix' => 'manager', 'middleware' => ['manager']], function () {

    Route::get('/managerDashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
    Route::get('/managerProfile', [ManagerController::class, 'profile'])->name('manager.profile');


    Route::get('/emSec', [ManagerController::class, 'emSec'])->name('secretary.employees');
    Route::get('/emWl', [ManagerController::class, 'emWl'])->name('whitelinestec.employees');
    Route::get('/emBl', [ManagerController::class, 'emBl'])->name('bltec.employees');
    Route::get('/emWe', [ManagerController::class, 'emWe'])->name('workex.employees');
    Route::get('/emMec', [ManagerController::class, 'emMec'])->name('mechanic.employees');

    Route::get('/whitelines-tran', [ManagerController::class, 'getwhitelines'])->name('whitelines.tansaction');
    Route::get('/brownlines-tran', [ManagerController::class, 'getBrownlines'])->name('brownlines.tansaction');

    Route::get('/customers-list', [ManagerController::class, 'getCustomerList'])->name('customerslist');
    Route::post('update-manager-info', [ManagerController::class, 'updateInfo'])->name('manager.UpdateInfo');
    Route::post('change-password', [ManagerController::class, 'changePassword'])->name('manager.changepass');
});





//END OF MANAGER ROUTES












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




Route::prefix('bayawan')->group(function () {



    Route::get('/register', [BSecretaryController::class, 'Register'])->name('bsec_registerForm');
    Route::post('/registered/create', [BSecretaryController::class, 'BsecRegisterCreate'])->name('bsec.register.create');
    Route::get('/login', [BSecretaryController::class, 'Index'])->name('userB_loginform');
    Route::post('/login/bsec', [BSecretaryController::class, 'Login'])->name('bsec.login');

});


Route::group(['prefix' => 'secretary', 'middleware' => ['bsecretary']], function () {

    Route::get('/dashboard', [BSecretaryController::class, 'Dashboard'])->name('bsec.dashboard');
    Route::get('/logout', [BSecretaryController::class, 'BsecBLogout'])->name('bsec.logout');


    //MAINTENANCE ROUTE
    Route::get('maintenance-req', [MaintenanceBController::class, 'index'])->name('mreqb');
    //Route::get('brownlines-maintenance-req', [MaintenanceBController::class, 'getBrownlines'])->name('brownlines.req');
    Route::get('/delete-req/{id}', [MaintenanceBController::class, 'deleteReq'])->name('deleteReqb');
    Route::get('accept-req', [MaintenanceBController::class, 'accept'])->name('acceptb');
    Route::get('/update-req/{id}', [MaintenanceBController::class, 'updateReq'])->name('updateReqb');
    Route::get('/up-req/{id}', [MaintenanceBController::class, 'upReq'])->name('upReqb');
    Route::resource('/maintenanceb', MaintenanceBController::class);


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
    Route::get('profile', [BSecretaryController::class, 'profile'])->name('secretaryb.profile');
    Route::get('settings', [BSecretaryController::class, 'settings'])->name('secretary.settings');
    Route::post('update-secretary-info', [BSecretaryController::class, 'bsecUpdateInfo'])->name('bsecretaryUpdateInfo');
    Route::post('change-password', [BSecretaryController::class, 'bsecChangePassword'])->name('secbChangePass');
    Route::put('update-photo', [BSecretaryController::class, 'update'])->name('update.secb.photo');
});

//END OF PROFILE ROUTES







Route::group(['prefix' => 'brownlinesTech', 'middleware' => ['brownlinesb']], function () {

    Route::get('dashboard', [BrownlinesTController::class, 'index'])->name('brownlinesb.dashboard');

});




















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
    Route::put('/edit/{maintenance}',[MaintenanceController::class, 'updateX'])->name('updateX');
    Route::put('/decline/{maintenance}',[MaintenanceController::class, 'declineRequest'])->name('decline');
    Route::get('brownlines-maintenance-req', [MaintenanceController::class, 'getBrownlines'])->name('brownlines.req');
    Route::get('mechanic-maintenance-req', [MaintenanceController::class, 'getMechanic'])->name('mechanic.req');
    Route::get('m-req', [MaintenanceController::class, 'index'])->name('mreq');
    Route::get('accept', [MaintenanceController::class, 'accept'])->name('accept');
    Route::get('declinedlist', [MaintenanceController::class, 'getDeclinedRequest'])->name('declined.list');
    Route::get('/delete-req/{id}', [MaintenanceController::class, 'deleteReq'])->name('deleteReq');
    Route::get('/update-req/{id}', [MaintenanceController::class, 'updateReq'])->name('updateReq');
    Route::get('/update-brown-req/{id}', [MaintenanceController::class, 'updateBrownReq'])->name('updateBrownReq');
    Route::get('/up-req/{id}', [MaintenanceController::class, 'upReq'])->name('upReq');
    Route::get('/decline/{id}', [MaintenanceController::class, 'decline'])->name('decline.request');
    Route::post('/save-up-req/{id}', [MaintenanceController::class, 'saveReq'])->name('saveReq');
});



//TEST ROUTES//--------------------------------------------------------------------------------------




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//SECRETARY PROFILE ROUTES------------------------------- -----------------------  ------------------------

Route::group(['prefix' => 'technician', 'middleware' => ['technician', 'auth']], function () {

    Route::get('dashboardx', [TechnicianController::class, 'index'])->name('technician.dashboard');
    Route::get('schedule', [ScheduleController::class, 'Index'])->name('tech.sched');
    Route::get('/update/{id}', [ScheduleController::class, 'updateD'])->name('updateD');
    Route::get('/delete-req/{id}', [ScheduleController::class, 'deleteReq'])->name('deleteZ');
    Route::resource('/maintenances', ScheduleController::class)->middleware('technician');
});

Route::group(['prefix' => 'tecnician', 'middleware' => ['technician', 'auth', 'PreventBackHistory']], function () {

    Route::get('dashboard', [TechnicianController::class, 'index'])->name('tech.dashboard');
    Route::get('profile', [TechnicianController::class, 'profile'])->name('tech.profile');
    Route::get('settings', [TechnicianController::class, 'settings'])->name('tech.settings');
    Route::post('update-tec-info', [TechnicianController::class, 'tecupdateInfo'])->name('techUpdateInfo');
    Route::post('change-password', [TechnicianController::class, 'tecChangePassword'])->name('tech.cpass');
    Route::put('update-photo', [TechnicianController::class, 'update'])->name('tech.cphoto');
});


//MECHANIC ROUTES




Route::group(['prefix' => 'mechanic', 'middleware' => ['mechanic', 'auth']], function () {

    Route::get('/mechanicDashboard', [MechanicController::class, 'index'])->name('mechanic.dashboard');
    Route::get('/mechanicProfile', [MechanicController::class, 'profile'])->name('mechanic.profile');
    Route::post('update-mechanic-info', [MechanicController::class, 'mecupdateInfo'])->name('mechanic.UpdateInfo');
    Route::post('change-password', [MechanicController::class, 'mecChangePassword'])->name('mechnanic.changepass');
    Route::put('update-photo', [MechanicController::class, 'update'])->name('update.mecphoto');


    Route::get('schedule', [MechanicScheduleController::class, 'Index'])->name('mec.sched');
    Route::get('/update/{id}', [MechanicScheduleController::class, 'Mecupdate'])->name('mec.update');
    Route::get('/delete-req/{id}', [MechanicScheduleController::class, 'deleteReq'])->name('mecdelete');
    Route::resource('/maintenancesm', MechanicScheduleController::class);
});



//END OF MECHANIC ROUTES






//BROWNLINES ROUTES




Route::group(['prefix' => 'brownlines', 'middleware' => ['brownlines', 'auth']], function () {


    Route::get('/brownlinesDashboard', [BrowlinesTechController::class, 'index'])->name('brownlines.dashboard');
    Route::get('/brownlinesProfile', [BrowlinesTechController::class, 'profile'])->name('brownlines.profile');
    Route::post('update-brownlines-info', [BrowlinesTechController::class, 'blUpdateInfo'])->name('brownlines.UpdateInfo');
    Route::post('change-password', [BrowlinesTechController::class, 'blChangePassword'])->name('brownlines.changepass');
    Route::put('update-photo', [BrowlinesTechController::class, 'update'])->name('update.brownlines.photo');

    Route::get('schedule', [BlTechnicianScheduleController::class, 'Index'])->name('bl.sched');
    Route::get('/update/{id}', [BlTechnicianScheduleController::class, 'Mupdate'])->name('blupdate');
    Route::get('/delete-req/{id}', [BlTechnicianScheduleController::class, 'deleteReq'])->name('bldelete');
    Route::resource('/maintenancesbl', BlTechnicianScheduleController::class);
});



//END OF BROWNLINES  ROUTES



//WORK EXPERT ROUTES

Route::group(['prefix' => 'workexpert', 'middleware' => ['workexpert', 'auth']], function () {


    Route::get('/workexpertDashboard', [WorkExpertController::class, 'index'])->name('workexpert.dashboard');
    Route::get('/workexpertProfile', [WorkExpertController::class, 'profile'])->name('workexpert.profile');
    Route::post('update-workexpert-info', [WorkExpertController::class, 'updateInfo'])->name('workexpert.UpdateInfo');
    Route::post('change-password', [WorkExpertController::class, 'ChangePassword'])->name('workexpert.changepass');
    Route::put('update-photo', [WorkExpertController::class, 'update'])->name('update.workexpert.photo');

    Route::get('schedule', [WorkEScheduleController::class, 'Index'])->name('workexpert.sched');
});

//END OF WORK EXPERT ROUTES






require __DIR__ . '/auth.php';
