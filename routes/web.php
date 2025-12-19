<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\FrontendController;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\BlogController;
use  App\Http\Controllers\CategoryController;
use  App\Http\Controllers\ContectController;
use  App\Http\Controllers\SittingController;
use  App\Http\Controllers\EmailsController;
use  App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminAuth;



//////////    login admin
Route::get('/login',[AuthController::class,'login'])->name('frontend.login');
Route::get('/Registar',[AuthController::class,'Registar'])->name('admin.Registar');
Route::post('/Registar',[AuthController::class,'Registar_add'])->name('admin.Registar.store');
Route::get('/admin/put/key',[AuthController::class,'verifyOtp'])->name('admin.otp.verify');
Route::post('/admin/login/post',[AuthController::class,'login_post'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout')->middleware(AdminAuth::class);


////  site frontend pages



Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
Route::get('/Contect-us',[FrontendController::class,'Contectus'])->name('frontend.contect');
Route::get('/bogs',[FrontendController::class,'bogs'])->name('frontend.blogs');
Route::get('/bogs/seach/',[FrontendController::class,'bogs_search'])->name('frontend.search');
Route::get('/bog-view',[FrontendController::class,'bogs__view'])->name('frontend.bogs-view');
Route::get('/Services',[FrontendController::class,'Services'])->name('frontend.Services');
Route::get('/Aboute-us',[FrontendController::class,'Aboute'])->name('frontend.Aboute');




/////////  admin frontend site
////////////////////      Categories         ////////////
Route::middleware([AdminAuth::class])->group(function () {
Route::get('/Categories',[CategoryController::class,'index'])->name('admin.Categories');
Route::post('/Categoryadd',[CategoryController::class,'store'])->name('admin.Categoryadd');
Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('admin.Categories.delete');
Route::get('/eid/{id}',[CategoryController::class,'eid'])->name('admin.Categories.edit');
Route::put('/update/{id}',[CategoryController::class,'update'])->name('admin.Categories.update');
Route::get('/admin/categories/search', [CategoryController::class, 'search'])->name('admin.categories.search');


//////////////////////     blogs //////////////////

Route::get('/manage_blogs',[BlogController::class,'index'])->name('admin.blogs');
Route::post('/manage_add',[BlogController::class,'store'])->name('admin.blogs.store');
Route::get('/manage_eid/{id}',[BlogController::class,'eid'])->name('admin.blogs.eid');
   Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('admin.blogs.update');
   Route::delete('/blog/delete/{id}', [BlogController::class, 'delete'])->name('admin.blog.delete');
Route::get('/admin/blogs/search', [BlogController::class, 'search'])->name('admin.blogs.search');
 /////////////////////////        //////////////////////
Route::get('/manage_blogs_seo/{id}',[BlogController::class,'blog_seo'])->name('admin.blogs.seo');
Route::put('/manage_blogs_seo/update/{id}',[BlogController::class,'blog_seo_update'])->name('admin.blogs.update.seo');
Route::get('/blog/view/{id}',[BlogController::class,'blog_view'])->name('admin.blogs.view');

 ///////////////  Comments   ///////////////////////////
Route::get('/Comments',[ContectController::class,'index'])->name('admin.Comments');
Route::post('/coment/store',[ContectController::class,'store'])->name('admin.Comments.store');

///////////////// emailsS  ///////////////////////

Route::get('/emailsS',[EmailsController::class,'index'])->name('admin.emails');
Route::post('/emailsS_store',[EmailsController::class,'index_store'])->name('admin.emails.store');

///////////// dashboard ///////////////////
Route::get('/admin_dashboar',[AdminController::class,'index'])->name('admin.dashboard');


Route::get('/sitting',[SittingController::class,'index'])->name('admin.sitting');

});