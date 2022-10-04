<?php

use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\PasswordUpdateController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\UpdateProfileInformationController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', WelcomeController::class)->name('welcome');

Route::middleware(['auth'])->group(function () {
    
    Route::get('timeline', TimelineController::class)->name('timeline');
    Route::post('status', [StatusController::class, 'store'])->name('statuses.create');
    
    Route::get('explore', ExploreUserController::class)->name('users.index');

    Route::prefix('profile')->group(function(){
        Route::get('edit', [UpdateProfileInformationController::class, 'edit'])->name('profile.edit');
        Route::put('update', [UpdateProfileInformationController::class, 'update'])->name('profile.update');
        Route::get('password/edit', [PasswordUpdateController::class, 'edit'])->name('password.edit');
        Route::put('password/edit', [PasswordUpdateController::class, 'update']);
        Route::get('{user}/{following}', [FollowingController::class, 'index'])->name('following.index');
        // Route::post('{user}', [FollowingController::class, 'store'])->name('following.store');
        Route::post('{user}/unfollow', [FollowingController::class, 'unFollow'])->name('unfollow.store');
        Route::post('{user}/follow', [FollowingController::class, 'follow'])->name('follow.store');
        Route::get('{user:username}', ProfileInformationController::class)->name('profile');
    });
});


require __DIR__.'/auth.php';
