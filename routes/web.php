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
use App\Http\Middleware\SocialMediaController;

use App\Http\Controllers\ZpaydVoController;

//////////    login admin
Route::get('/login',[AuthController::class,'login'])->name('frontend.login');
Route::get('/error/{text}', [AuthController::class, 'error_message'])
     ->name('frontend.error.message');
Route::get('/Registar',[AuthController::class,'Registar'])->name('admin.Registar');
Route::post('/Registar',[AuthController::class,'Registar_add'])->name('admin.Registar.store');
Route::get('/admin/put/key',[AuthController::class,'verifyOtp'])->name('admin.otp.verify');
Route::post('/admin/login/post',[AuthController::class,'login_post'])->name('admin.login.post');
Route::post('/admin/login/passcode',[AuthController::class,'login_passcode'])->name('admin.login.passcode');
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
Route::get('/admin_dashboard',[AdminController::class,'index'])->name('admin.dashboard');


Route::get('/sitting',[SittingController::class,'index'])->name('admin.sitting');

Route::post('/sitting/media/post',[SittingController::class,'media_post'])->name('media_post');


});






Route::get('/ZpaydVoPay',[ZpaydVoController::class,'index'])->name('zpayd');
Route::get('/Zypayd_dashboard',[ZpaydVoController::class,'admin_index'])->name('zpayd.dashboard');
Route::post('/collections/add', [ZpaydVoController::class, 'addCollection'])->name('zpayd.add_collection');
Route::get('/resurce/{id}', [ZpaydVoController::class, 'resurcePage'])->name('zpayd.resurcePage');
Route::post('/api-doc-resources/store', [ZpaydVoController::class, 'storeApiResource'])
    ->name('api.resources.store');
Route::post('/api-doc-endpoint/store', [ZpaydVoController::class, 'storeApiEndpoint'])
    ->name('api.endpoint.store');
// web.php
Route::get('/endpoint/{id}', [ZpaydVoController::class, 'endpoint'])->name('zpayd.endpoint');
// In routes/web.php
Route::delete('/endpoint/delete/{id}', [ZpaydVoController::class, 'endpoint_delete'])->name('delete.endpoint');

Route::get('/api-resource/{id}/params', [ZpaydVoController::class, 'resourceParamsPage'])->name('api.resource.params');
Route::post('/api-resource/params/store', [ZpaydVoController::class, 'storeApiResourceParam'])->name('api.resource.params.store');
Route::delete('/zpayd/collections/{id}', [ZpaydVoController::class, 'destroy'])
    ->name('zpayd.collections.delete');
    Route::delete('/zpayd/resource/{id}', [ZpaydVoController::class, 'destroy_resource'])
    ->name('zpayd.resource.delete');
Route::delete('/zpayd/param/{id}', [ZpaydVoController::class, 'destroy_param'])
    ->name('zpayd.resource.param');
Route::post('/zpayd/collections/update/{id}', [ZpaydVoController::class, 'update'])
    ->name('zpayd.collections.update');

Route::post('/api/resources/update/{id}', [ZpaydVoController::class, 'update_resource'])
    ->name('api.resources.update');

    // Update API Resource Parameter
Route::post('api/resource/params/update/{id}', [ZpaydVoController::class, 'updateApiResourceParam'])->name('api.resource.params.update');
Route::post('/zpayd.endpoint.update/{id}', [ZpaydVoController::class, 'updateApiEndpoint'])
    ->name('zpayd.collections.update');


Route::get('/view-endpoint/{id}', [ZpaydVoController::class, 'viewendposint'])->name('view.enfpoint');
