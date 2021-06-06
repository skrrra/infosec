<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HackerController;
use App\Http\Controllers\LiveStreamController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/home', [LiveStreamController::class, 'liveHackers'])
            ->middleware(['auth', 'verified'])
            ->name('home');
Route::get('/hackers', [HackerController::class, 'index'])
            ->name('hackers');
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index'])
            ->middleware(['auth'])
            ->name('myprofile');
Route::get('/create-blog', [BlogController::class, 'create'])
            ->name('createblog');
Route::post('/blog/make', [BlogController::class, 'store']);

Route::patch('/profile/password-update/{user}', [ProfileController::class, 'updatePassword']);
Route::patch('/profile/email-update/{user}', [ProfileController::class, 'updateEmail']);

require __DIR__.'/auth.php';
