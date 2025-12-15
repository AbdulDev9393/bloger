<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\FrontendController;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\BlogController;
use  App\Http\Controllers\CategoryController;
use  App\Http\Controllers\ContectController;
use  App\Http\Controllers\SittingController;
use  App\Http\Controllers\EmailsController;







////  site frontend pages



Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
Route::get('/Contect-us',[FrontendController::class,'Contectus'])->name('frontend.contect');
Route::get('/bogs',[FrontendController::class,'bogs'])->name('frontend.blogs');
Route::get('/bog-view',[FrontendController::class,'bogs__view'])->name('frontend.bogs-view');
Route::get('/Services',[FrontendController::class,'Services'])->name('frontend.Services');
Route::get('/Aboute-us',[FrontendController::class,'Aboute'])->name('frontend.Aboute');




/////////  admin frontend site
////////////////////      Categories         ////////////
Route::get('/Categories',[CategoryController::class,'index'])->name('admin.Categories');
Route::post('/Categoryadd',[CategoryController::class,'store'])->name('admin.Categoryadd');
Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('admin.Categories.delete');
Route::get('/eid/{id}',[CategoryController::class,'eid'])->name('admin.Categories.edit');
Route::put('/update/{id}',[CategoryController::class,'update'])->name('admin.Categories.update');
Route::get('/admin/categories/search', [CategoryController::class, 'search'])->name('admin.categories.search');


//////////////////////     blogs //////////////////
Route::get('/manage_blogs',[BlogController::class,'index'])->name('admin.blogs');
Route::post('/manage_add',[BlogController::class,'store'])->name('admin.blogs.store');






Route::get('/admin_dashboar',[AdminController::class,'index'])->name('admin.dashboard');


Route::get('/Comments',[ContectController::class,'index'])->name('admin.Comments');
Route::get('/sitting',[SittingController::class,'index'])->name('admin.sitting');
Route::get('/emailsS',[EmailsController::class,'index'])->name('admin.emails');
