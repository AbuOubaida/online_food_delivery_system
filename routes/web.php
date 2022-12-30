<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\client\ClientProductController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\vendor\VendorDashboardController;
use App\Http\Controllers\vendor\VendorProductController;
use Illuminate\Support\Facades\Route;

#.1. For root directory for general user/Home page+++++++++++++++++++++++++++++++
Route::controller(HomeController::class)->group(function (){
    Route::match(['get','post'],'/','index')->name('root');
    Route::match(['get','post'],'about','about')->name('about');
    Route::match(['get','post'],'contact','contact')->name('contact');
});
Route::controller(ClientProductController::class)->group(function (){
    Route::match(['get','post'],'single-view-product/{productSingleID}','index')->name('client.single.product.view');
    Route::match(['get','post'],'shop','show')->name('client.product.list');
    Route::match(['get','post'],'add-to-cart/{PID}','addToCart')->name('name.add.to.cart');
    Route::match(['get','post'],'shop-cart','viewCart')->name('view.cart');
    Route::patch('update-cart','updateCart')->name('update.cart');
    Route::delete('remove-from-cart','deleteCart')->name('delete.cart');
    Route::middleware('auth')->group(function (){
        Route::match(['get','post'],'checkout','checkOut')->name('order.checkout');
    });
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
                Route::delete('delete-user','destroy')->name('admin.delete.user');
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
                Route::match(['get','post'],'add-product','create')->name('vendor.add.product'); //url like localhost/vendor/product/add-product
                Route::match(['get'],'list','show')->name('vendor.list.product'); //url like localhost/vendor/product/list
                Route::match(['get','post'],'edit-product/{productID}','edit')->name('vendor.edit.product');
                Route::match(['get'],'view-product/{productID}','viewProduct')->name('vendor.view.product');
                Route::delete('delete-product','destroy')->name('vendor.delete.product');

                Route::match(['get','post'],'add-category','createCategory')->name('vendor.add.category');
                Route::match(['get'],'list-category','showCategory')->name('vendor.list.category');
                Route::match(['get','post'],'edit-category/{categoryID}','editCategory')->name('vendor.edit.category');
                Route::match(['get'],'view-category/{categoryID}','viewCategory')->name('vendor.view.category');
                Route::delete('delete-category','destroyCategory')->name('vendor.delete.category');

            });

            Route::controller(\App\Http\Controllers\vendor\orderController::class)->group(function (){
                Route::get('new-order-list','newOrder')->name('new.order.list');
                Route::get('del-order-list','delOrder')->name('del.order.list');
                Route::get('new-order-delivery/{oID}','orderDelivery')->name('order.delivery');
                Route::post('update-order-delivery','updateOrderDelivery')->name('update.order');
            });
        });
    });

//    for user role
    Route::group(['middleware' => ['auth','role:user'],'prefix' => 'user'],function (){
        Route::controller(\App\Http\Controllers\user\UserDashboardController::class)->group(function (){
            Route::match(['get','post'],'dashboard','index')->name('user.dashboard');
        });

        Route::controller(\App\Http\Controllers\user\OrderController::class)->group(function (){
            Route::get('my-order-list','myOrder')->name('my.order.list');
        });
    });
});

require __DIR__.'/auth.php';
