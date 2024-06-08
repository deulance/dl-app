<?php

use App\Http\Controllers\AdminControllers\DeulanceBoardController;
use App\Http\Controllers\AdminControllers\AuthController;
use App\Http\Controllers\AdminControllers\AdminController;
use App\Http\Controllers\AdminControllers\RoleController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;
use App\Http\Middleware\CheckAdminPermission;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin_login');
});

Route::prefix('admin')->group(function(){

    Route::post('/logedIn', [AuthController::class, 'loginProcess'])->name('admin_login_process');
    Route::get('/login', [AuthController::class, 'login'])->name('admin_login');
    Route::group(['middleware' => ['auth.admin']], function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('admin_logout');
        
        Route::get('/dashboard', [AuthController::class, 'dasboard'])->name('admin_dashboard');
        
        Route::get('/profile', [AuthController::class, 'admin_profile'])->name('admin_profile');
        Route::post('/update_profile', [AuthController::class, 'update_profile'])->name('update_profile');
        Route::post('/change_password', [AuthController::class, 'update_password'])->name('update_password');

        
        Route::get('/deulanceboard', [DeulanceBoardController::class, 'index'])->middleware(CheckAdminPermission::class . ':"Leaderboard"')->name('admin.deulanceboard');
        Route::post('/deulanceboard/fetch_data', [DeulanceBoardController::class, 'fetch_data'])->middleware(CheckAdminPermission::class . ':"Leaderboard"')->name('admin.deulanceboard.fetch');
        
        
        Route::name('admin.')->group(function() {
            Route::resource('admins', AdminController::class)->middleware(CheckAdminPermission::class . ':"Manage Users"');
            Route::post('admin/add', [AdminController::class, 'store'])->name('add_admin');

            Route::resource('roles', RoleController::class)->middleware(CheckAdminPermission::class . ':"Manage Roles"');
            Route::post('roles/add', [RoleController::class, 'store'])->name('add_role');


        });

       
    });
});
