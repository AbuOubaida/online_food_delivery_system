<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\vendor\VendorDashboardController;
use App\Http\Controllers\vendor\VendorProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


#.2. Group for Authenticate User Access+++++++++++++++++++++++++++++++++++++++++
Route::get('admin',function (){
    return redirect()->route('login');
});
Route::middleware('auth')->group(function () {
    #.2.1.For Redirect Auth of role page++++++++++++++++++++++++++++++++++++++
    Route::get('route-controller',[RouteController::class,'index'])->name('route.controller');
    //--------------------End 2.1 Redirect Auth of role page-----------------
    #.2.2.Group For admin role access++++++++++++++++++++++++++++++++++++++++
    Route::group(['middleware' => ['auth','role:superadmin'],'prefix' => 'admin'],function(){
        Route::controller(AdminDashboardController::class)->group(function (){
            Route::match(['get','post'],'dashboard','index')->name('admin.dashboard');
        });

        Route::group(['prefix'=>'user'],function (){
            Route::controller(AdminUserController::class)->group(function (){
                Route::match(['get','post'],'add','create')->name('admin.add.user');
                Route::match(['get'],'list','show')->name('admin.list.user');
            });
        });

    });
    #.2.3.Group For vendor role access++++++++++++++++++++++++++++++++++++
    Route::group(['middleware' => ['auth','role:vendor'],'prefix' => 'vendor'],function (){
        Route::controller(VendorDashboardController::class)->group(function (){
            Route::match(['get','post'],'dashboard','index')->name('vendor.dashboard');
        });
        Route::group(['prefix'=>'product'],function (){
            Route::controller(VendorProductController::class)->group(function (){
                Route::match(['get','post'],'add','create')->name('vendor.add.product');
                Route::match(['get'],'list','show')->name('vendor.list.product');
            });
        });
    });
});

require __DIR__.'/auth.php';
