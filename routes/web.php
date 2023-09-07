<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/{user}',[PostController::class,'user']);
    // Route::resource('user', PostController::class);
    Route::get('/posts/create',[PostController::class,'create']);
    Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
    Route::get('/',[PostController::class,'index']);
    Route::get('/post/{post}',[PostController::class,'show']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
    Route::post('/posts',[PostController::class,'store'])->name('store'); 
    Route::post('/posts/like',[PostController::class,'like']);
    Route::post('/posts/unlike/{post}',[PostController::class,'unlike']);
    Route::delete('/posts/{post}', [PostController::class,'delete']);
   
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
