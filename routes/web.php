<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerUserController;

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




// Define the frontend.home route as the default route when the application is accessed
Route::get('/', function () {
    return redirect()->route('frontend.home');
});




Route::get('/', [HomeController::class,'redirect']);
Route::get('/', [HomeController::class,'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/logout', [HomeController::class,'logout']);

Route::middleware('admin')->group(function () {

    //Category Routes
    Route::resource('/categories', CategoryController::class);
    Route::get('/cat-status{category}', [CategoryController::class,'change_status']);
    
    //Sub-Category Routes
    Route::resource('/sub-categories', SubCategoryController::class);
    Route::get('/subcat-status{subcategory}', [SubCategoryController::class,'change_status']);

    //Brand Routes
    Route::resource('/brands', BrandController::class);
    Route::get('/brand-status{brand}', [BrandController::class,'change_status']);

    //Product Routes
    Route::resource('/products', ProductController::class);
    Route::get('/product-status{product}', [ProductController::class,'change_status']);

    //Order manage Routes
    Route::get('/manage_order', [OrderController::class,'manage_order']);
    Route::get('/view_order/{id}', [OrderController::class,'view_order']);
    Route::get('/manage_user', [OrderController::class,'manage_user']);


});

Route::middleware('user')->group(function () {
    // Add routes for user-specific functionality here
});  

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//frontend webside routes

Route::get('/index',[WebHomeController::class,'index'])->name('frontend.home');
Route::get('/view-details{id}',[WebHomeController::class,'view_details']);
Route::get('/product_by_cat/{id}',[WebHomeController::class,'product_by_cat']);
Route::get('/product_by_subcat/{id}',[WebHomeController::class,'product_by_subcat']);
Route::get('/product_by_brand/{id}',[WebHomeController::class,'product_by_brand']);

//add-to-cart webside routes
Route::post('/addTOCart', [CartController::class, 'addTOCart'])->name('addTOCart');
Route::get('/deletecart/{id}',[CartController::class,'deletecart']);
Route::get('/view_cart',[CartController::class,'view_cart']);
Route::post('/updateCart',[CartController::class,'updateCart'])->name('updateCart');

Route::post('add/to-cart/{prouct_id}','CartController@addToCart');
Route::get('cart','CartController@cartPage');
Route::get('cart/destroy/{cart_id}','CartController@destroy');
Route::post('cart/quantity/update/{cart_id}','CartController@quantityUpdate');



Route::post('/customer_login', [CustomerUserController::class, 'customer_login']);
Route::post('/customer_registration', [CustomerUserController::class, 'customer_registration']);
Route::get('/login_register', [CustomerUserController::class, 'showLoginRegisterForm'])->name('login_register');
Route::get('/registration', [CustomerUserController::class, 'showRegistrationForm'])->name('registration');
Route::get('/cus_logout', [CustomerUserController::class, 'cus_logout'])->name('cus_logout');

// Route for checkout page
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/login_check', [CheckoutController::class, 'login_check'])->name('login_check');

Route::post('/save_shipping_address', [CheckoutController::class, 'save_shipping_address'])->name('save_shipping_address');
Route::get('/payment', [CheckoutController::class, 'payment'])->name('payment');
Route::post('/order_place', [CheckoutController::class, 'order_place'])->name('order_place');
Route::get('/my_orders', [CheckoutController::class, 'my_orders'])->name('my_orders');




require __DIR__.'/auth.php';
