<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::permanentRedirect('/', '/blog');

Auth::routes(['verify' => true]);

Route::group(['namespace' => 'App\Http\Controllers\Main', 'prefix' => 'blog'], function() {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');
    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function () {
        Route::post('/', 'StoreController')->name('post.comment.store');
        Route::group(['prefix' => '/{comment}'], function () {
            Route::delete('/', 'DestroyController')->name('post.comment.destroy');
        });
    });
    Route::group(['namespace' => 'Favourite', 'prefix' => '{post}/favourites'], function () {
        Route::post('/', 'StoreController')->name('post.favourite.store');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Category', 'prefix' => 'categories'], function () {
    Route::get('/', 'IndexController')->name('category.index');
    Route::get('/{category}', 'ShowController')->name('category.show');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function() {
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function() {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DestroyController')->name('admin.category.destroy');
        Route::get('/{category}/restore', 'RestoreController')->withTrashed()->name('admin.category.restore');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function() {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DestroyController')->name('admin.tag.destroy');
        Route::get('/{tag}/restore', 'RestoreController')->withTrashed()->name('admin.tag.restore');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function() {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');
        Route::get('/{post}/restore', 'RestoreController')->withTrashed()->name('admin.post.restore');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function() {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DestroyController')->name('admin.user.destroy');
        Route::get('/{user}/restore', 'RestoreController')->withTrashed()->name('admin.user.restore');
    });

    Route::group(['namespace' => 'Role', 'prefix' => 'roles'], function() {
        Route::get('/', 'IndexController')->name('admin.role.index');
        Route::get('/create', 'CreateController')->name('admin.role.create');
        Route::post('/', 'StoreController')->name('admin.role.store');
        Route::get('/{role}', 'ShowController')->name('admin.role.show');
        Route::get('/{role}/edit', 'EditController')->name('admin.role.edit');
        Route::patch('/{role}', 'UpdateController')->name('admin.role.update');
        Route::delete('/{role}', 'DestroyController')->name('admin.role.destroy');
        Route::get('/{role}/restore', 'RestoreController')->withTrashed()->name('admin.role.restore');
    });

    Route::group(['namespace' => 'Main'], function() {
        Route::get('/', 'IndexController')->name('admin.index');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Profile', 'prefix' => 'profile', 'middleware' => 'auth'], function () {
   Route::group(['namespace' => 'Main'], function () {
       Route::get('/', 'IndexController')->name('profile.index');
   });

   Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
       Route::get('/', 'IndexController')->name('profile.post.index');
       Route::get('/create', 'CreateController')->name('profile.post.create');
       Route::post('/', 'StoreController')->name('profile.post.store');
       Route::get('/{post}', 'ShowController')->name('profile.post.show');
       Route::get('/{post}/edit', 'EditController')->name('profile.post.edit');
       Route::patch('/{post}', 'UpdateController')->name('profile.post.update');
       Route::delete('/{post}', 'DestroyController')->name('profile.post.destroy');
       Route::get('/{post}/restore', 'RestoreController')->withTrashed()->name('profile.post.restore');
   });

    Route::group(['namespace' => 'Favourite', 'prefix' => 'favourites'], function () {
        Route::get('/', 'IndexController')->name('profile.favourite.index');
        Route::get('/{favourite}', 'ShowController')->name('profile.favourite.show');
        Route::get('/{favourite}/edit', 'EditController')->name('profile.favourite.edit');
        Route::patch('/{favourite}', 'UpdateController')->name('profile.favourite.update');
        Route::delete('/{favourite}', 'DestroyController')->name('profile.favourite.destroy');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
        Route::get('/', 'IndexController')->name('profile.comment.index');
        Route::get('/create', 'CreateController')->name('profile.comment.create');
        Route::post('/', 'StoreController')->name('profile.comment.store');
        Route::get('/{comment}', 'ShowController')->name('profile.comment.show');
        Route::get('/{comment}/edit', 'EditController')->name('profile.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('profile.comment.update');
        Route::delete('/{comment}', 'DestroyController')->name('profile.comment.destroy');
        Route::get('/{comment}/restore', 'RestoreController')->withTrashed()->name('profile.comment.restore');
    });
});
