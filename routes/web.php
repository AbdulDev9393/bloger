<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\FrontendController;
Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
Route::get('/Contect-us',[FrontendController::class,'Contectus'])->name('frontend.contect');
Route::get('/bogs',[FrontendController::class,'bogs'])->name('frontend.blogs');
Route::get('/bog-view',[FrontendController::class,'bogs__view'])->name('frontend.bogs-view');
Route::get('/Services',[FrontendController::class,'Services'])->name('frontend.Services');
Route::get('/Aboute-us',[FrontendController::class,'Aboute'])->name('frontend.Aboute');