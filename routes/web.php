<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Modules\FinecController;
use App\Http\Controllers\Modules\DoctorController;
use App\Http\Controllers\Modules\PatientController;
use App\Http\Controllers\Modules\ScheduleController;
use App\Http\Controllers\Modules\JanjiController;
use App\Http\Controllers\Modules\SumberdayamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\websetController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UpdateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/update-app', [UpdateController::class, 'update'])->name('update.app');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::middleware(['auth', 'verified', 'role:Super-Admin'])->group(function () {
    Route::get('/superadmin', [SuperAdminController::class, 'index'])->name('superadmin');

    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
    Route::post('/doctor/add', [DoctorController::class, 'doctoradd'])->name('doctor.add');

    Route::get('/doctor/spesiali', [DoctorController::class, 'spesiali'])->name('doctor.spesiali');
    Route::post('/doctor/spesiali/add', [DoctorController::class, 'spesialiadd'])->name('doctor.spesiali.add');

    Route::get('/doctor/visit', [DoctorController::class, 'visitdocter'])->name('doctor.visit');
    Route::post('/doctor/visit', [DoctorController::class, 'visitdocteradd'])->name('doctor.visit.add');

    Route::get('/patient', [PatientController::class, 'index'])->name('patient');
    Route::post('/patient/add', [PatientController::class, 'patientadd'])->name('patient.add');

    Route::get('/patient/seks', [PatientController::class, 'seks'])->name('patient.seks');
    Route::post('/patient/seks/add', [PatientController::class, 'seksadd'])->name('patient.seks.add');

    Route::get('/patient/goldar', [PatientController::class, 'goldar'])->name('patient.goldar');
    Route::post('/patient/goldar/add', [PatientController::class, 'goldaradd'])->name('patient.goldar.add');

    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
    Route::post('/schedule/add', [ScheduleController::class, 'scheduleadd'])->name('schedule.add');

    Route::get('/schedule/docter/{id}', [ScheduleController::class, 'scheduledoctor'])->name('doctor.doctor');
    Route::post('/schedule/docter/add', [ScheduleController::class, 'scheduledoctoradd'])->name('doctor.doctor.add');

    Route::get('/schedule/liburan', [ScheduleController::class, 'liburan'])->name('schedule.liburan');
    Route::post('/schedule/liburan/add', [ScheduleController::class, 'liburanadd'])->name('schedule.liburan.add');

    Route::get('/schedule/liburan/docter/{id}', [ScheduleController::class, 'liburandoctor'])->name('doctor.doctor.liburan');
    Route::post('/schedule/liburan/docter/add', [ScheduleController::class, 'liburandoctoradd'])->name('doctor.doctor.liburan.add');

    Route::get('/sdm', [SumberdayamController::class, 'index'])->name('sdm');
    Route::post('/sdm/add', [SumberdayamController::class, 'suberdayaadd'])->name('sdm.add');

    Route::get('/sdm/apoteker', [SumberdayamController::class, 'apoteker'])->name('sdm.apoteker');
    Route::post('/sdm/apoteker/add', [SumberdayamController::class, 'apotekeradd'])->name('sdm.apoteker.add');

    Route::get('/sdm/laboratorium', [SumberdayamController::class, 'laboratorium'])->name('sdm.laboratorium');
    Route::post('/sdm/laboratorium/add', [SumberdayamController::class, 'laboratoriumadd'])->name('sdm.laboratorium.add');

    Route::get('/sdm/akuntan', [SumberdayamController::class, 'akuntan'])->name('sdm.akuntan');
    Route::post('/sdm/akuntan/add', [SumberdayamController::class, 'akuntanadd'])->name('sdm.akuntan.add');

    Route::get('/sdm/resepsionis', [SumberdayamController::class, 'resepsionis'])->name('sdm.resepsionis');
    Route::post('/sdm/resepsionis/add', [SumberdayamController::class, 'resepsionisadd'])->name('sdm.resepsionis.add');


    Route::get('/finance', [FinecController::class, 'index'])->name('finance');
    Route::get('/get-all-data/{id}', [FinecController::class, 'getAllData'])->name('get.all.data');

    Route::get('/finance/daig', [FinecController::class, 'pemeriksaan'])->name('finance.daig');
    Route::post('/finance/daig/add', [FinecController::class, 'pemeriksaanadd'])->name('finance.daig.add');

    Route::get('/finance/prosedur', [FinecController::class, 'prosedur'])->name('finance.prosedur');
    Route::post('/finance/prosedur/add', [FinecController::class, 'proseduradd'])->name('finance.prosedur.add');

    Route::get('/finance/kategori', [FinecController::class, 'kategori'])->name('finance.kategori');
    Route::post('/finance/kategori/add', [FinecController::class, 'kategoriadd'])->name('finance.kategori.add');

    Route::get('/finance/biaya', [FinecController::class, 'biaya'])->name('finance.biaya');
    Route::post('/finance/biaya/add', [FinecController::class, 'biayaadd'])->name('finance.biaya.add');

    Route::get('/janji', [JanjiController::class, 'index'])->name('janji');
    Route::get('/janji/get-visit-descriptions/{id}', [JanjiController::class, 'getVisitDescriptions'])->name('janji.visit');


    Route::get('setweb', [websetController::class, 'index'])->name('setweb');
    Route::post('setweb/update', [websetController::class, 'updates'])->name('setweb.update');


    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::post('permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::post('permissions/update', [PermissionController::class, 'update'])->name('permissions.update');
    Route::post('permissions/destroy', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    Route::get('role', [RoleController::class, 'index'])->name('role');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    Route::post('role/update', [RoleController::class, 'update'])->name('role.update');
    Route::post('role/destroy', [RoleController::class, 'destroy'])->name('role.destroy');
    Route::get('role/{roleId}/give', [RoleController::class, 'addPermissionToRole'])->name('role.give');
    Route::put('role/{roleId}/give', [RoleController::class, 'givePermissionToRole'])->name('role.give.put');

    Route::get('user/role-premesion', [SuperAdminController::class, 'userrolepremesion'])->name('user.role-premesion');
    Route::get('user/role-premesion/{user}/edit', [SuperAdminController::class, 'edit'])->name('user.role-premesions');
    Route::put('user/role-premesion/{user}/edit', [SuperAdminController::class, 'update'])->name('user.role-premesion.edit');
    Route::get('user/role-premesion/{user}', [SuperAdminController::class, 'destroy'])->name('user.role-premesion.del');

});



Route::middleware(['auth', 'verified', 'role:Admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});


require __DIR__ . '/auth.php';
