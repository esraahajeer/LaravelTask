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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//User   
Route::get('/UsersIndex', [App\Http\Controllers\UserController::class, 'UsersIndex'])->name('UsersIndex');
Route::get('/createUser', [App\Http\Controllers\UserController::class, 'User'])->name('createUser');
Route::post('/AddUser', [App\Http\Controllers\UserController::class, 'create'])->name('AddUser');
Route::get('/getUserById/{id}', [App\Http\Controllers\UserController::class, 'userById'])->name('getUserById');
Route::post('/editUser/{id}', [App\Http\Controllers\UserController::class, 'editUser'])->name('editUser');
Route::get('/deleteUser/{id}', [App\Http\Controllers\UserController::class, 'UserDelete'])->name('deleteUser');
//Category 
Route::get('/CategoriesIndex', [App\Http\Controllers\categoryController::class, 'CategoriesIndex'])->name('CategoriesIndex');
Route::get('/createCategory', [App\Http\Controllers\categoryController::class, 'Category'])->name('createCategory');
Route::post('/AddCategory', [App\Http\Controllers\categoryController::class, 'create'])->name('AddCategory');
Route::get('/getCategoryById/{id}', [App\Http\Controllers\categoryController::class, 'CategoryById'])->name('getCategoryById');
Route::post('/editCategory/{id}', [App\Http\Controllers\categoryController::class, 'editCategory'])->name('editCategory');
Route::get('/deleteCategory/{id}', [App\Http\Controllers\categoryController::class, 'CategoryDelete'])->name('deleteCategory');
//Product
Route::get('/ProductsIndex', [App\Http\Controllers\productController::class, 'ProductsIndex'])->name('ProductsIndex');
Route::get('/createProduct', [App\Http\Controllers\productController::class, 'Product'])->name('createProduct');
Route::post('/AddProduct', [App\Http\Controllers\productController::class, 'create'])->name('AddProduct');
Route::get('/getProductById/{id}', [App\Http\Controllers\productController::class, 'ProductById'])->name('getProductById');
Route::post('/editProduct/{id}', [App\Http\Controllers\productController::class, 'editProduct'])->name('editProduct');
Route::get('/deleteProduct/{id}', [App\Http\Controllers\productController::class, 'ProductDelete'])->name('deleteProduct');
Route::get('/Remove/{id}', [App\Http\Controllers\productController::class, 'RemoveQuantity'])->name('Remove');
Route::get('/showInfo/{id}', [App\Http\Controllers\productController::class, 'showInfo'])->name('showInfo');

