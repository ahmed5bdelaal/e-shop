<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\RatingController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
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

// Route::get('pdfsh', function () {
//     return view('pdf');
// });
Route::patch('/fcm-token', [HomeController::class, 'updateToken'])->name('fcmToken');
Route::post('settings-first', [HomeController::class, 'settingsUpdate']);

Route::controller(FrontController::class)->group(function(){
    Route::get('/','setting');
    Route::get('about','about');
    Route::get('contact','contact');
    Route::get('get-product/{id}','product');
    Route::get('get-category/{id}','category');
    Route::get('all-products','products');
    Route::get('c-shop','cShop');
    Route::get('product-list','productList');
    Route::post('search','search');
});

Route::middleware(['auth'])->group(function(){

    Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
    Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');
    Route::get('sendmail',[HomeController::class,'sendmail']);
    
    Route::controller(RatingController::class)->group(function(){
        Route::post('add-rating/{id}','addRating');
    });

    Route::controller(CheckoutController::class)->group(function(){
        Route::get('checkout','checkout');
        Route::post('place-order','placeOrder');
    });

    Route::controller(CartController::class)->group(function(){
        Route::get('cart','viewCart');  
        Route::post('add-to-cart','addToCart');
        Route::post('remove-product','removeProduct');
        Route::post('update-cart','updateCart');
        Route::get('load-cart','loadCart'); 
        
    });

    Route::controller(WishlistController::class)->group(function(){
        Route::get('wishlist','viewwishlist');  
        Route::post('add-to-wishlist','addToWishlist');
        Route::post('remove-product-wishlist','removeProduct');
        Route::get('load-wishlist','loadwishlist'); 
        
    });

    Route::controller(FrontController::class)->group(function(){
        Route::get('my-orders','myOrders');
        Route::get('view-order/{id}','viewOrders');
        Route::post('cancelOrder/{id}','cancelOrder');
    });

    Route::controller(UserController::class)->group(function(){
        Route::get('profile','index');
        Route::post('upProfile','upProfile');
        Route::post('upPassword','upPassword');
    });
});

Auth::routes();
Route::get('/login/{social}',[LoginController::class,'socialLogin'])->where('social','twitter|facebook|linkedin|google|github|bitbucket');
Route::get('/login/{social}/callback',[LoginController::class,'handleProviderCallback'])->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::middleware(['auth','isadmin'])->group(function(){

    Route::controller(HomeController::class)->group(function(){
        Route::get('settings','settings');
        Route::post('settings-update','settingsUpdate');
        Route::get('/downloadPDF/{id}','downloadPDF');
        Route::get('/send-email/{id}','sendmail');
        Route::post('/send-notification','notification');
    });

    Route::controller(UserController::class)->group(function(){
        Route::get('users','users');
        Route::post('make-admin/{id}','makeAdmin');
        Route::post('remove-user/{id}','removeUser');
    });

    Route::controller(FrontendController::class)->group(function(){
        Route::get('dashboard','index'); 
        Route::get('d-orders','orders'); 
        Route::get('order-canceled','ordersCanceled');
        Route::get('admin/view-order/{id}','viewOrder');
        Route::post('update-order/{id}','editOrder');
        Route::get('order-history','history');
        Route::get('profits','profits');
        Route::get('notification','notification');
        Route::get('notice','notice');
        Route::post('notice-read','noticeRead');
        Route::get('notice-readAll','noticeReadAll');
    });

    Route::controller(CouponController::class)->group(function(){
        Route::get('coupons','index'); 
        Route::get('add-coupon','add'); 
        Route::post('store-coupon','store');
        Route::post('coupon-store','couponStore');
        Route::post('destroy-coupon/{id}','destroy');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get('categorys','index');
        Route::get('add-category','add');
        Route::post('insert-category','insert');
        Route::get('edit-category/{id}','edit');
        Route::PUT('update-category/{id}','update');
        Route::post('remove-category/{id}','destroy');
    });

    Route::controller(BrandController::class)->group(function(){
        Route::get('brands','index')->name('brands');
        Route::get('add-brand','add');
        Route::post('store-brand','store');
        Route::get('edit-brand/{id}','edit');
        Route::PUT('update-brand/{id}','update');
        Route::post('remove-brand/{id}','destroy');
    });

    Route::controller(ProductController::class)->group(function(){
        Route::get('products','index');
        Route::get('products/all','getPoductDatatable')->name('products.all');
        Route::get('add-product','add');
        Route::post('insert-product','insert');
        Route::get('edit-product/{id}','edit')->name('edit.product');
        Route::PUT('update-product/{id}','update');
        Route::post('remove-product/{id}','destroy');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');
