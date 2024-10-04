<?php

// Admin
use App\Http\Controllers\admin\BatteryController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ColourController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductImageController;
use App\Http\Controllers\admin\ScreenController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\VariantController;

//User
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\ProductUserController;

// Auth
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\MemberController;
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');   //trang chủ user
// })->name('index');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/', function () {
    return view('user.index');   // Trang chủ user
})->name('index');

Route::get('/about', function () {
    return view('user.about');
})->name('about');

Route::get(uri: '/shop', action: [ProductUserController::class, 'index'])->name('shop');

Route::get('/product/{id}', [ProductUserController::class, 'show'])->name('product.show');



Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');


//cart của user

Route::middleware('auth')->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart/update/{id}', [CartController::class, 'updateCartItem'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'removeCartItem'])->name('cart.remove');
        
});



Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    

    // Route danh mục
    Route::resource('categories', CategoryController::class);
    Route::get('/admin/categories', function () {
        return view('admin.categories.index');
    });
    // Route người dùng
    Route::resource('users', UserController::class);
    Route::get('/admin/users', function () {
        return view('admin.users.index');
    });
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');

    // Route biến thể
    Route::resource('variants', VariantController::class);
    Route::get('/admin/variants', function () {
        return view('admin.variants.index');
    });

    // Route sản phẩm 
    Route::resource('products', ProductController::class);
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/admin/products', function () {
        return view('admin.products.index');
    });

    // Route nhà cung cấp
    Route::resource('suppliers', SupplierController::class);
    Route::get('/admin/suppliers', function () {
        return view('admin.suppliers.index');
    });
    // Route màn hình
    Route::resource('screens', ScreenController::class);
    Route::get('/admin/screens', function () {
        return view('admin.screens.index');
    });
    //ảnh
    Route::resource('product_image', ProductImageController::class);
    Route::get('/admin/product_image', function () {
        return view('admin.product_image.index');
    });
    // Route màu sắc
    Route::resource('colours', ColourController::class);
    // Route pin
    Route::resource('batterys', BatteryController::class);
    Route::get('/admin/batterys', function () {
        return view('admin.batterys.index');
    });

    Route::get('admin', [AuthController::class, 'dashboard'])
        ->name('dashboard')
        ->middleware(['admin']);
});
// Route login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route register
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('member', [MemberController::class, 'dashboard'])
    ->name('user.index')
    ->middleware(['auth']);
