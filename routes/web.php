<?php

// use App\Http\Controllers\backend\AdminController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\backend\BrandsController;
use App\Http\Controllers\backend\ProductsController;
use App\Http\Controllers\frontend\CustomerController;
use App\Http\Controllers\frontend\PaymentsController;
use App\Http\Controllers\backend\CategoriesController;
use App\Http\Controllers\backend\SubcategoriesController;
use App\Http\Controllers\backend\AdminController as BackendAdminController;

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

//Admins Routes 

Route::group(['prefix' => 'admin'], function () {
    route::get('/login/from', [AdminController::class, 'login_from'])->name('admin.from');
    route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    
    Route::group(['middleware' => 'checkAdmin'], function () {
        
        // admin dashbord || backend dashbord Routes
        Route::get('/dashbord', [BackendAdminController::class, 'backendHomePage'])->name('admin.dashboard');

        // admin Routes
        Route::group(['prefix' => 'admin'], function () {
            
            Route::get('/', [BackendAdminController::class, 'list'])->name('admin');
            Route::get('/add', [BackendAdminController::class, 'from'])->name('admin.add');
            Route::post('/store', [BackendAdminController::class, 'store'])->name('sotre.admin');
            Route::get('/delete/{id}', [BackendAdminController::class, 'delete'])->name('delete.admin');
            Route::get('/edit/{id}', [BackendAdminController::class, 'edit'])->name('edit.admin');
            Route::post('/update/{id}', [BackendAdminController::class, 'update'])->name('update.admin');
            Route::get('/view/{id}', [BackendAdminController::class, 'view'])->name('view.admin');
        });

        // admin Profile Routes
        Route::group(['prefix' => 'profile'], function () {
        Route::get('/profile', [BackendAdminController::class, 'profile'])->name('admin.profile');
        Route::get('/profile/edit/{id}', [BackendAdminController::class, 'edit_profile'])->name('admin.profile.edit');
        Route::post('/profile/update/{id}', [BackendAdminController::class, 'update_profile'])->name('admin.profile.update');
        });
        // customer Routes
        Route::group(['prefix' => 'customer'], function () {
            Route::get('/list', [CustomerController::class, 'list'])->name('customer.list');
            Route::get('/from', [CustomerController::class, 'from'])->name('add.customer');
            Route::post('/store', [CustomerController::class, 'store'])->name('sotre.customer');
            Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('delete.customer');
            Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('edit.customer');
            Route::post('/update/{id}', [CustomerController::class, 'update'])->name('update.customer');
            Route::get('/view/{id}', [CustomerController::class, 'view'])->name('view.customer');
        });


        // category Routes
        Route::group(['prefix' => 'category'], function () {
            Route::get('/list', [CategoriesController::class, 'list'])->name('category.list');
            Route::get('/add', [CategoriesController::class, 'form'])->name('category.add');
            Route::post('/stor', [CategoriesController::class, 'store'])->name('category.store');
            Route::get('/delete/{id}', [CategoriesController::class, 'delete'])->name('category.delete');
            Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('category.edit');
            Route::post('/update/{id}', [CategoriesController::class, 'update'])->name('category.update');
            Route::get('/view/{id}', [CategoriesController::class, 'view'])->name('category.view');
        });

        // SubCategory
        Route::group(['prefix' => 'subcategory'], function () {
            Route::get('/list', [SubcategoriesController::class, 'list'])->name('subcategory.list');
            Route::get('/from', [SubcategoriesController::class, 'form'])->name('subcategory.add');
            Route::post('/store', [SubcategoriesController::class, 'store'])->name('store.subcategory');
            Route::get('/delete/{id}', [SubcategoriesController::class, 'delete'])->name('subcategory.delete');
            Route::get('/edit/{id}', [SubcategoriesController::class, 'edit'])->name('subcategory.edit');
            Route::post('/update/{id}', [SubcategoriesController::class, 'update'])->name('subcategory.update');
            Route::get('/view/{id}', [SubcategoriesController::class, 'view'])->name('subcategory.view');
        });


        // Brands Routes
        Route::get('/brand/list', [BrandsController::class, 'list'])->name('brand.list');
        Route::get('/add/brands', [BrandsController::class, 'form'])->name('add.brands');
        Route::post('/stor/brands', [BrandsController::class, 'stor'])->name('sotre.brand');

        // Product Routes
        Route::get('/products', [ProductsController::class, 'list'])->name('product.list');
        Route::get('/add/products', [ProductsController::class, 'form'])->name('add.product');
        Route::get('/delete/products/{id}', [ProductsController::class, 'delete'])->name('delete.product');
        Route::get('/edit/products/{id}', [ProductsController::class, 'edit'])->name('edite.product');
        Route::put('/update/products/{id}', [ProductsController::class, 'update'])->name('update.products');
        Route::post('/store/products', [ProductsController::class, 'store'])->name('store.products');

        // Orders Routes
        Route::get('/order/list', [CartController::class, 'list'])->name('order.list');
        Route::get('/add/order', [CartController::class, 'orderList'])->name('add.orders');
        Route::post('/see/order', [CartController::class, 'seeorderList'])->name('see.orders');

        // OrderDetails Routes
        Route::get('/orderdetails', [CartController::class, 'list'])->name('orderdetails.list');

        // Payment Routes
        Route::get('/payment', [PaymentsController::class, 'list'])->name('payment.list');
        Route::get('/see/payment', [PaymentsController::class, 'paymentList'])->name('see.payments');
        Route::get('/see/payment', [PaymentsController::class, 'seepayments'])->name('see.payments');
   


    // backend Logout
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');


    });
});


// frontend routes

Route::get('/', [HomeController::class, 'forntendHomePage'])->name('home');
