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

Route::get('/', function () {
    return view('welcome');
});

//use App\Http\Controllers\ControllerFormat;
//Route::get('/cars', [ ControllerFormat::class, 'index' ]);

//Route::get('/homeWorkSolid', [App\Http\Controllers\HomeWorkSolidController::class, 'index']);

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'getBlog']);

Route::get('/blogWithComments', [App\Http\Controllers\BlogController::class, 'getBlogWithComments']);

Route::get('/blog/addCategory', [App\Http\Controllers\BlogCategoryController::class, 'addCategory']);

Route::get('/blog/updatePost', [App\Http\Controllers\BlogPostController::class, 'updatePost']);

Route::get('/blog/deleteComment', [App\Http\Controllers\BlogCommentController::class, 'deleteComment']);

Route::get('/blog/addComment', [App\Http\Controllers\BlogController::class, 'addCommentAndUpdateTimestamp']);

Route::get('/blog/{categoryId}/{postId}', [App\Http\Controllers\BlogPostController::class, 'getPosts']);

Route::get('/blog/{categoryId}', [App\Http\Controllers\BlogCategoryController::class, 'getCategories']);
