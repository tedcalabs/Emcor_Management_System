<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\BaywanUser;
use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\BranchB\BranchBController;
use App\Http\Controllers\BranchB\WorkExBController;
use App\Http\Controllers\BranchB\ManagerBController;
use App\Http\Controllers\BranchB\MechanicBController;
use App\Http\Controllers\BranchB\ScheduleBController;
use App\Http\Controllers\BranchB\BSecretaryController;
use App\Http\Controllers\DumagueteB\ManagerController;
use App\Http\Controllers\BranchB\BrownlinesTController;
use App\Http\Controllers\BranchB\TechnicianBController;
use App\Http\Controllers\DumagueteB\MechanicController;
use App\Http\Controllers\Technician\ScheduleController;
use App\Http\Controllers\AdminPanel\AdminUserController;
use App\Http\Controllers\BranchB\MaintenanceBController;
use App\Http\Controllers\DumagueteB\WorkExpertController;
use App\Http\Controllers\Secretary\MaintenanceController;
use App\Http\Controllers\BranchB\WorkExBScheduleController;
use App\Http\Controllers\DumagueteB\BrowlinesTechController;
use App\Http\Controllers\Technician\WorkEScheduleController;
use App\Http\Controllers\BranchB\MechanicBScheduleController;
use App\Http\Controllers\Mechanic\MechanicScheduleController;
use App\Http\Controllers\BranchB\BrownLineTechProfileController;
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


    Route::get('/bayawan-request', [AdminController::class, 'getBayawanRequest'])->name(
        'bayawan.mtnc.request'
    )->middleware('admin');


    Route::get('/duma-request', [AdminController::class, 'getDumaRequest'])->name(
        'duma.mtnc.request'
    )->middleware('admin');

    Route::resource('/categories', CategoryController::class)->middleware('admin');
    Route::resource('/requests', RequestController::class)->middleware('admin');
    Route::resource('/sales', SalesController::class)->middleware('admin');
    Route::resource('/services', ServiceController::class)->middleware('admin');
    Route::resource('/users', UserController::class)->middleware('admin');
   Route::resource('/usersbyn', BaywanUser::class)->middleware('admin');

    Route::get('profile', [AdminProfileController::class, 'profile'])->name('admin.profile')->middleware('admin');
    Route::put('update-admin-photo', [AdminProfileController::class, 'update'])->name('admin.profile.update')->middleware('admin');
    Route::post('update-admin-info', [AdminProfileController::class, 'updateInfo'])->name('UpdateAdminInfo')->middleware('admin');
    Route::post('update-admin-password', [AdminProfileController::class, 'changePassword'])->name('UpdateAdminPass')->middleware('admin');

    //USER ROUTES------------------------------- -----------------------  ------------------------


});




