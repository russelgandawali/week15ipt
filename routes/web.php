<?php
use App\Models\Product;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;

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


//list all products
Route::get('/', [ProductController::class,'index']);


//show single product
Route::get('/product/{product}', [ProductController::class, 'show']);

//show create form
Route::get('/products/create',[ProductController::class,'create'])->name('products.create')->middleware('auth');

//show products2
Route::get('/products/products2',[ProductController::class,'products2']);

//show manage products
Route::get('/products/manage',[ProductController::class,'manage'])->name('products.manage')->middleware('auth');

//save form
Route::post('/products', [ProductController::class, 'store'])->middleware('auth');

//delete record 
Route::delete('products/{product}', [ProductController::class, 'destroy'])->middleware('auth');

//update form 
Route::get('product/{product}/edit',[ProductController::class, 'edit'])->middleware('auth');

//save update form 
Route::put('products/{product}', [ProductController::class, 'update'])->middleware('auth');

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

//register
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//save register
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

//login
Route::get('/login', function(){
    return response("this is the login page");
})->name('login')->middleware('guest');

//logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//login form 
Route::get('/login', [UserController::class, 'login']);

//authenticatation
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


//route for user only
Route::get('/user', function(){
    return response("welcome user!");
})->middleware('user');

//route for admin only
Route::get('/admin', function(){
    return response("welcome admin!" . (auth()->user()->role));
})->middleware('admin');

//list of user routes
Route::middleware(['user'])->group(function(){
    Route::get('/home', [UserController::class, 'index'])->name('user.home');
    //other routes for any type of user
});

Route::middleware(['admin'])->group(function(){
Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//other routes for admin only
});

Route::get('image-upload', [ ImageUploadController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');
?>