<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Landing page
event('aggregator.routing', app('router'));
$namespacePrefix = '\\'.'Tyondo\\Aggregator\\Http\\Controllers'.'\\';

//Posts
Route::get('admin/posts/manage', $namespacePrefix.'Admin\AdminPostController@managePosts')->name('admin.posts.manage');

Route::get('admin/media', function (){
    return view('aggregator::portal.admin.blog.media.index');
})->name('admin.media.manage');

Route::resource('admin/posts', $namespacePrefix.'Admin\AdminPostController', [
    'names'=> [
        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'update' => 'admin.posts.update',
        'destroy' => 'admin.posts.destroy',
        'show' => 'admin.posts.show',
        'edit' => 'admin.posts.edit',
    ]
]);
//Categories
Route::resource('admin/categories', $namespacePrefix.'Admin\AdminPostMetadataController', [
    'names'=> [
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
        'show' => 'admin.categories.show',
        'edit' => 'admin.categories.edit',
    ]
]);


Route::group(['prefix'=>''], function(){
    //event('mnara.routing', app('router'));
    $namespaceController = '\\'.'Tyondo\\Aggregator\\Http\\Controllers\\Auth'.'\\';
    Route::get('auth',$namespaceController.'LoginController@showLoginForm')->name('login.form');
    Route::post('auth/login',$namespaceController.'LoginController@login')->name('login.post');
    Route::post('auth/logout',$namespaceController.'LoginController@logout')->name('logout.post');
    //Route::get('mnara/login',$namespaceController.'LoginController@showLoginForm')->name('mnara.login.form.2');
    Route::post('auth/register',$namespaceController.'RegisterController@register')->name('register.post');
    Route::get('auth/register',$namespaceController.'RegisterController@showRegistrationForm')->name('register.form');
    Route::post('auth/password/request',$namespaceController.'ForgotPasswordController@sendResetLinkEmail')->name('password.request.post');
    Route::get('auth/password/request',$namespaceController.'ForgotPasswordController@showLinkRequestForm')->name('password.request.form');
    Route::post('auth/password/reset',$namespaceController.'ResetPasswordController@reset')->name('password.reset.post');
    Route::get('auth/password/reset',$namespaceController.'ResetPasswordController@showResetForm')->name('password.reset.form');
});


Route::post('/admin/users/sendResetRequest', $namespacePrefix.'Admin\UserController@sendResetLinkEmail')->name('user.password.request.post');
Route::patch('/admin/users/changePassword/{user}', $namespacePrefix.'Admin\UserController@changePassword');
Route::resource('admin/users', $namespacePrefix.'Admin\UserController');