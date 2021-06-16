<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });


    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    //Admin Route

    Route::get('/admin' , [App\Http\Controllers\AdminPanelController::class , 'adminLogin'])->name('admin.login');
    Route::get('/admin-register' , [App\Http\Controllers\AdminPanelController::class , 'adminRegister'])->name('admin.register');
    Route::get('/admin-panle' , [App\Http\Controllers\AdminPanelController::class , 'adminPanel'])->name('admin.panel');


    //Tag Controller
    Route::get('/tags' , [App\Http\Controllers\TagController::class, 'index'])->name('tags.show');
    Route::post('/tags-add' , [App\Http\Controllers\TagController::class, 'tagAdd'])->name('tagadd.show');
    Route::get('/tags-all' , [App\Http\Controllers\TagController::class, 'tagAll'])->name('tagall.show');
    Route::get('/tags-status/{id}' , [App\Http\Controllers\TagController::class, 'tagStatus'])->name('tagstatus.show');
    Route::get('/tags-edit/{id}' , [App\Http\Controllers\TagController::class, 'tagEdit'])->name('tagdit.show');
    Route::post('/tags-edit/{id}' , [App\Http\Controllers\TagController::class, 'tagUpdate'])->name('tagupdate.show');
    Route::get('/tags-delete/{id}' , [App\Http\Controllers\TagController::class, 'tagDelete'])->name('tagdelete.show');


    //Category Route
    Route::get('/category' , [App\Http\Controllers\CategoryController::class, 'index'])->name('show.category');
    Route::post('/category-add' , [App\Http\Controllers\CategoryController::class, 'categoryAdd'])->name('show.categoryadd');
    Route::get('/category-all' , [App\Http\Controllers\CategoryController::class, 'categoryAll'])->name('show.categoryall');
    Route::get('/category-status/{id}' , [App\Http\Controllers\CategoryController::class, 'categoryStatus'])->name('show.categorystatus');
    Route::get('/category-edit/{id}' , [App\Http\Controllers\CategoryController::class, 'categoryEdit'])->name('show.categoryedit');
    Route::post('/category-edit/{id}' , [App\Http\Controllers\CategoryController::class, 'categoryUpdate'])->name('show.categoryupdate');
    Route::get('/category-delete/{id}' , [App\Http\Controllers\CategoryController::class, 'categoryDelete'])->name('show.categorydelete');
























