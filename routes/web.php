<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\modules\DoctorController;
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
