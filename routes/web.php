<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::group(['middleware' => ['role:admin|staff']], function () {
        Route::get('/types',[\App\Http\Controllers\TypeController::class,'index'])->name('types.index');
        Route::get('/type/create',[\App\Http\Controllers\TypeController::class,'create'])->name('type.create');
        Route::post('/type/create',[\App\Http\Controllers\TypeController::class,'save']);

        Route::get('/type/{id}/edit',[\App\Http\Controllers\TypeController::class,'edit'])->name('type.edit');
        Route::post('/type/edit',[\App\Http\Controllers\TypeController::class,'update']);
        Route::delete('/type/{id}/delete',[\App\Http\Controllers\TypeController::class,'delete'])->name('type.destroy');

        Route::get('/categories',[\App\Http\Controllers\CategoryController::class,'index'])->name('categories.index');
        Route::get('/category/create',[\App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
        Route::post('/category/create',[\App\Http\Controllers\CategoryController::class,'save']);
        Route::get('/category/{id}/edit',[\App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
        Route::post('/category/edit',[\App\Http\Controllers\CategoryController::class,'update']);
        Route::delete('/category/{id}/delete',[\App\Http\Controllers\CategoryController::class,'delete'])->name('category.destroy');

        Route::get('/companies',[\App\Http\Controllers\CompanyController::class,'index'])->name('companies.index');
        Route::get('/company/create',[\App\Http\Controllers\CompanyController::class,'create'])->name('company.create');
        Route::post('/company/create',[\App\Http\Controllers\CompanyController::class,'save']);
        Route::get('/company/{id}/edit',[\App\Http\Controllers\CompanyController::class,'edit'])->name('company.edit');
        Route::get('/company/{id}/view',[\App\Http\Controllers\CompanyController::class,'view'])->name('company.view');
        Route::post('/company/edit',[\App\Http\Controllers\CompanyController::class,'update']);
        Route::delete('/company/{id}/delete',[\App\Http\Controllers\CompanyController::class,'delete'])->name('company.destroy');
        Route::get('/company/{id}',[\App\Http\Controllers\CompanyController::class,'view']);

        Route::get('/items',[\App\Http\Controllers\ItemController::class,'index'])->name('items.index');

        Route::get('/item/create',[\App\Http\Controllers\ItemController::class,'create'])->name('item.create');
        Route::post('/item/create',[\App\Http\Controllers\ItemController::class,'save']);
        Route::get('/item/{id}/edit',[\App\Http\Controllers\ItemController::class,'edit'])->name('item.edit');
        Route::post('/item/edit',[\App\Http\Controllers\ItemController::class,'update']);
        Route::delete('/item/{id}/delete',[\App\Http\Controllers\ItemController::class,'delete'])->name('item.destroy');
        Route::get('/item/{id}',[\App\Http\Controllers\ItemController::class,'view']);

        Route::get('/orders',[\App\Http\Controllers\OrderController::class,'index'])->name('orders.index');
        Route::get('/order/create',[\App\Http\Controllers\OrderController::class,'create'])->name('order.create');
        Route::get('/order/{id}/edit',[\App\Http\Controllers\OrderController::class,'edit'])->name('order.edit');
        Route::post('/order/edit',[\App\Http\Controllers\OrderController::class,'update']);
        Route::delete('/order/{id}/delete',[\App\Http\Controllers\OrderController::class,'delete'])->name('order.destroy');
        Route::get('/order/{id}',[\App\Http\Controllers\OrderController::class,'view']);
        Route::get('/order/{id}/send',[\App\Http\Controllers\OrderController::class,'send_view'])->name('order.send');
        Route::post('/order/send',[\App\Http\Controllers\OrderController::class,'send']);


        Route::get('/supplies',[\App\Http\Controllers\SupplyController::class,'index'])->name('supplies.index');
        Route::get('/supply/create',[\App\Http\Controllers\SupplyController::class,'create'])->name('supply.create');
        Route::post('/supply/create',[\App\Http\Controllers\SupplyController::class,'save']);
        Route::get('/supply/{id}/edit',[\App\Http\Controllers\SupplyController::class,'edit'])->name('supply.edit');
        Route::post('/supply/edit',[\App\Http\Controllers\SupplyController::class,'update']);
        Route::delete('/supply/{id}/delete',[\App\Http\Controllers\SupplyController::class,'delete'])->name('supply.destroy');
        Route::get('/supply/{id}',[\App\Http\Controllers\SupplyController::class,'view']);
        Route::get('/supply/{id}/accept',[\App\Http\Controllers\SupplyController::class,'accept_view'])->name('supply.accept');
        Route::post('/supply/accept',[\App\Http\Controllers\SupplyController::class,'accept']);


        Route::get('/users',[\App\Http\Controllers\UserController::class,'index'])->name('users.index');
    });
    Route::post('/order/create',[\App\Http\Controllers\OrderController::class,'save']);

    Route::get('/useritems',[\App\Http\Controllers\ItemController::class,'user_index'])->name('useritems.index');

    Route::get('/myorders',[\App\Http\Controllers\UserController::class,'orders'])->name('user.orders');
    Route::get('/make_order/{id}',[\App\Http\Controllers\UserController::class,'make_order'])->name('user.make_order');
//    VIEW GIVEN ID
});




require __DIR__.'/auth.php';
