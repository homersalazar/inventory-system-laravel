<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartsController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [DashboardController::class, 'index']);
Route::resource('dashboard', DashboardController::class);

Route::resource('add', PartsController::class);
Route::post('autocomplete', [PartsController::class, 'autocomplete'])->name('autocomplete');
Route::post('add_quantity', [PartsController::class, 'add_quantity'])->name('add_quantity');
Route::get('remove_index', [PartsController::class, 'remove_index'])->name('remove_index');
Route::match(['get', 'post'],'remove_quantity', [PartsController::class, 'remove_quantity'])->name('remove_quantity');
Route::post('remove_autocomplete', [PartsController::class, 'remove_autocomplete'])->name('remove_autocomplete');
Route::match(['get', 'post'], 'remove_edit/{sku}', [PartsController::class, 'remove_edit'])->name('remove_edit');
Route::match(['get', 'post'], 'edit_parts/{sku}', [PartsController::class, 'edit_parts'])->name('edit_parts');
Route::get('edit_trans/{id}',[PartsController::class,'edit_trans']);


Route::resource('rack', AreaController::class);
Route::get('deact/{id}', [AreaController::class, 'deact'])->name('deact');

Route::resource('brand', BrandController::class);
Route::get('brand_deact/{id}', [BrandController::class, 'brand_deact'])->name('brand_deact');

Route::resource('unit', UnitController::class);

Route::resource('branch', BranchController::class);

//login
Route::get('/', [UserController::class, 'dashboard']);
Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('custom-login', [UserController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [UserController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [UserController::class, 'register'])->name('register');
Route::get('signout', [UserController::class, 'signOut'])->name('signout');







