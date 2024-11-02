<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ReportController;

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

/*Route::get('/', function () {
    return view('Auth\login');
});*/

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::post('/logout', 'logOut')->name('logout');
});

Route::controller(RegisterController::class)->group(function(){


    Route::get('/register', 'register1')->name("register1");
    Route::get('/register/step2', 'register2')->name("register2");
    Route::get('/register/step3', 'register3')->name("register3");

    Route::post('/register/step1', 'register_1')->name("register_1");
    Route::post('/register/step2', 'register_2')->name("register_2");
    Route::post('/register/step3', 'register_3')->name("register_3");


    Route::get('/interest', 'seeInterest')->name('seeInterest');
    Route::post('/interests', 'interest')->name('store.interest');

    # Register dropdowns routes================================

     Route::get('/provinces', 'getProvinces')->name('register.getProvinces');
     Route::get('/municepes', 'getMunicipes')->name('register.getMunicipes');
     Route::get('/neighbor', 'getNeighbors')->name('Register.getNeighbors');

    # End register dropdowns routes============================
});

Route::controller(GuestController::class)->group(function(){
    Route::get('/', 'index')->name('guest.indxe');
    Route::post('/register', 'store')->name('store.company');
});

Route::controller(ProfileUserController::class)->group(function(){

    Route::get('/profile', 'index')->name('profile.index');

    Route::post('/updatePhoto', 'updateFoto')->name('profile.updateFoto');
    Route::put('/profile', 'update')->name('profile.update');




});

Route::controller(CompanyController::class)->group(function(){
    Route::get('/company', 'index')->name('companies.index');
    Route::get('/changeCompany', 'changeCompany')->name('companies.change');
    Route::get('/company/{name}', 'profile')->name('companies.profile');
    Route::get('/liked', 'liked')->name("liked");

    Route::post('/countVisitor', 'viewCount')->name('companyprofile.viewcount');
});
Route::controller(DeliveryController::class)->group(function () {
    Route::post('/delivery', 'store')->name('delivery.store');
    Route::get('/getMarca', 'getMarca')->name("delivery.getMarca");
    Route::get('/getModelo', 'getModelo')->name("delivery.getModelo");
});

Route::controller(ProductController::class)->group(function(){
    Route::post('/store/{nome}', 'store')->name('product.store');
    Route::get('/product_detail/{id}', 'productDetail')->name('product.detail');
});

Route::controller(PostController::class)->group(function(){

    Route::get('/posts', 'index')->name('posts.index');
    Route::post('/posts', 'store')->name('post.store');

    Route::get('/getPrice', 'getPlanPrice')->name('post.getPlanPrice');
    Route::get('/getsponsorPrice', 'getSponsorPrice')->name('post.getSponsorPrice');


    Route::post('/posts/increment-view','postViewCount')->name('posts.viewCount');

});

Route::controller(LikeController::class)->group(function(){
    Route::post('/like', 'likes')->name("like.store");
    Route::post('/likess', 'reverseLikes')->name("reverselike.store");
});

Route::controller(CommentController::class)->group(function(){
    Route::get('/comment/{id}', 'all')->name('comment.all');
    Route::post('/comment', 'commentStore')->name('comment.store');
});

Route::controller(FavoriteController::class)->group(function(){
    Route::get('/favorite', 'index')->name('favorite.index');
    Route::post('/favorite', 'store')->name('favorite.store');
    Route::post('/unfavor','unfavors')->name('unfavor');
    Route::get('/showAll', 'showAllfavorites')->name('favorite.showAll');

});
Route::controller(FollowController::class)->group(function(){
    Route::get('/follow', 'store')->name('follow.store');
    Route::get('/unfollow', 'destroy')->name('follow.destroy');
});

Route::controller(ReportController::class)->group(function(){
    Route::get('/report', 'index')->name('report.index');
    Route::get('/top5', 'top5')->name('report.top');
});

Route::controller(NotificationsController::class)->group(function(){
    Route::get('/notifications','index')->name('notifications.index');
});
