<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

//frontend 
Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');
});

//this is when the user is not loged in 
Route::middleware(['auth'])->group(function () {
    //wishlist
        Route::get('/wishlist',[App\Http\Controllers\Frontend\WishlistController::class,'index'] );
        Route::get('/cart',[App\Http\Controllers\Frontend\CartController::class,'index']);
        Route::get('/checkout',[App\Http\Controllers\Frontend\CheckoutController::class,'index']);
        Route::get('/orders',[App\Http\Controllers\Frontend\OrderController::class,'index']);
        Route::get('/orders/{orderId}',[App\Http\Controllers\Frontend\OrderController::class,'show']);

   
});

Route::get('thank-you',[App\Http\Controllers\Frontend\FrontendController::class,'thankyou']);


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    //dashboard
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    //categroy part routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{Category}/', 'update');
    });
    //Product controller
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{produc}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/products/{product_id}/delete/', 'destroy');

        Route::get('/product-image/{product_image_id}/delete/', 'destroyImage');

        Route::post('/product-color/{prod_color_id}', 'updateProdColorQty');
        Route::get('/product-color/{prod_color_id}/delete', 'deleteProdColor');
    });
    //Brand part routes
    Route::get('/brands', [App\Http\Controllers\Admin\BrandController::class, 'index'])->name('index');

    //color controller
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color_id}', 'update');
        Route::get('/colors/{color_id}/delete', 'destroy');
    });
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/slider', 'index');
        Route::get('/slider/create', 'create');
        Route::post('/slider/create', 'store');
        Route::get('/slider/{slider_id}/edit', 'edit');
        Route::put('/slider/{slider_id}', 'update');
        Route::get('/slider/{slider_id}/delete', 'destroy');
    });
});
