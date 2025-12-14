<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\FrontendController;
Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
Route::get('/Contect-us',[FrontendController::class,'Contectus'])->name('frontend.contect');