<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\{AdminController, DashboardController, CategoryController, UserController};
use PHPUnit\TextUI\XmlConfiguration\Group;

Route::get('/', function () {
    return redirect('dashboard');
});

Route::middleware('auth')->group(function(){
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    // Route::resource('dashboard', DashboardController::class);
    Route::group(['middleware' => 'role:super-admin', 'prefix' => 'admin'], function(){
        Route::get('', [AdminController::class, 'index'])->name('admin.index');
        Route::get('create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('create', [AdminController::class, 'store']);
        Route::get('edit/{user:email}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::patch('edit/{user:email}', [AdminController::class, 'update']);
        Route::delete('delete/{user:email}', [AdminController::class, 'destroy'])->name('admin.destroy');
    });

    Route::middleware('role:super-admin')->group(function(){
        Route::resource('user', UserController::class);
    });
    // authorization : super-admin hanya dapat mendeteksi method middleware permission
    Route::middleware('permission:create category')->prefix('category')->group(function(){
        Route::get('', [CategoryController::class, 'index'])->name('category.index');
        Route::get('create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('create', [CategoryController::class, 'store']);
        Route::get('edit/{category:slug}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::patch('edit/{category:slug}', [CategoryController::class, 'update']);
        Route::delete('edit/{category:slug}', [CategoryController::class, 'destroy']);
    });
});

require __DIR__.'/auth.php';
