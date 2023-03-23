<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\AuthController; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('/sigup',[AuthController::class,'sigup']);
Route::post('/login',[AuthController::class,'login']); 
Route::middleware(['auth:sanctum','abilities:ROLE_ADMIN'])->group(function(){

    Route::controller(CategoryController::class)->prefix('category')->group(function ()
    {
        Route::get('','getAll');
        Route::post('','createCategory');
        Route::put('','editCategory');
        Route::get('/parent','getParentCategory');  
        Route::get('/{category}','getSubCategory');
        Route::delete('/{category}','deleteCategory');
    });
     
    Route::controller(PostController::class)->prefix('post')->group(function ()
    {
        Route::get('/{post_id}','getPost');
        Route::get('','getAll');
        Route::post('/active/{post_id}','changeActive');
        Route::put('','editPost');
        Route::post('','createPost');
        Route::delete('/{post_id}','deletePost');
    });
    Route::get('/',[AuthController::class,'test']);
});
 