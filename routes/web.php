<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListTable\Category;
use App\Http\Controllers\ListTable\NewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\YoutubeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
//frontend
Auth::routes(['verify' => true]);

//frontend
Route::get('/email/verify', function () {
    return view('auth.verify');
})->name('verification.notice');

Route::controller(FrontendController::class)->group(function () {
    Route::any('/', 'index')->name('index');
    Route::any('/about', 'about')->name('about');
    Route::get('/blog/search', 'blog_search')->name('fe_blog.search');
    Route::any('/blog', 'blog')->name('fe_blog');
    Route::any('/category/{id}', 'category')->name('category');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contact_send')->name('contact_send');

    //details
    Route::post('/details/message', 'details_message')->name('details.details_message');
    Route::any('/details/messageloadform/{id}', 'detailsmessageLoadForm')->name('details.detailsmessageLoadForm');
    Route::any('/details/{id}', 'details')->name('details');

    Route::any('/elements', 'elements')->name('elements');
    Route::any('/latest-news', 'latest_news')->name('latest_news');

    //single-blog
    Route::post('/single-blog/message', 'single_blog_message')->name('single_blog.message');
    Route::any('/single-blog/messageloadform/{id}', 'messageLoadForm')->name('single_blog.messageloadform');
    Route::any('/single-blog/{id}', 'single_blog')->name('single_blog');

    //user
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
        Route::put('/user/edit/re-password/{id}', [UserController::class, 'rePassword'])->name('user.re_password');
    });
});
//end frontend

//backend
Route::middleware(['checkRole'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::any('/backend/admin', 'dashboard')->name('be_dashboard');

        Route::put('/backend/profile/update/avatar/{id}', 'profile_update_avatar')->name('be_profile.update_avt');
        Route::put('/backend/profile/update/{id}', 'profile_update')->name('be_profile.update');
        Route::any('/backend/profile/{id}', 'profile')->name('be_profile');

        Route::any('/backend/icon-material', 'icon_material')->name('icon_material');
        Route::any('/backend/pages-error', 'pages_error')->name('pages_error');
    });

    //categories
    Route::get('/backend/categories/search', [Category::class, 'search'])->name('category.search');
    Route::resource('/backend/categories', Category::class);

    //news
    Route::get('/backend/news/search', [NewController::class, 'search'])->name('news.search');
    Route::resource('/backend/news', NewController::class);

    //contact
    Route::get('/backend/contacts/search', [ContactController::class, 'search'])->name('contacts.search');
    Route::resource('/backend/contacts', ContactController::class);

    //blog
    Route::get('/backend/blog/search', [BlogController::class, 'search'])->name('blog.search');
    Route::resource('/backend/blog', BlogController::class);

    //youtube
    Route::get('/backend/youtube/search', [YoutubeController::class, 'search'])->name('youtube.search');
    Route::resource('/backend/youtube', YoutubeController::class);
    //end backend
});

Route::fallback(function () {
    return view('backend.pages.pages_error');
});


