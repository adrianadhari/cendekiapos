<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SinglePostController;
use App\Http\Controllers\SearchController;
use TCG\Voyager\Facades\Voyager;

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

Route::group(['middleware' => 'under-construction'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/category/{name}',  [BlogController::class, 'category'])->name('blog.category');
    
    Route::get('/about', [AboutController::class, 'index']);
    
    Route::post('/search-result', [SearchController::class, 'search']);

    Route::get('/contact', function () {
        return view('contact');
    });
    
    Route::get('/single-post', function () {
        return view('single-post');
    });

    Route::get('/iseng', function () {
        echo "halo";
    });
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});