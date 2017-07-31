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