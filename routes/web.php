<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieRequestController;
use App\Http\Controllers\MovieReviewController;
use App\Http\Controllers\MovieUserFollowController;
use App\Http\Controllers\MovieUserViewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MovieController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/picture', [ProfileController::class, 'picture'])->name('picture');
    Route::post('/profile/info', [ProfileController::class, 'info'])->name('info');


    Route::prefix("films")->group(function () {
        Route::get('/', [MovieController::class, 'films'])->name('films');
        Route::get('{movie}', [MovieController::class, 'show'])->name('show');
        Route::put('follow/{id?}', [MovieUserFollowController::class, 'follow'])->name('follow');
        Route::put('unfollow/{id?}', [MovieUserFollowController::class, 'unfollow'])->name('unfollow');
        Route::put('watched/{id?}', [MovieUserViewController::class, 'watched'])->name('watched');
        Route::put('unwatched/{id?}', [MovieUserViewController::class, 'unwatched'])->name('unwatched');
        Route::post('review', [MovieReviewController::class, 'review'])->name('review');
        Route::get('search', [MovieController::class, 'search2'])->name('search2');
    });

    Route::get('/upcomming', function () {
        return view('upcomming.index');
    })->name('upcomming');

    Route::get('/user', [ProfileController::class, 'user'])->name('user');


    Route::get('/admin', [ProfileController::class, 'admin'])->name('admin')->middleware('admin');
    Route::get('/requests', [MovieRequestController::class, 'index'])->name('requests');

    // Reviews
    Route::put('/edit-review/{id?}', [MovieReviewController::class, 'edit'])->name('edit');
    Route::delete('/delete-review/{id?}', [MovieReviewController::class, 'delete'])->name('delete');

    // Alerts
    Route::post('/create-alert', [AlertController::class, 'create'])->name('create.alert');
    Route::delete('/delete-alert/{id?}', [AlertController::class, 'delete'])->name('delete.alert');

    // Users
    Route::delete('/delete-user/{id?}', [UserController::class, 'delete'])->name('delete.user');
    Route::put('/promote-user/{id?}', [UserController::class, 'promote'])->name('promote.user');
    Route::put('/demote-user/{id?}', [UserController::class, 'demote'])->name('demote.user');

    // Requests
    Route::put('/approve-request/{id?}', [MovieRequestController::class, 'approve'])->name('approve.request');
    Route::put('/reject-request/{id?}', [MovieRequestController::class, 'reject'])->name('reject.request');
    Route::put('/pending-request/{id?}', [MovieRequestController::class, 'pending'])->name('pending.request');
    Route::delete('/delete-request/{id?}', [MovieRequestController::class, 'delete'])->name('delete.request');
    Route::post('/create-request', [MovieRequestController::class, 'create'])->name('create.request');

    Route::get('/sendmail', [MailController::class, 'index']);
    Route::get('/pdf/{title}', [MovieController::class, 'exportPdf'])->name('pdf');

});




Route::resource('api', MovieController::class)->middleware('auth');

// Route::fallback(function () {
//     return redirect()->route('welcome');
// });


// Route::get('/genre', [MovieController::class, 'genre'])->name('genre');
// Route::get('/search', [MovieController::class, 'search'])->name('search');
// Route::get('/profile/manage', [ProfileController::class, 'manage'])->name('manage')->middleware('admin');
// Route::get('/requests', [MovieController::class, 'requests'])->name('requests');

require __DIR__ . '/auth.php';