Route::group(['prefix' => 'manager', 'middleware' => ['manager']], function () {

    Route::get('/managerDashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
    Route::get('/managerProfile', [ManagerController::class, 'profile'])->name('manager.profile');
    Route::put('update-photo', [ManagerController::class, 'update'])->name('update.mgr.photo');

    Route::get('/show-reqd/{id}', [ManagerController::class, 'ViewData'])->name('ShowDumaRequestMW');
    Route::get('/show-reqdmb/{id}', [ManagerController::class, 'ViewDataMB'])->name('ShowDumaRequestMB');
    Route::get('/show-req-mechmm/{id}', [ManagerController::class, 'ViewDataMM'])->name('ShowDumaRequestMM');
    Route::get('/emSec', [ManagerController::class, 'emSec'])->name('secretary.employees');
    Route::get('/emWl', [ManagerController::class, 'emWl'])->name('whitelinestec.employees');
    Route::get('/emBl', [ManagerController::class, 'emBl'])->name('bltec.employees');
    Route::get('/emWe', [ManagerController::class, 'emWe'])->name('workex.employees');
    Route::get('/emMec', [ManagerController::class, 'emMec'])->name('mechanic.employees');

    Route::get('/whitelines-tran', [ManagerController::class, 'getwhitelines'])->name('whitelines.tansaction');
    Route::get('/brownlines-tran', [ManagerController::class, 'getBrownlines'])->name('brownlines.tansaction');
    Route::get('/mechanic-tran', [ManagerController::class, 'getMechanic'])->name('mechanic.tansaction');

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


Route::group(['prefix' => 'bsecretary', 'middleware' => ['bsecretary']], function () {


    
    Route::get('/scustomers-list', [BSecretaryController::class, 'getCList'])->name('cuslistb');
    Route::get('/SemMec', [BSecretaryController::class, 'SemMec'])->name('mechanicSb');
    Route::get('/SecBl', [BSecretaryController::class, 'SecBl'])->name('brownlinestecSb');
    Route::get('/SecWl', [BSecretaryController::class, 'SecWl'])->name('whitelinestecSb');

    Route::get('/dashboard', [BSecretaryController::class, 'Dashboard'])->name('bsec.dashboard');
    Route::get('/logout', [BSecretaryController::class, 'BsecBLogout'])->name('bsec.logout');


    //MAINTENANCE ROUTE
    Route::get('maintenance-req', [MaintenanceBController::class, 'index'])->name('mreqb');

   Route::get('mechanic-maintenance-req', [MaintenanceBController::class, 'getMechanic'])->name('getmechanic.bywn.req');

    Route::delete('/delete-req/{id}', [MaintenanceBController::class, 'deleteReq'])->name('deleteReqb');

    Route::get('accept-req', [MaintenanceBController::class, 'acceptd'])->name('acceptb');
    Route::get('/update-req/{id}', [MaintenanceBController::class, 'updateReq'])->name('updateReqb');
    Route::get('/up-req/{id}', [MaintenanceBController::class, 'upReqB'])->name('upReqb');
    Route::resource('/maintenanceb', MaintenanceBController::class);

    Route::put('/edit/{maintenanceb}',[MaintenanceBController::class, 'updateXB'])->name('updateXB');

    Route::get('/update-brown-req/{id}', [MaintenanceBController::class, 'updateBrownReq'])->name('updateBrownReq.bywn');
    Route::get('/brownlines-maintenance-req-bayawan', [MaintenanceBController::class, 'getBrownlines'])->name('brownlines.req.bwyn');


    
    Route::get('/update-mech-req/{id}', [MaintenanceBController::class, 'updateMechReq'])->name('updateMechReq.bywn.req');
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




Route::group(['prefix' => 'workexpertbwyn', 'middleware' => ['workexpertb']], function () {

    Route::get('/workexpertDashboard', [WorkExBController::class, 'index'])->name('workexpertb.dashboard');
    Route::get('/workexpertProfile', [WorkExBController::class, 'profile'])->name('workexpertb.profile');
    Route::post('update-workexpert-info', [WorkExBController::class, 'updateInfo'])->name('workexpertb.UpdateInfo');
    Route::post('change-password', [WorkExBController::class, 'ChangePassword'])->name('workexpertb.changepass');
    Route::put('update-photo', [WorkExBController::class, 'update'])->name('update.workexpertb.photo');

    Route::get('schedule', [WorkExBScheduleController::class, 'Index'])->name('workexpertb.sched');
    Route::get('/mechanic-request', [WorkExBScheduleController::class, 'getMechanic'])->name('getMechanicb.request');
    Route::get('/brownline-request', [WorkExBScheduleController::class, 'getBrownlines'])->name('getBrownlinesb.request');
});











//MECHANIC ROUTES
Route::group(['prefix' => 'mechanicbyn', 'middleware' => ['mechanicb']], function () {

    Route::get('/mechanic-bywn-Dashboard', [MechanicBController::class, 'index'])->name('mechanicbywn.dashboard');
    Route::get('/mechanicProfile', [MechanicBController::class, 'profile'])->name('mechanicbywn.profile');
    Route::post('/update-mechanic-info', [MechanicBController::class, 'mecupdateInfo'])->name('mechanicbywn.UpdateInfo');
    Route::post('/change-password-mech', [MechanicBController::class, 'mecChangePassword'])->name('mechanicbywn.changepass');
    Route::put('update-photo', [MechanicBController::class, 'update'])->name('mechanicbywn.mecphoto');

    Route::get('/completed-mecschedule', [MechanicBScheduleController::class, 'getCompletedMec'])->name('completed.sched.mechanicbywn');

    Route::get('/schedule', [MechanicBScheduleController::class, 'Index'])->name('mechanicbywn.sched');
    Route::get('/update/{id}', [MechanicBScheduleController::class, 'Mecupdate'])->name('mechanicbywn.update');
   // Route::get('/delete-req/{id}', [MechanicBScheduleController::class, 'deleteReq'])->name('mecdelete.mechanicbywn');
    
    Route::delete('/delete-req/{id}', [MechanicBScheduleController::class, 'deleteReq'])->name('deleteReqb.mechanicbywn');
    Route::resource('/maintenancesmbf', MechanicBScheduleController::class);
});

//END OF MECHANIC ROUTES




//TECHNICIAN PROFILE ROUTES

Route::group(['prefix' => 'technicianb', 'middleware' => ['btechnician', 'PreventBackHistory']], function () {

    //Route::get('dashboard', [TechnicianBController::class, 'index'])->name('secretary.dashboard');
    Route::get('profile', [TechnicianBController::class, 'profile'])->name('technicianb.profile');
    Route::get('settings', [TechnicianBController::class, 'settings'])->name('secretary.settings');
    Route::post('update-secretary-info', [TechnicianBController::class, 'btecUpdateInfo'])->name('btecnicianUpdateInfo');
    Route::post('change-password', [TechnicianBController::class, 'btecChangePassword'])->name('tecbChangePass');
    Route::put('update-photo', [TechnicianBController::class, 'update'])->name('update.tecb.photo');

    Route::get('/update/{id}', [TechnicianBController::class, 'updateB'])->name('updateB');

    Route::get('/btechw-schedule', [TechnicianBController::class, 'getWhiteSched'])->name('whitebtech.sched');

    Route::resource('/maintenancesbwyn', ScheduleBController::class)->middleware('btechnician');

    Route::get('/completed-schedule', [ScheduleBController::class, 'getCompleted'])->name('completed.sched.bywn');

    Route::get('/logout', [TechnicianBController::class, 'Logout'])->name('bbtecbywn.logout');
    Route::delete('/delete-req/{id}', [TechnicianBController::class, 'deleteReq'])->name('deleteReqb.tech');

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

//END OF PROFILE ROUTE


Route::group(['prefix' => 'brownlinesTech', 'middleware' => ['brownlinesb']], function () {


    Route::post('/change-password', [BrownLineTechProfileController::class, 'ChangePassword'])->name('BrownlinBywnChangePass');
    Route::post('update-browlinesTech-info', [BrownLineTechProfileController::class, 'UpdateInfo'])->name('BrownlinBywnUpdateInfo');
    Route::get('/profile', [BrownLineTechProfileController::class, 'Index'])->name('brown.bywn.profile');
    Route::put('/update-photo', [BrownLineTechProfileController::class, 'update'])->name('update.brownTech.photo.bywn');
    Route::resource('/maintenancesbwynbrown', BrownlinesTController::class)->middleware('brownlinesb');

    Route::get('dashboard', [BrownlinesTController::class, 'index'])->name('brownlinesb.dashboard');
    Route::get('/logout', [BrownlinesTController::class, 'BbrownLogout'])->name('bbrowntec.logout');

    Route::get('/update/{id}', [BrownlinesTController::class, 'updateB'])->name('updateBBrown');

    Route::get('/completed-schedule', [BrownlinesTController::class, 'getCompleted'])->name('completed.brwon.bywn');
    Route::delete('/delete-req/{id}', [BrownlinesTController::class, 'deleteReq'])->name('deleteReqb.brown.bywn');
 Route::get('/btechbrown-schedule', [BrownlinesTController::class, 'getBrownSched'])->name('getBrownSchedBl.sched');
});











Route::group(['prefix' => 'managerb', 'middleware' => ['managerb']], function () {

    Route::get('/managerDashboard', [ManagerBController::class, 'index'])->name('managerb.dashboard');
    Route::get('/managerProfile', [ManagerBController::class, 'profile'])->name('managerb.profile');
    Route::put('update-photo', [ManagerBController::class, 'update'])->name('update.mgrb.photo');


    Route::get('/emSec', [ManagerBController::class, 'emSec'])->name('secretaryb.employees');
    Route::get('/emWl', [ManagerBController::class, 'emWl'])->name('whitelinestecb.employees');
    Route::get('/emBl', [ManagerBController::class, 'emBl'])->name('bltecb.employees');
    Route::get('/emWe', [ManagerBController::class, 'emWe'])->name('workexb.employees');
    Route::get('/emMec', [ManagerBController::class, 'emMec'])->name('mechanicb.employees');

    Route::get('/whitelines-tran', [ManagerBController::class, 'getwhitelines'])->name('whitelinesb.tansaction');
    Route::get('/brownlines-tran', [ManagerBController::class, 'getBrownlines'])->name('brownlinesb.tansaction');
    Route::get('/mechanic-tran', [ManagerBController::class, 'getMechanic'])->name('mechanicb.tansaction');

    Route::get('/customers-list', [ManagerBController::class, 'getCustomerList'])->name('customerslistb');
    Route::post('update-manager-info', [ManagerBController::class, 'updateInfo'])->name('managerb.UpdateInfo');
    Route::post('change-password', [ManagerBController::class, 'changePassword'])->name('managerb.changepass');

    Route::get('/logout', [ManagerBController::class, 'Logout'])->name('bbmanager.logout');
});







//END OF BRANCH 2 ROUTES------------------------------- -----------------------  ------------------------
//ADMIN PROFILE ROUTES------------------------------- -----------------------  ------------------------

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'PreventBackHistory']], function () {
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    //Route::post('update-admin-info', [AdminController::class, 'adminupdateInfo'])->name('adminUpdateInfo');
    Route::post('change-password', [AdminController::class, 'adminChangePassword'])->name('adminCpass');
    Route::put('update-photo', [AdminController::class, 'update'])->name('cphoto');
    Route::delete('/delete-reqbr/{id}', [RequestController::class, 'destroyBr'])->name('destroyBr');
    Route::delete('/delete-reqdr/{id}', [RequestController::class, 'destroyDr'])->name('destroyDr');

    Route::get('/up-reqd/{id}', [RequestController::class, 'upReqD'])->name('upReqD');


    Route::get('/show-reqd/{id}', [RequestController::class, 'ViewData'])->name('ShowDumaRequest');


    Route::get('/show-reqbd/{id}', [RequestController::class, 'ViewDataB'])->name('ShowDumaRequestB');

    Route::get('/up-reqb/{id}', [RequestController::class, 'upReqB'])->name('upReqB');
    Route::put('/edit/{maintenance}',[RequestController::class, 'upReqDx'])->name('upReqDx');
    Route::put('/editb/{maintenanceb}',[RequestController::class, 'upReqBx'])->name('upReqBx');
});

//SECRETARY PROFILE ROUTES------------------------------- -----------------------  ------------------------

Route::group(['prefix' => 'secretary', 'middleware' => ['secretary', 'auth', 'PreventBackHistory']], function () {



    Route::get('/scustomers-list', [SecretaryController::class, 'getCList'])->name('cuslist');
    Route::get('/SemMec', [SecretaryController::class, 'SemMec'])->name('mechanicS');
    Route::get('/SecBl', [SecretaryController::class, 'SecBl'])->name('brownlinestecS');
    Route::get('/SecWl', [SecretaryController::class, 'SecWl'])->name('whitelinestecS');
    Route::get('dashboard', [SecretaryController::class, 'index'])->name('secretary.dashboard');
    Route::get('profile', [SecretaryController::class, 'profile'])->name('secretary.profile');
    Route::get('settings', [SecretaryController::class, 'settings'])->name('secretary.settings');
    Route::post('update-secretary-info', [SecretaryController::class, 'updateInfo'])->name('secretaryUpdateInfo');
    Route::post('change-password', [SecretaryController::class, 'changePassword'])->name('cpass');
    Route::put('update-photo', [SecretaryController::class, 'update'])->name('cphoto');
    Route::get('tec-list', [SecretaryController::class, 'getTechList'])->name('getTechList');


    //MAINTENANCE REQUESTS ROUTES------------------------------- -----------------------  ------------------------   



    Route::get('/show-reqd/{id}', [MaintenanceController::class, 'ViewData'])->name('ShowDumaRequestMWx');

    Route::get('/show-reqdbh/{id}', [MaintenanceController::class, 'ViewDataBL'])->name('ShowDumaRequestMBds');

    Route::get('/show-reqdbmh/{id}', [MaintenanceController::class, 'ViewDataML'])->name('ShowDumaRequestMBL');

    Route::resource('/maintenance', MaintenanceController::class)->middleware('secretary');
    Route::put('/edit/{maintenance}',[MaintenanceController::class, 'updateX'])->name('updateX');
    Route::put('/decline/{maintenance}',[MaintenanceController::class, 'declineRequest'])->name('decline');
    Route::get('brownlines-maintenance-req', [MaintenanceController::class, 'getBrownlines'])->name('brownlines.req');
    Route::get('mechanic-maintenance-req', [MaintenanceController::class, 'getMechanic'])->name('mechanic.req');
    Route::get('m-req', [MaintenanceController::class, 'index'])->name('mreq');
    Route::get('accept', [MaintenanceController::class, 'accept'])->name('accept');
    Route::get('declinedlist', [MaintenanceController::class, 'getDeclinedRequest'])->name('declined.list');

    Route::delete('/delete-req/{id}', [MaintenanceController::class, 'deleteReq'])->name('deleteReq');

    //Route::get('/delete-req/{id}', [MaintenanceController::class, 'deleteReq'])->name('deleteReq');
    Route::get('/update-req/{id}', [MaintenanceController::class, 'updateReq'])->name('updateReq');
    Route::get('/update-brown-req/{id}', [MaintenanceController::class, 'updateBrownReq'])->name('updateBrownReq');
    Route::get('/update-mech-req/{id}', [MaintenanceController::class, 'updateMechReq'])->name('updateMechReq');
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
    Route::get('/completed-schedule', [ScheduleController::class, 'getCompleted'])->name('completed.sched');
    Route::get('/update/{id}', [ScheduleController::class, 'updateD'])->name('updateD');
    Route::get('/delete-req/{id}', [ScheduleController::class, 'deleteReq'])->name('deleteZ');
    Route::resource('/maintenances', ScheduleController::class)->middleware('technician');

    Route::get('/show-reqdtd/{id}', [ScheduleController::class, 'ViewDataC'])->name('ShowDumaRequestJHC');
    
    Route::get('/show-reqd/{id}', [ScheduleController::class, 'ViewData'])->name('ShowDumaRequestJH');
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


    Route::get('/completed-mecschedule', [MechanicScheduleController::class, 'getCompletedMec'])->name('completed.sched.mec');

    Route::get('/show-reqd/{id}', [MechanicScheduleController::class, 'ViewData'])->name('ShowDumaRequestMWXC');

    Route::get('/show-reqdc/{id}', [MechanicScheduleController::class, 'ViewDataC'])->name('ShowDumaRequestCMT');


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



    
    Route::get('/show-reqdtd/{id}', [BlTechnicianScheduleController::class, 'ViewDataC'])->name('ShowDumaRequestIC');
    
    Route::get('/show-reqd/{id}', [BlTechnicianScheduleController::class, 'ViewData'])->name('ShowDumaRequestLN');

 Route::get('/completedbrn-schedule', [BlTechnicianScheduleController::class, 'getCompletedbrn'])->name('completed.sched.brwn');
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
    Route::get('/mechanic-request', [WorkEScheduleController::class, 'getMechanic'])->name('getMechanic.request');
    Route::get('/brownline-request', [WorkEScheduleController::class, 'getBrownlines'])->name('getBrownlines.request');
});

//END OF WORK EXPERT ROUTES

require __DIR__ . '/auth.php';
